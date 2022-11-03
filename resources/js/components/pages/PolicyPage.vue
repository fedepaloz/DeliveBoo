<template>
  <div class="container">
    <div class="row my-5 align-items-center">
      <div class=" col-4">
        <AppLogo id="logo-policy"/>
      </div>
      <div class="my-5 col-8">
        <h1 class="text-danger font-weight-bold">La nostra policy aziendale:</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
          perspiciatis, temporibus, provident unde molestias cupiditate, dicta
          tenetur esse facere doloremque qui! Numquam dicta incidunt ratione
          nobis corrupti reiciendis, similique eos.
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
          perspiciatis, temporibus, provident unde molestias cupiditate, dicta
          tenetur esse facere doloremque qui! Numquam dicta incidunt ratione
          nobis corrupti reiciendis, similique eos.
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import AppLogo from "../AppLogo.vue";
export default {
  name: "PolicyPage",
  components: {
    AppLogo,
  },
};
</script>

<style scoped>
#logo-policy {
    height: 150px;
}

p {
    font-size: 17px;
    text-align: justify;
}
</style>