<template>
    <div class="py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div
                    class="d-flex justify-content-between align-items-center mb-4"
                >
                    <h3 class="fw-normal mb-0 text-black">Carrello</h3>
                </div>

                <div class="card rounded-3 mb-4">
                    <div class="card-body">
                        <div
                            v-for="item in order"
                            :key="item.id"
                            class="row d-flex justify-content-between align-items-center"
                        >
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                                    class="img-fluid rounded-3"
                                    alt="Cotton T-shirt"
                                />
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <p class="lead fw-normal mb-2">
                                    {{ item.name }}
                                </p>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <button
                                    class="btn btn-link px-2"
                                    @click="reduceFromCart(item)"
                                >
                                    <i class="fas fa-minus"></i>
                                </button>

                                <span>{{ item.quantity }}</span>

                                <button
                                    class="btn btn-link px-2"
                                    @click="addToCart(item)"
                                >
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h5 class="mb-0">{{ item.total }} €</h5>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 mr-1">
                                <a
                                    @click="removeFromCart(item)"
                                    href="#!"
                                    class="text-danger"
                                    ><i class="fas fa-trash fa-lg"></i
                                ></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <router-link class="nav-link d-" :to="{ name: 'checkout' }">
                            <button type="button" class="btn btn-success">Procedi al pagamento</button>
            </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AppCart",
    props: {
        order: Array,
    },
    methods: {
        addToCart(item) {
            const order = JSON.parse(localStorage.getItem("ordine"));

            order.forEach((prod) => {
                if (prod.id == item.id) {
                    ++prod.quantity;
                    prod.total += prod.price;
                }
            });

            this.$emit("change-items", order);
        },
        reduceFromCart(item) {
            const order = JSON.parse(localStorage.getItem("ordine"));

            order.forEach((prod, index) => {
                if (prod.id == item.id) {
                    if (prod.quantity == 1) {
                        order.splice(index, 1);
                    } else {
                        --prod.quantity;
                        prod.total -= prod.price;
                    }

                    this.$emit("change-items", order);
                }
            });
        },
        removeFromCart(item) {
            const order = JSON.parse(localStorage.getItem("ordine"));

            order.forEach((prod, index) => {
                if (prod.id == item.id) {
                    order.splice(index, 1);
                }
                this.$emit("change-items", order);
            });
        },
    },
};
</script>

<style lang="scss" scoped></style>
