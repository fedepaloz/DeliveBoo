<template lang="">
    <div>
        <AppLoader v-if="isLoading" />
        <div class="mt-4">
            <div class="m-auto mt-4">
                <div class="list-group">
                    <h2 class="text-danger text-center mt-5">Fame? Di cosa hai voglia?</h2>
                </div>
                <div class="row justify-content-center">
                    <div
                        v-for="item in categories"
                        :key="item.id"
                        class="list-item col-2 m-1"
                    >
                        <div class="text-center">
                            <input
                                type="checkbox"
                                class="form-check-input ml-2"
                                :value="item.id"
                                v-model="select_categories"
                                :id="item.id"
                            />
                            <label :for="item.id">
                                <h6 class="mt-3">{{ item.name }}</h6>
                                <img
                                    :src="item.image"
                                    :alt="item.name"
                                    class="ml-2 img-fluid cat-img d-none d-md-block"
                                />
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button
                    type="button"
                    @click="fetchRestaurants"
                    class="btn btn-danger mt-4"
                >
                    Filtra
                </button>
            </div>
        </div>

        <div class="container my-5">
            <div class="row justify-content-between flex-wrap">
                <div
                    class="col-sm-12 col-md-6"
                    v-for="data in filter_data"
                    :key="data.id"
                >
                    <div class="card p-2 my-3">
                        <div>
                            <img
                                class="p-1 card-img-top img-fluid image"
                                :src="data.image"
                                alt="..."
                            />
                        </div>
                        <div class="text-center">
                            <h4 class="card-title text-danger my-3">
                                {{ data.name }}
                            </h4>
                            <h6 class="card-title">{{ data.address }}</h6>
                            <p class="card-text">
                                Costo consegna: €{{ data.delivery_cost }}
                            </p>
                            <p class="card-text">
                                Mimino ordine: €{{ data.min_order }}
                            </p>
                            <p class="card-text">
                                Orari: {{ data.opening_time }} -
                                {{ data.closure_time }}
                            </p>
                            <div class="btn btn-danger">
                                Ordina da {{ data.name }} oraa
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import RestaurantList from "./RestaurantList.vue";
import AppLoader from "../AppLoader.vue";

export default {
    name: "AdvancedSearch",
    components: {
        RestaurantList,
        AppLoader,
    },
    data() {
        return {
            categories: [],
            isLoading: false,
            restaurants: [],
            filter_data: [],
            category_id: null,
            select_categories: [],
        };
    },

    methods: {
        fetchCategories() {
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
            this.isLoading = true;

            axios
                .get(
                    `http://localhost:8000/api/restaurants?${this.select_categories
                        .map((n, index) => `categories[${index}]=${n}`)
                        .join("&")}`
                )
                .then((res) => {
                    this.restaurants = res.data;
                    this.$emit("filtered-restaurants", this.restaurants);
                })
                .catch((err) => {
                    this.error = "Errore durante il fetch dei ristoranti";
                })
                .then(() => {
                    this.isLoading = false;
                });
        },
    },
    mounted() {
        this.fetchCategories();
    },
};
</script>
<style scoped lang="scss">
.select-bg {
    background-size: cover;
    background-image: url("https://png.pngtree.com/thumb_back/fh260/back_our/20190621/ourmid/pngtree-black-atmosphere-simple-meal-food-food-banner-image_176553.jpg");
    background-repeat: no-repeat;
}

.cat-img {
    width: 94%;
    height: 80%;
    margin-top: 5px;
}
.list-item {
    padding: 7px;
    color: white;
    background-color: #b1291b;
    border-radius: 8px;
    transition: 0.3s;

    &:hover {
        margin: 10px 10px;
        background-color: white;
        color: #b1291b;
        border: 1.5px solid #b1291b;
    }
}

.check{
    display: none;
}
</style>
