<template lang="">
    <div class="container">
        <div class="container">
            <AppLoader v-if="isLoading" />
            <div class="row">
                <div class="col-12 py-4">
                    <AppRestaurantDetails :restaurant="restaurant" />
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Menu ristorante -->
            <div class="col-12 col-md-7">
                <RestaurantMenu
                    :items="restaurant.items"
                    @change-items="getOrder"
                />
            </div>
            <!-- Carrello sticky -->
            <div class="col-12 col-md-5">
                <AppCart :order="order" @change-items="getOrder"></AppCart>
            </div>
        </div>

        <!-- ! MODALE DA AGGIUNGERE DOPO -->
        <div id="new-cart-modal">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vuoi creare un nuovo carrello?</h5>
                    <p class="card-text">
                        In questo modo cancelli il carrello esistente e crei un
                        nuovo carrello.
                    </p>
                    <div
                        href="#"
                        class="btn btn-primary mr-2"
                        id="new-cart-modal-no"
                    >
                        Visualizza il menù
                    </div>
                    <div
                        href="#"
                        class="btn btn-success"
                        id="new-cart-modal-yes"
                    >
                        Nuovo carrello
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RestaurantMenu from "../RestaurantMenu.vue";
import AppRestaurantDetails from "../AppRestaurantDetails.vue";
import AppCart from "../AppCart.vue";
import AppLoader from "../AppLoader.vue";

export default {
    name: "RestaurantPage",
    components: {
        AppCart,
        RestaurantMenu,
        AppRestaurantDetails,
        AppLoader,
    },
    data() {
        return {
            isLoading: false,
            restaurant: {},
            order: [],
        };
    },
    methods: {
        fetchRestaurant() {
            this.isLoading = true;
            axios
                .get(
                    `http://127.0.0.1:8000/api/restaurants/${this.$route.params.id}`
                )
                .then((res) => {
                    this.restaurant = res.data;
                })
                .catch((err) => {
                    this.error = "Errore durante il fetch dei ristoranti";
                })
                .then(() => {
                    this.isLoading = false;
                });
        },
        getOrder(value) {
            this.order = value;
            localStorage.setItem("ordine", JSON.stringify(this.order));
        },
    },
    mounted() {
        this.fetchRestaurant();
        this.order = JSON.parse(localStorage.getItem("ordine"));
    },
};
</script>
<style lang="scss" scoped>
#new-cart-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background-color: rgba($color: #000000, $alpha: 0.4);

    .card {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        z-index: 10;
    }
}
</style>
