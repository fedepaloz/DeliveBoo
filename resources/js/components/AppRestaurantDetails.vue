<template>
  <div class="row my-5 p-3 restaurant-card">
    <div class="col-12 d-flex">
      <div class="row align-items-md-center justify-content-md-between">
        <div class="col-12 col-md-4">
          <img
            class="img-fluid"
            :src="restaurant.image"
            :alt="restaurant.name"
          />
        </div>

        <div class="col-md-7 col-12 text-center">
          <h3 class="card-title ">
            <span class="riepilogue-text"> <strong>{{ restaurant.name }}</strong></span>
          </h3>
          <p class="card-text">
            <span class="riepilogue-text">{{ restaurant.address }}</span>
          </p>
          <p class="card-text">
            <strong>Orario Apertura: </strong
            ><span class="riepilogue-text">{{ restaurant.opening_time.slice(0, -3) }}</span>
          </p>
          <p class="card-text">
            <strong>Orario Chiusura: </strong
            ><span class="riepilogue-text">{{ restaurant.closure_time.slice(0, -3) }}</span>
          </p>
          <!-- due cifre dopo la virgola + aggiunta virgola -->
          <p class="card-text">
            <strong>Costo consegna: </strong
            ><span class="riepilogue-text">{{
              parseFloat(restaurant.delivery_cost).toFixed(2).replace(".", ",")
            }} €</span> 
          </p>
          <p class="card-text">
            <strong>Minimo d'ordine: </strong
            ><span class="riepilogue-text">{{
              parseFloat(restaurant.min_order).toFixed(2).replace(".", ",")
            }} €</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AppRestaurantDetails",
  props: {
    restaurant: Object,
  },
};
</script>

<style scoped>
.riepilogue-text {
  color: #f0482e;
  text-align: center;
  font-size: 20px;
}

.restaurant-card{
    border: 1px solid #f0482e;

}


</style>