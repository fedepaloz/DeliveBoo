<template>
        <div class="row my-5">
            <div class="col-12 d-flex">
                <div class="row align-items-md-center justify-content-md-between">
                    <div class="col-12 col-md-4">
                        <img
                        class="img-fluid"
                        :src="restaurant.image"
                        :alt="restaurant.name"
                        />
                    </div>
                    
                    <div class="col-md-7 col-12">
                        <h3 class="card-title"><strong>Nome ristorante: </strong><span class="riepilogue-text">{{ restaurant.name }}</span></h3>
                        <p class="card-text"><strong>Indirizzo: </strong><span class="riepilogue-text">{{ restaurant.address }}</span></p>
                        <p class="card-text"><strong>Orario Apertura: </strong><span class="riepilogue-text">{{ restaurant.opening_time }}</span></p>
                        <p class="card-text"><strong>Orario Chiusura: </strong><span class="riepilogue-text">{{ restaurant.closure_time }}</span></p>
                        <p class="card-text"><strong>Costo consegna: </strong><span class="riepilogue-text">{{ restaurant.delivery_cost }}</span></p>
                        <p class="card-text"><strong>Minimo d'ordine: </strong><span class="riepilogue-text">{{ restaurant.min_order }}</span></p>
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
    }
}
</script>

<style scoped>
.riepilogue-text {
    color: #60c442;
}
</style>