<template lang="">
    <div class="container my-5">
        <div class="row justify-content-between flex-wrap">
     
            <div class="col-sm-12 col-md-6" v-for="restaurant in restaurants" :key="restaurant.id">
            <div class="card p-2  my-3">
                <div>
                    <img class="p-1 card-img-top" src="https://images.unsplash.com/photo-1571091718767-18b5b1457add?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8YnVyZ2VyfGVufDB8fDB8fA%3D%3D&w=1000&q=80" alt="...">
                </div>
                <div class="text-center">
                    <h4 class="card-title text-danger my-3">{{ restaurant.name }} </h4> 
                    <h6 class="card-title"> {{ restaurant.address }}</h6>
                    <p class="card-text">Costo consegna: €{{ restaurant.delivery_cost}}</p>
                    <p class="card-text">Mimino ordine: €{{ restaurant.min_order }}</p>
                    <p class="card-text">Orari: {{restaurant.opening_time}} - {{restaurant.closure_time}}</p>
                    <router-link :to="{ name: 'restaurant-page', params: { id: restaurant.id }}" class="btn btn-danger">
                        Ordina da {{restaurant.name}} ora
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
    restaurants: Object,
  },
};
</script>
<style scoped>
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
