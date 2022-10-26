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
        <!-- <RestaurantList /> -->
        <div class="card mb-3" style="max-width: 540px">
            <!-- Ciclo "For" qui -->
            <div class="row no-gutters">
                <div class="col-md-12">
                    <!-- <img src="restaurant.image" alt="..." /> -->
                </div>
                <div v-for="restaurant in restaurants" :key="restaurant.id" class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title">
                            Nome ristorante: {{ restaurant.name }}
                        </h3>
                        <p class="card-text">
                            Indirizzo: {{ restaurant.address }}
                        </p>
                        <p class="card-text">
                            Orario Apertura: {{ restaurant.opening_time }}
                        </p>
                        <p class="card-text">
                            Costo consegna: {{ restaurant.delivery_cost }}
                        </p>
                        <p class="card-text">
                            Minimo d'ordine: {{ restaurant.min_order }}
                        </p>
                        <button class="btn btn-success">
                            <a href="">Ordina ora</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
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
