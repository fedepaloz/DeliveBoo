<template>
    <div>
        <section id="services">
            <div class="container-fluid">
                <AdvancedSearch @filtered-restaurants="filteredRestaurants" />
                <RestaurantList
                    v-for="restaurant in restaurants"
                    :key="restaurant.id"
                    :restaurant="restaurant"
                />
                <!-- ! Prima sezione (I nostri servizi) -->
                <div class="container card my-5">
                    <hr class="hr" />
                    <!-- logo -->
                    <div
                        class="row justify-content-center align-items-center my-5"
                    >
                        <div>
                            <AppLogo />
                        </div>
                        <div class="col">
                            <AppServices />
                        </div>
                        <div class="col-12">
                            <div id="bg-Services"></div>
                        </div>
                    </div>
                    <hr class="hr" />
                </div>
                <!-- ! Fine prima sezione -->
            </div>
        </section>
        <AppPartners />
        <!-- <AppCart /> -->
    </div>
</template>
<script>
import AppPartners from "../AppPartners.vue";
import RestaurantList from "./RestaurantList.vue";
import AppServices from "../AppServices.vue";
import AppCart from "../AppCart.vue";
import AdvancedSearch from "./AdvancedSearch.vue";

export default {
    name: "HomePage",
    data() {
        return {
            restaurants: [],
        };
    },
    components: {
        AppServices,
        AppCart,
        AppPartners,
        RestaurantList,
        AdvancedSearch,
    },
    methods: {
        fetchRestaurants() {
            // this.isLoading = true;
            axios
                .get(`http://localhost:8000/api/restaurants/`)
                .then((res) => {
                    this.restaurants = res.data;
                })
                .catch((err) => {
                    this.error = "Errore durante il fetch dei post";
                })
                .then(() => {
                    this.isLoading = false;
                });
        },

        filteredRestaurants(value) {
            this.restaurants = value;
        },
    },
    mounted() {
        this.fetchRestaurants();
    },
};
</script>
<style lang="scss" scoped>
#bg-Services {
    margin-top: 30px;
    height: 220px;
    background-position: 60% 43%;
    background-size: cover;
    background-image: url('https://cdn4.vectorstock.com/i/1000x1000/86/23/online-food-order-and-delivery-process-vector-27208623.jpg');
}
.hr {
    border-top: 1px solid green;
    margin: 30px 0 30px 0;
}
</style>
