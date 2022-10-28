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
            <div class="col-7">
                <RestaurantMenu
                    :items="restaurant.items"
                    @change-items="getOrder"
                />
            </div>
            <!-- Carrello sticky -->
            <div class="col-5">
                <AppCart
                    v-if="order"
                    :order="order"
                    @change-items="getOrder"
                ></AppCart>
            </div>
        </div>

        <!-- ! MODALE DA AGGIUNGERE DOPO -->
        <!-- <div class="layover">
            <div class="card" id="new-cart-modal">
                <div class="card-body">
                    <h5 class="card-title">Vuoi creare un nuovo carrello?</h5>
                    <p class="card-text">
                        In questo modo cancelli il carrello esistente e crei un
                        nuovo carrello.
                    </p>
                    <a href="#" class="btn btn-primary mr-2"
                        >Visualizza il menù</a
                    >
                    <a href="#" class="btn btn-success">Nuovo carrello</a>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
import RestaurantMenu from "../RestaurantMenu.vue";
import AppRestaurantDetails from "../AppRestaurantDetails.vue";
import AppCart from "../AppCart.vue";
import AppLoader from "../AppLoader.vue";

export default {
    name: "AppCart",
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
                    console.log(this.restaurant.items);
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
.layover {
    overflow: hidden;
    position: absolute;
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
    }
}
</style>
