<template lang="">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Nome ristorante</h1>
                <ul class="list-group">
                    <li class="list-group-item disabled" aria-disabled="true">
                        <div class="card mb-3">
                            <img src="" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Nome Piatto: ...</h4>
                                <p class="card-text">descrizione lunga piattooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo.</p>
                                <h5 class="card-text">Prezzo: ....</h5>
                                <!-- !!! Bottone da rivedere !!! -->
                                <button>Acquista</button>
                                <ul class="list-group">
                                    <!-- ciclo da fare qui -->
                                    <li class="list-group-item">Primo prodotto</li>
                                </ul>
                                <!-- Da rivedere -->
                                <div class="row">
                                    <div class="col-6">
                                        <h3>Totale: ...</h3>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-success">Acquista:</button>
                                    </div>
                                </div>
                                
                                
                          </div>
                        </div>
                    </li>
                </ul>

            </div>
            <div class="col-4">
                <h3>Carrello:</h3>
                <ul></ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  name: "RestaurantPage",
};
</script>
<style lang="">
</style>