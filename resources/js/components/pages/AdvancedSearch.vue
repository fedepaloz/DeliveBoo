<template lang="">
    <div class="container">
        <AppLoader v-if="isLoading" />
        <div class="row justify-content-center align-items-center mt-4">
            <div class="col-md-3 m-auto mt-4">
                <div class="list-group">Categories</div>
                <div
                    v-for="item in categories"
                    :key="item.id"
                    class="list-group-item"
                >
                    <input
                        type="checkbox"
                        class="form-check-input"
                        :value="item.id"
                        v-model="select_categories"
                        :id="item.id"
                    />
                    <label :for="item.id">{{ item.name }}</label>
                </div>
                <button
                    type="button"
                    @click="fetchRestaurants"
                    class="btn btn-light mt-4"
                >
                    Filtra
                </button>
            </div>
            <!-- <div
                class="select-bg p-3 col-12 py-4 row justify-content-center align-items-center g-3"
            >
                <div class="col-6 col-md-3">
                    <div>
                        <select v-model="category_id">
                            <option
                                :value="category.id"
                                v-for="category in categories"
                                :key="category.id"
                            >
                                <a class="drop dropdown-item" href="#">{{
                                    category.name
                                }}</a>
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-6 pl-5 col-md-3">
                    <button @click="fetchRestaurants" class="btn btn-search">
                        Cerca
                    </button>
                </div>
            </div> -->
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
                    console.log(res.data);

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
<style scoped>
.select-bg {
    background-size: cover;
    background-image: url("https://png.pngtree.com/thumb_back/fh260/back_our/20190621/ourmid/pngtree-black-atmosphere-simple-meal-food-food-banner-image_176553.jpg");
    background-repeat: no-repeat;
}

/* CSS */
.btn-search {
    align-items: center;
    appearance: none;
    background-clip: padding-box;
    background-color: initial;
    background-image: none;
    border-style: none;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    flex-direction: row;
    flex-shrink: 0;
    font-family: Eina01, sans-serif;
    font-size: 16px;
    font-weight: 800;
    justify-content: center;
    line-height: 24px;
    margin: 0;
    min-height: 64px;
    outline: none;
    overflow: visible;
    padding: 19px 26px;
    pointer-events: auto;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-transform: none;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    vertical-align: middle;
    width: auto;
    word-break: keep-all;
    z-index: 0;
}

@media (min-width: 768px) {
    .btn-search {
        padding: 19px 32px;
    }
}

.btn-search:before,
.btn-search:after {
    border-radius: 80px;
}

.btn-search:before {
    background-image: linear-gradient(92.83deg, #60c442 0, #f93a13 100%);
    content: "";
    display: block;
    height: 100%;
    left: 0;
    overflow: hidden;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: -2;
}

.btn-search:after {
    background-color: initial;
    background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
    bottom: 4px;
    content: "";
    display: block;
    left: 4px;
    overflow: hidden;
    position: absolute;
    right: 4px;
    top: 4px;
    transition: all 100ms ease-out;
    z-index: -1;
}

.btn-search:hover:not(:disabled):before {
    background: linear-gradient(
        92.83deg,
        rgb(255, 116, 38) 0%,
        rgb(249, 58, 19) 100%
    );
}

.btn-search:hover:not(:disabled):after {
    bottom: 0;
    left: 0;
    right: 0;
    top: 0;
    transition-timing-function: ease-in;
    opacity: 0;
}
.btn-search a {
    text-decoration: none;
    color: white;
}

.btn-search:active:not(:disabled) {
    color: #ccc;
}

.btn-search:active:not(:disabled):before {
    background-image: linear-gradient(
            0deg,
            rgba(0, 0, 0, 0.2),
            rgba(0, 0, 0, 0.2)
        ),
        linear-gradient(92.83deg, #60c442 0, #f93a13 100%);
}

.btn-search:active:not(:disabled):after {
    background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
    bottom: 4px;
    left: 4px;
    right: 4px;
    top: 4px;
}

.btn-search:disabled {
    cursor: default;
    opacity: 0.24;
}

select {
    width: 100%;
    height: 50px;
    font-size: 100%;
    font-weight: bold;
    cursor: pointer;
    border-radius: 0;
    background-color: #60c442;
    border: none;
    color: white;
    padding: 10px;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    padding: 10px;
}
</style>
