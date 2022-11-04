<template>
    <div>
        <AppSlider />
        <section id="services">
            <div class="container">
                <AdvancedSearch @filtered-restaurants="filteredRestaurants" />
            </div>

            <div class="container">
                <AppLoader v-if="isLoading" />
                <div v-if="restaurants.length >= 1">
                    <RestaurantList :restaurants="restaurants" />
                    <AppPagination
                    @change-page="fetchRestaurants"
                    :lastPage="pagination.last"
                    :currentPage="pagination.current"
                />
                </div>

                <div>
                    <div class="container card my-5">
                        <hr class="hr" />
                        <div
                            class="row justify-content-center align-items-center my-5"
                        >
                            <div class="col">
                                <AppServices />
                            </div>
                        </div>
                        <hr class="hr" />
                    </div>
                    <div class="container card my-5">
                        <hr class="hr" />
                        <AppPartners />
                        <hr class="hr" />
                    </div>
                    <div class="container card my-5">
                        <hr class="hr" />
                        <AppContacts />
                        <hr class="hr" />
                    </div>
                </div>
                
            </div>
        </section>
        <!-- <AppCart /> -->
    </div>
</template>
<script>
import AppPartners from "../AppPartners.vue";
import RestaurantList from "./RestaurantList.vue";
import AppServices from "../AppServices.vue";
import AppCart from "../AppCart.vue";
import AppPagination from "../AppPagination.vue";
import AppLoader from "../AppLoader.vue";
import AdvancedSearch from "./AdvancedSearch.vue";
import AppContacts from "../AppContacts.vue";
import AppSlider from "../AppSlider.vue";

export default {
    name: "HomePage",
    data() {
        return {
            restaurants: [],
            isLoading: false,
            pagination: {
                current: null,
                last: null,
            },
        };
    },
    components: {
        AppServices,
        AppCart,
        AppLoader,
        AppPartners,
        RestaurantList,
        AppContacts,
        AppSlider,
        AdvancedSearch,
        AppPagination,
    },
    methods: {
        fetchRestaurants(page = 1) {
            this.isLoading = true;
            axios
                .get(`http://localhost:8000/api/restaurants?page=${page}`)
                .then((res) => {
                    const { data, current_page, last_page } = res.data;
                    this.restaurants = data;
                    this.pagination.current = current_page;
                    this.pagination.last = last_page;
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
    background-image: url("https://cdn4.vectorstock.com/i/1000x1000/86/23/online-food-order-and-delivery-process-vector-27208623.jpg");
}
.hr {
    border-top: 1px solid #b1291b;
    margin: 30px 0 30px 0;
}
</style>
