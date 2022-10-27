<template>
        <div class="row my-5">
            <div class="col-12 d-flex">
                <div class="row align-items-md-center justify-content-md-between">
                    <div class="col-12 col-md-4">
                        <img
                        class="img-fluid"
                        src="https://images.unsplash.com/photo-1571091718767-18b5b1457add?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8YnVyZ2VyfGVufDB8fDB8fA%3D%3D&w=1000&q=80"
                        alt="..."
                        />
                    </div>
                    
                    <div class="col-md-7 col-12">
                        <h3 class="card-title"><strong>Nome ristorante: </strong><span class="riepilogue-text"> Restaurant </span></h3>
                        <p class="card-text"><strong>Indirizzo: </strong><span class="riepilogue-text">Address</span></p>
                        <p class="card-text"><strong>Orario Apertura: </strong><span class="riepilogue-text">Opening Time</span></p>
                        <p class="card-text"><strong>Orario Chiusura: </strong><span class="riepilogue-text">Closure Time</span></p>
                        <p class="card-text"><strong>Costo consegna: </strong><span class="riepilogue-text">Delivery Cost</span></p>
                        <p class="card-text"><strong>Minimo d'ordine: </strong><span class="riepilogue-text">Min Order</span></p>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    name: "AppRestaurantDetails",
}
</script>

<style scoped>
.riepilogue-text {
    color: #60c442;
}
</style>