<template>
    <div>
      <h1 class="font-weight-bold text-danger text-center">I nostri servizi</h1>
      <p class="text-justify my-5">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam deserunt,
        eaque iure illum qui iste quaerat voluptates molestias alias veniam
        beatae exercitationem suscipit. Perferendis sit quos optio ratione
        laboriosam aspernatur? Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Incidunt provident ex.
      </p>
      <!-- Rivedere rotta (about) -->
      <div class="d-flex justify-content-center">
        <a class="text-danger" href=""> Scopri di più su di noi</a>
      </div>
    </div>
</template>

<script>
export default {
    name:"AppServices"
};
</script>

<style lang="scss" scoped>


p {
    font-size: 18px;
}

a {
    border: 2px solid #b1291b;
    padding: 8px 8px;
    border-radius: 24px;
    font-size: 17px;
    font-weight: bold;
    transition: 0.6s;
    color: #b1291b;
    text-decoration: none;

    &:hover{
      font-size: 18px;
        background-color: #b1291b;
        color:white;
    }
}
</style>