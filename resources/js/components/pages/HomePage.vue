<template>
  <div>
    <!-- Jumbotron -->
    <section id="servizi">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-around">
          <div class="col-2"><AppLogo></AppLogo></div>

          <div class="col-6 text-center">
            <h2 class="bold">I nostri servizi</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam
              deserunt, eaque iure illum qui iste quaerat voluptates molestias
              alias veniam beatae exercitationem suscipit. Perferendis sit quos
              optio ratione laboriosam aspernatur?
            </p>
          </div>
          <div class="col-3">
            <img class="img-fluid"
              src="https://www.baraldi.it/wp-content/uploads/2021/03/Servizi.jpg"
              alt="servizi"
            />
          </div>
        </div>
      </div>
    </section>
    <!-- <section id="social">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-2">
            <h3>i nostri social</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-3"><h4>social</h4></div>
          <div class="col-3"><h4>social</h4></div>
          <div class="col-3"><h4>social</h4></div>
          <div class="col-3"><h4>social</h4></div>
        </div>
      </div>
    </section> -->
  </div>
</template>
<script>
import AppLogo from "../AppLogo.vue";
export default {
  name: "HomePage",
  components: {
    AppLogo,
  },
};
</script>
<style lang="scss" scoped>
</style>