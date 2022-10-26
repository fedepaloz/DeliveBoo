<template lang="">
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card p-3 py-4">
                    <h5>Cerca i ristoranti</h5>

                    <div class="row g-3 mt-2">
                        <div class="col-md-3">
                            <div class="dropdown">
                                <button
                                    class="btn btn-secondary dropdown-toggle"
                                    type="button"
                                    id="dropdownMenuButton"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Categorie
                                </button>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton"
                                >
                                    <li
                                        v-for="category in categories"
                                        :key="category.id"
                                    >
                                        <a
                                            class="drop dropdown-item"
                                            href="#"
                                            >{{ category.name }}</a
                                        >
                                    </li>
                                </ul>
                            </div>
                            <!-- <p
                                v-for="restaurant in restaurants"
                                :key="restaurant.id"
                            >
                                {{ restaurant.name }}
                            </p> -->
                        </div>
                        <p></p>
                        <div class="col-md-3">
                            <button class="btn btn-secondary btn-block">
                                Cerca risultato
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "AdvancedSearch",
    data() {
        return {
            categories: [],
            restaurants: [],
        };
    },
    methods: {
        fetchCategories() {
            // this.isLoading = true;
            axios
                .get(`http://localhost:8000/api/restaurants`)
                .then((res) => {
                    this.categories = res.data;
                    this.restaurants = res.data;
                    // this.pagination.current = current_page;
                    // this.pagination.last = last_page;
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
        this.fetchCategories();
    },
};
</script>
<style>
.drop {
    color: #000;
}
</style>
