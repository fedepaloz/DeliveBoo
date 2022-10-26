<template>
    <div>  
        <section id="services">
            <div class="container-fluid">
                <AdvancedSearch @filtered-restaurants="filteredRestaurants"/>
                <!-- <RestaurantList :restaurants="restaurants" /> -->
                
                <!-- ! Prima sezione (I nostri servizi) -->
                <div class="container">
                    <!-- logo -->
                    <div class="row justify-content-center align-items-center my-5">
                        <div class="col-sm-3 col-lg-3">
                            <AppLogo />
                        </div>
                    <div class="col-sm-9 col-lg-9 text-center d-flex align-items-center">
                        <AppServices />
                    </div>
                    <div class="col-12">
                        <div id="bg-Services"></div>
                    </div>
                    </div>
                </div>
                <!-- ! Fine prima sezione -->

            </div>
        </section>
        <AppPartners />
        <!-- <AppCart /> -->
        
    </div>
        <!-- <ul>
            <li v-for="restaurant in restaurants" :key="restaurant.id">
                <RestaurantList :restaurant="restaurant" />
                {{ restaurant.name }}
            </li>
        </ul> -->
        
</template>
<script>
import AppPartners from "../AppPartners.vue";
import RestaurantList from "./RestaurantList.vue";
import AppLogo from "../AppLogo.vue";
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
        AppLogo,
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
            return (this.restaurants = value);
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
    background-image: url(https://cdn4.vectorstock.com/i/1000x1000/86/23/online-food-order-and-delivery-process-vector-27208623.jpg);
}
</style>
