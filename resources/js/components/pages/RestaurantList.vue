<template lang="">
    <div>
        <div class="card mb-3" style="max-width: 540px">
            <!-- Ciclo "For" qui -->
            <div class="row no-gutters">
                <div class="col-md-12">
                    <!-- <img src="restaurant.image" alt="..." /> -->
                </div>
                <div v-for="restaurant in restaurants" :key="restaurant.id" class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title">
                            Nome ristorante: {{ restaurant.name }}
                        </h3>
                        <p class="card-text">
                            Indirizzo: {{ restaurant.address }}
                        </p>
                        <p class="card-text">
                            Orario Apertura: {{ restaurant.opening_time }}
                        </p>
                        <p class="card-text">
                            Costo consegna: {{ restaurant.delivery_cost }}
                        </p>
                        <p class="card-text">
                            Minimo d'ordine: {{ restaurant.min_order }}
                        </p>
                        <button class="btn btn-success">
                            <a href="">Ordina ora</a>
                        </button>
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
<style lang=""></style>
