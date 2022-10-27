<template lang="">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-12 py-4">
                    <AppRestaurantDetails />
                </div>
            </div>

            <div class="row">
                <!-- Menu ristorante -->
                <div class="col-8">
                    <!-- ! Qui inserire componente menu -->
                    <RestaurantMenu :items="restaurant.items" />
                </div>
                <!-- Carrello sticky -->
                <div class="col-4">
                    <!-- ! Qui inserire componente carrello -->
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Porro explicabo eligendi cumque impedit? Quae deleniti
                    tempore soluta harum, dolorum molestias? Odio, fugit
                    doloribus similique autem a nesciunt in consequatur nostrum.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RestaurantMenu from "../RestaurantMenu.vue";
import AppRestaurantDetails from "../AppRestaurantDetails.vue";

export default {
    name: "RestaurantPage",
    components: { 
        RestaurantMenu,
        AppRestaurantDetails,
     },
    data() {
        return {
            restaurant: {},
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
    },
    mounted() {
        this.fetchRestaurant();
    },
};
</script>
<style lang="scss" scoped></style>
