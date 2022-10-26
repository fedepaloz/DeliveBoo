<template lang="">
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card p-3 py-4">
                    <h5>Cerca i ristoranti</h5>

                    <div class="row g-3 mt-2">
                        <div class="col-md-3">
                            <div class="dropdown">
                                <select
                                    v-model="category_id"
                                    aria-labelledby="dropdownMenuButton"
                                >
                                    <option
                                        :value="category.id"
                                        v-for="category in categories"
                                        :key="category.id"
                                    >
                                        <a
                                            class="drop dropdown-item"
                                            href="#"
                                            >{{ category.name }}</a
                                        >
                                    </option>
                                </select>
                            </div>
                        </div>
                        <p></p>
                        <div class="col-md-3">
                            <button
                                @click="fetchRestaurants"
                                class="btn btn-secondary btn-block"
                            >
                                Cerca risultato
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <ul>
            <li v-for="restaurant in restaurants" :key="restaurant.id">
                <RestaurantList :restaurants="restaurants" />
                {{ restaurant.name }}
                {{ restaurant.address }}
                {{ restaurant.delivery_cost }}
            </li>
        </ul> -->
    </div>
</template>
<script>
import RestaurantList from "./RestaurantList.vue";

export default {
    name: "AdvancedSearch",
    components:{
        RestaurantList
    },
    data() {
        return {
            categories: [],
            restaurants: [],
            category_id: null,
        };
    },
    methods: {
        fetchCategories() {
            // this.isLoading = true;
            axios
                .get(`http://localhost:8000/api/categories`)
                .then((res) => {
                    this.categories = res.data;
                })
                .catch((err) => {
                    this.error = "Errore durante il fetch delle categorie";
                })
                .then(() => {
                    this.isLoading = false;
                });
        },
        fetchRestaurants() {
            axios
                .get(
                    `http://localhost:8000/api/restaurants?categories=${this.category_id}`
                )
                .then((res) => {
                    // console.log(res.data.response);

                    this.restaurants = res.data;
                    this.$emit("filteredRestaurants", this.restaurants);
                })
                .catch((err) => {
                    this.error = "Errore durante il fetch dei ristoranti";
                })
                .then(() => {
                    this.isLoading = false;
                });
        },

        // filteredRestaurants() {

        // },
    },
    mounted() {
        this.fetchCategories();
    },
};
</script>
<style>
.drop {
    color: #000;
}
</style>
