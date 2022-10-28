<template>
  <div class="row align-items-center">
    <div class="col-sm-12 col-md-7 col-l-6" >
      <h1 class="font-weight-bold text-danger text-center">I nostri servizi</h1>
      <p class="text-justify my-5">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam deserunt,
        eaque iure illum qui iste quaerat voluptates molestias alias veniam
        beatae exercitationem suscipit. Perferendis sit quos optio ratione
        laboriosam aspernatur? Lorem ipsum dolor sit amet consectetur
        adipisicing elit. Incidunt provident ex.
      </p>

      <div class="d-flex justify-content-center">
        <a href="/about"> Scopri di più su di noi</a>
      </div>
    </div>
    <div class="col-sm-12 col-md-5 col-l-6">
      <img class="img-fluid"
        src="https://cdn0.iconfinder.com/data/icons/shopping-461/200/Order-food-online-2-512.png"
        alt=""
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "AppServices",
};
</script>

<style lang="scss" scoped>
p {
  font-size: 18px;
}

h1 {
  font-size: 45px;
}

a {
  border: 3px solid #b1291b;
  padding: 8px 8px;
  border-radius: 24px;
  font-size: 17px;
  font-weight: bold;
  transition: 0.6s;
  color: #b1291b;
  margin-bottom: 20px;
  text-decoration: none;

  &:hover {
    font-size: 18px;
    background-color: #b1291b;
    color: white;
  }
}
</style>