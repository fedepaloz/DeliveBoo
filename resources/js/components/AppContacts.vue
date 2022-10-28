<template>
    <section id="become-partner" class="my-5">
        <h1 class="text-danger text-center mt-5"> Diventa nostro Partner</h1>
        <div class="row align-items-center justify-content-center justify-content-between">

            <div class="col-s-12 col-sm-7 col-l-9">
                <a href="#"> <i class="fa-solid fa-phone text-danger"></i> 092 456 444</a>
                <a href="#"> <i class="fa-solid fa-envelope text-danger"></i>  Deliveboo@food.it</a>
                <a href="#"> <i class="fa-brands fa-square-facebook text-danger"></i> DeliveBoo</a>
                <a href="#"> <i class="fa-brands fa-twitter text-danger"></i> DeliveBoo</a>
                <a href="#"> <i class="fa-brands fa-instagram text-danger"></i> DeliveBoo</a>
            </div>

            <div class="col-s-12 col-sm-5 col-l-3">
                <AppLogo class="p-5"/>
            </div>

        </div>
    </section>
            
</template>

<script>
import AppLogo from "./AppLogo.vue";

export default {
  name: "AppContacts",
  components: {
    AppLogo
  }
};
</script>

<style scoped lang="scss">
h1 {
    text-align: center;
    margin-bottom: 45px;
}

a {
    text-decoration: none;
    display:block;
    margin: 5px;
    font-size: 20px;
    text-align: center;
    color: black;
    transition: 0.5s;

    &:hover {
        color: #f0482e;
        font-size: 23px;
    }
};
</style>