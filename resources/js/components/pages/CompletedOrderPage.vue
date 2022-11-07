<template>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-6 bg-white rounded p-4">
                <div class="text-center h2">Ordine confermato!</div>
                <div class="text-center mb-2">
                    Abbiamo appena inviato una email di riepilogo all'indirizzo
                    {{ order.email }}, il ristorante ti invierà un orario di consegna appena possibile!
                </div>
                <div class="text-center text-black-50 mb-1">Nome</div>
                <div class="text-center h5 mb-3">{{ order.first_name }}</div>
                <div class="text-center text-black-50 mb-1">Cognome</div>
                <div class="text-center h5 mb-3">{{ order.last_name }}</div>
                <div class="text-center text-black-50 mb-1">
                    Indirizzo di spedizione
                </div>
                <div class="text-center h5 mb-3">
                    {{ order.delivery_address }}
                </div>
                <div class="text-center text-black-50 mb-1">Status</div>
                <div class="text-center h5 mb-3">
                    Arrivo previsto da confermare
                </div>
                <hr />
                <div class="h5 mb-4">Riepilogo ordine</div>
                <div class="row">
                    <div class="col-12">
                        <div class="row" v-for="item in items" :key="item.id">
                            <div class="col-1 col-xl-1">
                                {{ item.quantity }}x
                            </div>
                            <div class="col-10 col-xl-9">
                                {{ item.name }}
                            </div>
                            <div class="col-12 col-xl-2">
                                {{
                                    parseFloat(item.total)
                                        .toFixed(2)
                                        .replace(".", ",")
                                }}
                                €
                            </div>
                        </div>
                    </div>
                    <div class="col-1 mt-2 mb-4 d-none d-xl-block"></div>
                    <div class="col-10 col-xl-9 mt-2 mb-4">
                        Spese di spedizione
                    </div>
                    <div class="col-2 col-xl-2 mt-2 mb-4">
                        {{ parseFloat(dCost).toFixed(2).replace(".", ",") }} €
                    </div>
                    <div class="d-none d-xl-block col-1"></div>
                    <div class="col-9 h5">
                        Totale pagato:
                        {{ parseFloat(total).toFixed(2).replace(".", ",") }} €
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center text-black-50 mb-1">Nome</div>
        <div class="text-center h5 mb-3">{{ order.first_name }}</div>
        <div class="text-center text-black-50 mb-1">Cognome</div>
        <div class="text-center h5 mb-3">{{ order.last_name }}</div>
        <div class="text-center text-black-50 mb-1">
          Indirizzo di spedizione
        </div>
        <div class="text-center h5 mb-3">
          {{ order.delivery_address }}
        </div>
        <div class="text-center text-black-50 mb-1">Status</div>
        <div class="text-center h5 mb-3">Arrivo previsto da confermare</div>
        <hr />
        <div class="h5 mb-4">Riepilogo ordine</div>
        <div class="row">
          <div class="col-12">
            <div class="row" v-for="item in items" :key="item.id">
              <div class="col-1 col-xl-1">{{ item.quantity }}x</div>
              <div class="col-10 col-xl-9">
                {{ item.name }}
              </div>
              <div class="col-12 col-xl-2">
                {{ parseFloat(item.total).toFixed(2).replace(".", ",") }}
                €
              </div>
            </div>
          </div>
          <div class="col-1 mt-2 mb-4 d-none d-xl-block"></div>
          <div class="col-10 col-xl-9 mt-2 mb-4">Spese di spedizione</div>
          <div class="col-2 col-xl-2 mt-2 mb-4">
            {{ parseFloat(dCost).toFixed(2).replace(".", ",") }} €
          </div>
          <div class="d-none d-xl-block col-1"></div>
          <div class="col-9 h5">
            Totale pagato:
            {{ parseFloat(total).toFixed(2).replace(".", ",") }} €
          </div>
        </div>
      </div>
</template>

<script>
export default {
  name: "CompletedOrderPage",
  props: {
    items: Array,
    total: Number,
    dCost: Number,
    order: Object,
  },
};
</script>

<style scoped lang="scss"></style>
