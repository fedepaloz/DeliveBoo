<template>
  <div>
    <section
      id="partners-section"
      class="d-flex flex-column align-items-center"
    >
      <h1 class="font-weight-bold my-5 text-danger">I nostri Partner</h1>
      <ul class="d-flex align-items-center justify-content-center flex-wrap">
        <li class="m-2">
          <a href="https://www.mcdonalds.it/" target="_blank"
            ><img
              src="https://www.mcdonalds.it/themes/mcd/build/images/mcd_logo.svg"
              alt="McDonald's"
              class="rounded-circle img-effects"
          /></a>
        </li>
        <li class="m-2">
          <a href="https://www.rossopomodoro.it/default.aspx" target="_blank"
            ><img
              src="https://www.rossopomodoro.it/web/img/app-ico.png"
              alt="Rosso Pomodoro"
              class="rounded-circle img-effects"
          /></a>
        </li>
        <li class="m-2">
          <a href="https://www.kfc.it" target="_blank"
            ><img
              src="https://www.centrocommercialeaura.it/wp-content/uploads/2018/01/KFC_logo.svg_.png"
              alt="KFC"
              class="rounded-circle img-effects"
          /></a>
        </li>
        <li class="m-2">
          <a href="https://www.dominos.it/" target="_blank"
            ><img
              src="https://dominosfranchising.it/wp-content/uploads/2020/07/dominos_social_logo.jpg"
              alt="Dominos"
              class="rounded-circle img-effects"
          /></a>
        </li>
        <li class="m-2">
          <a href="https://www.sushicorner.it/" target="_blank"
            ><img
              src="https://static.xmenu.it/cache/restaurants/192/Logo-Brand_h300.png"
              alt="Sushi Corner"
              class="rounded-circle img-effects"
          /></a>
        </li>
        <li class="m-2">
          <a href="https://www.starbucks.it/" target="_blank"
            ><img
              src="https://upload.wikimedia.org/wikipedia/en/thumb/d/d3/Starbucks_Corporation_Logo_2011.svg/1200px-Starbucks_Corporation_Logo_2011.svg.png"
              alt="Starbucks"
              class="rounded-circle img-effects"
          /></a>
        </li>
        <li class="m-2">
          <a href="https://www.bunburgers.it/" target="_blank"
            ><img
              src="data:image/png;base64,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"
              alt="bun burgers"
              class="rounded-circle img-effects"
          /></a>
        </li>
        <li class="m-2">
          <a href="https://www.pokehouse.it/" target="_blank"
            ><img
              src="https://media-exp1.licdn.com/dms/image/C4D0BAQGA1bVUuLjvTQ/company-logo_200_200/0/1543422637720?e=2147483647&v=beta&t=98vGJkESlJiE6XuwQFj5uLNhGu7_2r5xXtpRuZtuBtI"
              alt="poke house"
              class="rounded-circle img-effects"
          /></a>
        </li>
      </ul>
    </section>
  </div>
</template>

<script>
export default {
  name: "AppPartners",

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

.img-effects {
  transition: 0.6s;

  &:hover {
    border: 3px solid #b1291b;
    padding: 5px;
  }
}
</style>
