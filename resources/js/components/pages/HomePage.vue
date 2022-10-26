<template>
    <div>
        <!-- Jumbotron -->
        <section id="services">
            <div class="container-fluid">
                <div class="row justify-content-center mt-5">
                    <div class="col-sm col-lg-2">
                        <AppLogo></AppLogo>
                    </div>
                    <AdvancedSearch
                        @filtered-restaurants="filteredRestaurants"
                    />
        <!-- <RestaurantList :restaurants="restaurants" /> -->

                    <div
                        class="col-sm col-lg-6 text-center d-flex align-items-center"
                    >
                        <div>
                            <h1 class="font-weight-bold">I nostri servizi</h1>
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Ipsam deserunt, eaque iure
                                illum qui iste quaerat voluptates molestias
                                alias veniam beatae exercitationem suscipit.
                                Perferendis sit quos optio ratione laboriosam
                                aspernatur?
                            </p>
                        </div>
                    </div>
                    <div class="col-sm col-lg-2">
                        <img
                            class="img-fluid"
                            src="https://images.prismic.io/deliveroo/2ad27cdc-9c5a-4136-85b4-349f9ba1344f_nan_25+%281%29.JPG?auto=compress,format"
                            alt="servizi"
                        />
                    </div>
                </div>
            </div>
        </section>
        <AppPartners />
        <AppCart />
        
    </div>
        <!-- <ul>
            <li v-for="restaurant in restaurants" :key="restaurant.id">
                <RestaurantList :restaurant="restaurant" />
                {{ restaurant.name }}
            </li>
        </ul> -->
        
    </div>
</template>
<script>
import AppPartners from "../AppPartners.vue";
import RestaurantList from "./RestaurantList.vue";
import AppLogo from "../AppLogo.vue";
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
<style lang="scss" scoped></style>
