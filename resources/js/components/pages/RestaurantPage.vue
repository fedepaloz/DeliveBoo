<template lang="">
    
        <div class="container-fluid">
            <!-- Dettagli ristorante -->
            <div class="row">
                <div class="col-12 py-4">
                    <!-- ! Qui inserire componente dettagli ristorante -->
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Porro explicabo eligendi cumque impedit? Quae deleniti
                    tempore soluta harum, dolorum molestias? Odio, fugit
                    doloribus similique autem a nesciunt in consequatur nostrum.
                </div>
            </div>

            <div class="row">
                <!-- Menu ristorante -->
                <div class="col-8">
                   
                    <RestaurantMenu :items="restaurant.items" />
                </div>
                <!-- Carrello sticky -->
                <div class="col-4">
                   <AppCart></AppCart> 
                </div>
            </div>
        </div>
    
</template>

<script>
import RestaurantMenu from "../RestaurantMenu.vue";
import AppCart from "../AppCart.vue";

export default {
    name:"AppCart",
    name: "RestaurantPage",
    components: { RestaurantMenu , AppCart },
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
