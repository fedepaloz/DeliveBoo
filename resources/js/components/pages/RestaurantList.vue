<template lang="">
    <div class="container my-5">
        <div class="row justify-content-between flex-wrap">
            <div
                class="col-sm-12 col-md-6 col-lg-4"
                v-for="restaurant in restaurants"
                :key="restaurant.id"
            >
                <!-- card nuova -->
                <div class="card">
                    <div class="card-header">
                        <img :src="restaurant.image" alt="rover" />
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-danger my-3">
                            {{ restaurant.name }}
                        </h4>
                        <h6>{{ restaurant.address }}</h6>
                        <h6>
                            <strong> Costo consegna:</strong> €{{
                                restaurant.delivery_cost
                            }}
                        </h6>
                        <h6>
                            <strong>Mimino ordine:</strong> €{{
                                restaurant.min_order
                            }}
                        </h6>
                        <h6>
                            <strong>Orari:</strong>
                            {{ restaurant.opening_time }} -
                            {{ restaurant.closure_time }}
                        </h6>
                        <router-link
                            :to="{
                                name: 'restaurant-page',
                                params: { id: restaurant.id },
                            }"
                            class="btn btn-danger mt-2"
                        >
                            Ordina da {{ restaurant.name }} ora
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "RestaurantList",

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
    border: 2px solid black;
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
