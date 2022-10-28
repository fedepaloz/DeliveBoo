<template>
  <div class="container card my-5">
    <hr class="hr" />
    <section
      id="partners-section"
      class="d-flex flex-column align-items-center"
    >
      <h1 class="font-weight-bold my-5 text-danger">I nostri Partner</h1>
      <ul class="d-flex align-items-center justify-content-center flex-wrap">
        <li class="m-3">
          <a href="https://www.mcdonalds.it/" target="_blank"
            ><img
              src="https://www.mcdonalds.it/themes/mcd/build/images/mcd_logo.svg"
              alt="McDonald's"
              class="rounded-circle img-effects"
          /></a>
        </li>
        <li class="m-3">
          <a href="https://www.rossopomodoro.it/default.aspx" target="_blank"
            ><img
              src="https://www.rossopomodoro.it/web/img/app-ico.png"
              alt="Rosso Pomodoro"
              class="rounded-circle img-effects"
          /></a>
        </li>
        <li class="m-3">
          <a href="https://www.kfc.it" target="_blank"
            ><img
              src="https://www.centrocommercialeaura.it/wp-content/uploads/2018/01/KFC_logo.svg_.png"
              alt="KFC"
              class="rounded-circle img-effects"
          /></a>
        </li>
        <li class="m-3">
          <a href="https://www.dominos.it/" target="_blank"
            ><img
              src="https://dominosfranchising.it/wp-content/uploads/2020/07/dominos_social_logo.jpg"
              alt="Dominos"
              class="rounded-circle img-effects"
          /></a>
        </li>
        <li class="m-3">
          <a href="https://www.sushicorner.it/" target="_blank"
            ><img
              src="https://static.xmenu.it/cache/restaurants/192/Logo-Brand_h300.png"
              alt="Sushi Corner"
              class="rounded-circle img-effects"
          /></a>
        </li>
        <li class="m-3">
          <a href="https://www.starbucks.it/" target="_blank"
            ><img
              src="https://upload.wikimedia.org/wikipedia/en/thumb/d/d3/Starbucks_Corporation_Logo_2011.svg/1200px-Starbucks_Corporation_Logo_2011.svg.png"
              alt="Starbucks"
              class="rounded-circle img-effects"
          /></a>
        </li>
      </ul>
    </section>

    <AppContacts />
    <hr class="hr" />
  </div>
</template>

<script>
import AppContacts from "./AppContacts.vue";
export default {
  name: "AppPartners",
  components: {
    AppContacts,
  },
};
</script>

<style lang="scss" scoped>
#partners-section {
  ul {
    list-style-type: none;
    padding-inline-start: 0;
    img {
      width: 150px;
    }
  }
}
.hr {
  border-top: 1px solid #b1291b;
  margin: 30px 0 30px 0;
}

.img-effects {
  transition: 0.6s;

  &:hover {
    border: 2px solid #b1291b;
    padding: 5px;
  }
}
</style>
