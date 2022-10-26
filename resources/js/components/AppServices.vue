<template>
    <div>
      <h1 class="font-weight-bold text-success text-center">I nostri servizi</h1>
      <p class="text-justify my-5">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam deserunt,
        eaque iure illum qui iste quaerat voluptates molestias alias veniam
        beatae exercitationem suscipit. Perferendis sit quos optio ratione
        laboriosam aspernatur? Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Incidunt provident ex.
      </p>
      <!-- Rivedere rotta (about) -->
      <div class="d-flex justify-content-center">
        <a class="text-success" href=""> Scopri di più su di noi</a>
      </div>
    </div>
</template>

<script>
export default {
    name:"AppServices"
};
</script>

<style lang="scss" scoped>
h1 {
    margin-top: 50px;
}

p {
    font-size: 18px;
}

a {
    border: 2px solid lightgreen;
    padding: 8px 8px;
    border-radius: 24px;
    font-size: 17px;
    font-weight: bold;
    transition: 0.6s;

    &:hover{
        font-size: 18px;
        background-color: #60c442;
        color:white;
    }
}
</style>