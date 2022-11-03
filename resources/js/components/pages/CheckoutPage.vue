<template>
    <div class="container">
        <AppLoader v-if="isLoading" />
        <div
            v-if="transactionErrors"
            class="alert alert-danger alert-dismissible fade show my-3"
            role="alert"
        >
            <ul>
                <li v-for="error in transactionErrors" :key="error">{{ error }}</li>
            </ul>

            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close"
            >
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div
            v-if="hasOrdered"
            class="alert alert-success alert-dismissible fade show my-3"
            role="alert"
        >
            {{ hasOrdered }}
            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close"
            >
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="row py-4">
            <div class="col-12 col-md-7">
                <h4 class="mb-3">Indirizzo di spedizione</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nome</label>
                        <input
                            name="firstName"
                            type="text"
                            class="form-control"
                            id="firstName"
                            placeholder=""
                            required=""
                            v-model="customer.first_name"
                        />
                        <div class="invalid-feedback">
                            Il nome deve essere inserito
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Cognome</label>
                        <input
                            name="lastName"
                            type="text"
                            class="form-control"
                            id="lastName"
                            placeholder=""
                            required=""
                            v-model="customer.last_name"
                        />
                        <div class="invalid-feedback">
                            Il cognome deve essere inserito
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input
                        name="email"
                        type="email"
                        class="form-control"
                        id="email"
                        v-model="customer.email"
                    />
                    <div class="invalid-feedback">Inserire una mail valida</div>
                </div>

                <div class="mb-3">
                    <label for="address">Indirizzo</label>
                    <input
                        name="address"
                        type="text"
                        class="form-control"
                        id="address"
                        placeholder=""
                        required=""
                        v-model="customer.address"
                    />
                    <div class="invalid-feedback">
                        Inserire l'indirizzo di consegna
                    </div>
                </div>

                <div id="dropin-container"></div>

                <div
                    type="button"
                    ref="paymentButton"
                    class="btn btn-primary btn-lg btn-block"
                >
                    Procedi con il pagamento
                </div>
                <input type="hidden" id="nonce" name="payment_method_nonce" />
            </div>
            <div class="col-12 col-md-5">
                <h4
                    class="d-flex justify-content-between align-items-center mb-3"
                >
                    <span class="text-muted">Riepilogo</span>
                    <span class="badge badge-secondary badge-pill">{{
                        order.length
                    }}</span>
                </h4>
                <ul class="list-group mb-3">
                    <li
                        v-for="item in order"
                        :key="item.id"
                        class="list-group-item d-flex justify-content-between lh-condensed"
                    >
                        <div>
                            <h6 class="my-0">{{ item.name }}</h6>
                            <small class="text-muted"
                                >x{{ item.quantity }}</small
                            >
                        </div>
                        <span class="text-muted">{{ item.total }} €</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Spese di spedizione</span>
                        <small class="text-muted">{{ deliveryCost }} €</small>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Totale</span>
                        <strong>{{ total }} €</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Menu ristorante -->
</template>

<script>
import { setTimeout } from "timers";
import AppLoader from "../AppLoader";

export default {
    name: "CheckoutPage",
    components: {
        AppLoader,
    },
    data() {
        return {
            clientToken: "",
            payloadNonce: "",
            order: [],
            resId: null,
            deliveryCost: null,
            transactionErrors: undefined,
            hasOrdered: undefined,
            isLoading: false,
            customer: {
                first_name: "",
                last_name: "",
                address: "",
                email: "",
            },
        };
    },
    computed: {
        total() {
            let total = 0;

            this.order.forEach((item) => {
                total += item.total;
            });

            total += this.deliveryCost;

            return total;
        },
    },
    methods: {
        fetchDeliveryCost() {
            this.resId = this.order[0].restaurant;
            axios
                .get(`http://127.0.0.1:8000/api/restaurants/${this.resId}`)
                .then((res) => {
                    this.deliveryCost = res.data.delivery_cost;
                })
                .catch(() => {})
                .then(() => {});
        },
        completedOrder() {
            this.hasOrdered =
                "L'ordine è stato inserito correttamente nei nostri sistemi. Controlla l'email per tutte le informazioni sulla consegna. Tra pochi secondi verrai reindirizzato alla homepage del sito!";
            setTimeout(() => {
                this.$router.push("/");
            }, 6000);
        },
        performPayment() {
            braintree.dropin.create(
                {
                    authorization: "sandbox_nd542y7m_754btzw6qy3x4bbx",
                    container: "#dropin-container",
                },
                (error, dropinInstance) => {
                    if (error) console.error(error);

                    this.$refs.paymentButton.addEventListener("click", () => {
                        dropinInstance.requestPaymentMethod(
                            (error, payload) => {
                                if (error) console.error(error);
                                this.payloadNonce = payload.nonce;
                                this.isLoading = true;
                                axios
                                    .post(
                                        `http://127.0.0.1:8000/api/payment/`,
                                        {
                                            payloadNonce: this.payloadNonce,
                                            customer: this.customer,
                                            order: this.order,
                                            total: this.total,
                                            resId: this.resId,
                                        }
                                    )
                                    .then((res) => {
                                        this.isLoading = false;
                                        if (res.data.errors) {
                                            this.transactionErrors =
                                                res.data.errors;
                                        } else if (
                                            typeof res.data === "string"
                                        ) {
                                            this.transactionErrors = [res.data];
                                        } else {
                                            this.completedOrder();
                                        }
                                    })
                                    .catch(() => {})
                                    .then(() => {});
                            }
                        );
                    });
                }
            );
        },
        getOrder() {
            this.order = JSON.parse(localStorage.getItem("ordine"));
        },
    },
    mounted() {
        this.getOrder();
        this.fetchDeliveryCost();
        this.performPayment();
    },
};
</script>

<style></style>
