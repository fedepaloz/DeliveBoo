<template>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
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
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Indirizzo di fatturazione</h4>
                <form id="payment-form" action="/api/payment" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nome</label>
                            <input
                                name="firstName"
                                type="text"
                                class="form-control"
                                id="firstName"
                                placeholder=""
                                value="Alessio"
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
                                value="Cordari"
                                required=""
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
                            placeholder="user@gmail.com"
                            value="ale@ale.ale"
                        />
                        <div class="invalid-feedback">
                            Inserire una mail valida
                        </div>
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
                            value="vialemanidalnaso 21"
                        />
                        <div class="invalid-feedback">
                            Inserire l'indirizzo di consegna
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="zip">Codice postale</label>
                            <input
                                name="zip"
                                type="text"
                                class="form-control"
                                id="zip"
                                placeholder=""
                                required=""
                                value="00100"
                            />
                            <div class="invalid-feedback">
                                Il codice postale deve essere inserito
                            </div>
                        </div>
                    </div>

                    <h4 class="mb-3">Pagamento</h4>

                    <div id="dropin-container"></div>

                    <hr class="mb-4" />
                    <div
                        type="button"
                        id="payment-form"
                        class="btn btn-primary btn-lg btn-block"
                    >
                        Continua per il checkout
                    </div>
                    <input
                        type="hidden"
                        id="nonce"
                        name="payment_method_nonce"
                    />
                </form>
            </div>
        </div>
    </div>
</template>

<script>
(function () {
    "use strict";

    window.addEventListener(
        "load",
        function () {
            var forms = document.getElementsByClassName("needs-validation");

            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener(
                    "submit",
                    function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add("was-validated");
                    },
                    false
                );
            });
        },
        false
    );
})();

export default {
    name: "CheckoutPage",
    data() {
        return {
            clientToken: "",
            payloadNonce: "",
            order: [],
            resId: null,
            deliveryCost: null,
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
                .get(
                    `http://127.0.0.1:8000/api/restaurants/deliverycost/${this.resId}`
                )
                .then((res) => {
                    this.deliveryCost = res.data;
                })
                .catch(() => {})
                .then(() => {});
        },
        getOrder() {
            this.order = JSON.parse(localStorage.getItem("ordine"));
        },
    },
    mounted() {
        this.getOrder();
        this.fetchDeliveryCost();
        const form = document.getElementById("payment-form");

        braintree.dropin.create(
            {
                authorization: "sandbox_x6shqqj4_754btzw6qy3x4bbx",
                container: "#dropin-container",
            },
            (error, dropinInstance) => {
                if (error) console.error(error);

                form.addEventListener("click", () => {
                    dropinInstance.requestPaymentMethod((error, payload) => {
                        if (error) console.error(error);
                        // Step four: when the user is ready to complete their
                        //   transaction, use the dropinInstance to get a payment
                        //   method nonce for the user's selected payment method, then add
                        //   it a the hidden field before submitting the complete form to
                        //   a server-side integration
                        this.payloadNonce = payload.nonce;

                        axios
                            .post(`http://127.0.0.1:8000/api/payment/`, {
                                payloadNonce: this.payloadNonce,
                                customer: this.customer,
                                order: this.order,
                                total: this.total,
                                resId: this.resId,
                            })
                            .then((res) => {
                                if (res.data) {
                                    console.log(res.data);
                                    // this.$router.push("/");
                                } else {
                                }
                            })
                            .catch(() => {})
                            .then(() => {});
                    });
                });
            }
        );
    },
};
</script>

<style></style>
