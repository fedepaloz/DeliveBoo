<template>
  <section id="become-partner" class="mt-5">
    <h1 class="text-danger text-center font-weight-bold">
      Diventa nostro Partner
    </h1>
    <div
      class="
        row
        align-items-center
        justify-content-center justify-content-evenly
      "
    >
      <div class="col-sm-7 col-md-6">
        <div class="card">
          <img
            src="https://img.freepik.com/premium-vector/vector-illustration-people-video-call-communicating-internet_625612-36.jpg?w=2000"
            class="card-img-top"
            alt="contact image"
          />
          <div class="card-body">
            <p class="card-text">
              <a href="#">
                <i class="fa-solid fa-phone text-danger"></i> 092 456 444</a
              >
            </p>
            <p class="card-text">
              <a href="#">
                <i class="fa-brands fa-square-facebook text-danger"></i>
                DeliveBoo</a
              >
            </p>
            <p class="card-text">
              <a href="#">
                <i class="fa-solid fa-envelope text-danger"></i>
                Deliveboo@food.it</a
              >
            </p>
            <p class="card-text">
              <a href="#">
                <i class="fa-brands fa-twitter text-danger"></i> DeliveBoo</a
              >
            </p>
            <p class="card-text">
              <a href="#">
                <i class="fa-brands fa-instagram text-danger"></i> DeliveBoo</a
              >
            </p>
          </div>
        </div>
      </div>

      <div class="col-sm-5 col-md-6">
        <img class="img-fluid" src="https://img.freepik.com/premium-vector/entrepreneurship-illustration-linear-design_362714-474.jpg" alt="">
        <p>*I nostri operatori telefonici saranno disponibili dalle 09:00 fino le 19:30 tutti i giorni lavorativi</p>
    </div>
    </div>
    
  </section>
</template>

<script>
import AppLogo from "./AppLogo.vue";

export default {
  name: "AppContacts",
  components: {
    AppLogo,
  },
};
</script>

<style scoped lang="scss">
h1 {
  text-align: center;
  margin-top: 45px;
}

p {
    font-size: 18px;
}

a {
  text-decoration: none;
  display: block;
  font-size: 20px;
  text-align: center;
  color: black;
  transition: 0.5s;
  margin: 5px;

  &:hover {
    color: #f0482e;
    font-size: 23px;
  }
}

</style>