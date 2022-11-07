<template lang="">

    <div class="container my-5">
        <div class="row justify-content-center flex-wrap">
            <div
                class="col-sm-8 col-md-6 col-lg-4"
                v-for="restaurant in restaurants"
                :key="restaurant.id"
            >
            
                <!-- card nuova -->
                <div class="card">
                    <div class="card-header">
                        <img :src="restaurant.image.includes('http') ? restaurant.image : 'http://127.0.0.1:8000/storage/' + restaurant.image" :alt="restaurant.name" />
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-danger my-3">
                            {{ restaurant.name }}
                        </h4>
                        <h6>{{ restaurant.address }}</h6>
                        <h6>
                            <strong> Costo consegna:</strong> €{{
                                parseFloat(parseFloat(restaurant.min_order).toFixed(2).replace(".", ",")).toFixed(2).replace(".", ",")
                            }}
                        </h6>
                        <h6>
                            <strong>Mimino ordine:</strong> €{{
                               parseFloat(restaurant.min_order).toFixed(2).replace(".", ",")
                            }}
                        </h6>
                        <h6>
                            <strong>Orari:</strong>
                            {{ restaurant.opening_time.slice(0, -3) }} -
                            {{ restaurant.closure_time.slice(0, -3) }}
                        </h6>
                        <router-link
                            :to="{
                                name: 'restaurant-page',
                                params: { id: restaurant.id },
                            }"
                            class="btn btn-danger mt-2"
                        >
                            Ordina ora
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>
<script>
import AppPagination from "../AppPagination.vue";

export default {
    name: "RestaurantList",
    componets: {
        AppPagination,
    },
    props: {
        restaurants: Array,
    },
};
</script>
<style scoped lang="scss">
.card {
    margin: 10px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    width: 300px;
    border: 1px solid black;
}
.card-header img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
.card-body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    padding: 20px;
    min-height: 250px;
}

.tag {
    background: #cccccc;
    border-radius: 50px;
    font-size: 12px;
    margin: 0;
    color: #fff;
    padding: 2px 10px;
    text-transform: uppercase;
    cursor: pointer;
}
.tag-teal {
    background-color: #47bcd4;
}
.tag-purple {
    background-color: #5e76bf;
}
.tag-pink {
    background-color: #cd5b9f;
}

.card-body p {
    font-size: 13px;
    margin: 0 0 40px;
}
.user {
    display: flex;
    margin-top: auto;
}

.user img {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    margin-right: 10px;
}
.user-info h5 {
    margin: 0;
}
.user-info small {
    color: #545d7a;
}

.select-bg {
    background-size: cover;
    background-image: url("https://png.pngtree.com/thumb_back/fh260/back_our/20190621/ourmid/pngtree-black-atmosphere-simple-meal-food-food-banner-image_176553.jpg");
    background-repeat: no-repeat;
}

.riepilogue-text {
    color: #b1291b;
    text-align: left;
}
</style>
