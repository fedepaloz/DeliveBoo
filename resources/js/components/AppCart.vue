<template>
  <div class="card mb-4 shadow-sm col-4" id="cart">
    <div class="card-header">
      <h2>Carrello</h2>
    </div>
    <div class="card-body">
      <table class="table">
        <tbody class="cart"></tbody>
        <tfoot>
          <td>piatto</td>
          <td>quantita</td>
          <td>
            <button
              type="button"
              class="btn btn-block btn-sm btn-outline-primary"
              onclick="cartLS.quantity(3,1)"
            >
              +
            </button>
          </td>
          <td>
            <button
              type="button"
              class="btn btn-block btn-sm btn-outline-primary"
              onclick="cartLS.quantity(3,-1)"
            >
              -
            </button>
          </td>
          <td class="text-right">Prezzo: <strong class="total"></strong></td>
          <td><button class="btn btn-danger">Cancella</button></td>
          
          
        </tfoot>
    </table>
    <div>TOTALE</div>
</div>
  </div>
</template>

<script>
export default {
  name: "AppCart",
};
</script>

<style lang="scss" scoped>

</style>

