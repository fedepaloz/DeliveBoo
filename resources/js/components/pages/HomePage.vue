<template>
  <div>
    <section id="services">
      <div class="container">
        <AppLoader v-if="isLoading" />
        <AdvancedSearch @filtered-restaurants="filteredRestaurants" />
        <div v-if="restaurants.length >=1 ">

          <RestaurantList :restaurants="restaurants"/>
          </div>
        <!-- ! Prima sezione (I nostri servizi) -->
        <div v-else>
          <div class="container card my-5">
            <hr class="hr" />
            <!-- logo -->
            <div class="row justify-content-center align-items-center my-5">
              <div class="col">
                <AppServices />
              </div>
              <div class="col-12">
                <div id="bg-Services"></div>
              </div>
            </div>
            <hr class="hr" />
          </div>
          <!-- ! Fine prima sezione -->
          <AppPartners />
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
import AppLoader from "../AppLoader.vue";
import AdvancedSearch from "./AdvancedSearch.vue";

export default {
  name: "HomePage",
  data() {
    return {
      restaurants: [],
      isLoading: false,
    };
  },
  components: {
    AppServices,
    AppCart,
    AppLoader,
    AppPartners,
    RestaurantList,
    AdvancedSearch,
  },
  methods: {
    fetchRestaurants() {
      this.isLoading = true;
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
      this.restaurants = value;
    },
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
