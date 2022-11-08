<template>
  <div>
    <AppSlider />
    <section id="services">
      <div class="container mt-4">
        <div class="card mt-5">
            <hr class="hr"/>
          <h2 class="h2-homepage text-danger text-center my-3">
            Fame? Di cosa hai voglia?
          </h2>
          <AdvancedSearch
            :categories="categories"
            @selected-categories="fetchFilteredRestaurants"
          />
          <hr class="hr"/>
        </div>
      </div>

            <div class="container">
                <AppLoader v-if="isLoading" />
                <div v-if="restaurants">
                    <RestaurantList :restaurants="restaurants" />
                    <AppPagination
                        v-if="pagination.last > 1"
                        @change-page="fetchRestaurantsByPagination"
                        :lastPage="pagination.last"
                        :currentPage="pagination.current"
                    />
                </div>

        <div>
          <div class="container card my-5">
            <hr />
            <div class="row justify-content-center align-items-center my-5">
              <div class="col">
                <AppServices />
              </div>
            </div>
            <hr />
          </div>
          <div class="container card my-5">
            <hr />
            <AppPartners />
            <hr />
          </div>
          <div class="container card my-5">
            <hr />
            <AppContacts />
            <hr />
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
      categories: [],
      restaurants: [],
      isLoading: false,
      select_categories: [],
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
      //prima pagina di ristoranti
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

    //filtro ristoranti + categorie
    fetchFilteredRestaurants(value, page = 1) {
      if (value.length) {
        this.select_categories = value;
        this.isLoading = true;

        axios
          .get(
            `http://localhost:8000/api/restaurants?${this.select_categories
              .map((cat, index) => `categories[${index}]=${cat}`)
              .join("&")}&page=${page}`
          )
          .then((res) => {
            const { data, current_page, last_page } = res.data;
            this.restaurants = data;
            this.pagination.current = current_page;
            this.pagination.last = last_page;
          })
          .catch((err) => {
            this.error = "Errore durante il fetch dei ristoranti";
          })
          .then(() => {
            this.isLoading = false;
          });
      } else {
        this.fetchRestaurants();
      }
    },
    fetchRestaurantsByPagination(value) {
      this.isLoading = true;
      if (this.select_categories.length) {
        axios
          .get(
            `http://localhost:8000/api/restaurants?${this.select_categories
              .map((cat, index) => `categories[${index}]=${cat}`)
              .join("&")}&page=${value}`
          )
          .then((res) => {
            const { data, current_page, last_page } = res.data;
            this.restaurants = data;
            this.pagination.current = current_page;
            this.pagination.last = last_page;
          })
          .catch((err) => {
            this.error = "Errore durante il fetch dei ristoranti";
          })
          .then(() => {
            this.isLoading = false;
          });
      } else {
        axios
          .get(`http://localhost:8000/api/restaurants?page=${value}`)
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
      }
    },
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
  },
  mounted() {
    this.fetchCategories();
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
hr {
  border-top: 1px solid #b1291b;
  margin: 30px 0 30px 0;
}
</style>
