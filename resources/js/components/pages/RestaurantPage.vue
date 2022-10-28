<template lang="">
    <div class="container">
        <!-- Dettagli ristorante -->
        <div class="row">
            <div class="col-12 py-4">
                <!-- ! Qui inserire componente dettagli ristorante -->
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro
                explicabo eligendi cumque impedit? Quae deleniti tempore soluta
                harum, dolorum molestias? Odio, fugit doloribus similique autem
                a nesciunt in consequatur nostrum.
            </div>
        </div>

        <div class="row">
            <!-- Menu ristorante -->
            <div class="col-7">
                <RestaurantMenu
                    :items="restaurant.items"
                    @change-items="getItems"
                />
            </div>
            <!-- Carrello sticky -->
            <div class="col-5">
                <AppCart
                    v-if="items.length > 0"
                    :items="items"
                    @change-items="getItems"
                ></AppCart>
            </div>
        </div>
    </div>
</template>

<script>
import RestaurantMenu from "../RestaurantMenu.vue";
import AppCart from "../AppCart.vue";

export default {
    name: "AppCart",
    name: "RestaurantPage",
    components: { RestaurantMenu, AppCart },
    data() {
        return {
            restaurant: {},
            items: [],
        };
    },
    methods: {
        fetchRestaurant() {
            // this.isLoading = true;
            axios
                .get(
                    `http://127.0.0.1:8000/api/restaurants/${this.$route.params.id}`
                )
                .then((res) => {
                    this.restaurant = res.data;
                })
                .catch((err) => {
                    this.error = "Errore durante il fetch dei post";
                })
                .then(() => {
                    this.isLoading = false;
                });
        },
        getItems(value) {
            this.items = value;
        },
    },
    mounted() {
        this.fetchRestaurant();
        this.items = JSON.parse(localStorage.getItem("ordine"));
    },
};
</script>
<style lang="scss" scoped></style>
