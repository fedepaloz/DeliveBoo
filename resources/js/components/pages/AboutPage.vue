<template>
  <div class="container my-5">

    <div class="my-5">
    <h4 class="text-danger"><i class="fa-solid fa-carrot"></i> Chi siamo:</h4>
    <p class="my-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque maxime, alias autem quae optio velit adipisci dolorem deserunt. Explicabo, repudiandae. Nobis, modi. Eveniet corporis <a href="/">laudantium</a> alias possimus, exercitationem quasi iusto!</p>
    <h4 class="text-danger"><i class="fa-solid fa-pizza-slice"></i> Il nostro obbiettivo:</h4>
    <p class="my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, fugit. Autem asperiores ea doloribus. Consequatur dolores nulla id molestiae voluptates qui facere repudiandae similique, tenetur modi tempore officia optio pariatur! Dolorem itaque ad repudiandae animi ratione adipisci obcaecati, eveniet rem harum at facilis quasi quas repellendus vero explicabo reiciendis praesentium, omnis numquam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, eaque? Ratione, cumque quas non quam id dolores dolorem temporibus, voluptas deserunt fugit ad maiores, iure inventore iste beatae ab aperiam.</p>
    <h4 class="text-danger"><i class="fa-solid fa-cookie-bite"></i> Il nostro impegno:</h4>
    <p class="my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem itaque ad repudiandae animi ratione adipisci obcaecati, eveniet rem harum at facilis quasi quas repellendus vero explicabo reiciendis praesentium, omnis numquam. <a href="/">Lorem</a> ipsum dolor sit amet consectetur adipisicing elit.</p>
    <h4 class="text-danger"><i class="fa-solid fa-bowl-food"></i> La nostra community:</h4>
    <p class="my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem itaque ad repudiandae animi ratione adipisci obcaecati, eveniet rem harum at facilis quasi quas repellendus <a href="/">vero</a> explicabo reiciendis praesentium. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, eaque? Ratione, cumque quas non quam id dolores dolorem temporibus, voluptas deserunt fugit ad maiores, iure inventore iste beatae ab aperiam.</p>
    <h4 class="text-danger"><i class="fa-solid fa-people-group"></i> Il nostro team:</h4>
    <div class="my-3">
      <div class="row justify-content-center">
        <div class="col-4">
          <figure class="card p-3">
            <img src="/../images/fp.png" alt="" class="img-fluid">
            <h3>Federico Palozzi</h3>
          </figure>
        </div>
        <div class="col-4">
          <figure class="card p-3">
            <img src="/../images/mc.jpeg" alt="" class="img-fluid">
            <h3>Marco Calligaris</h3>
          </figure>
        </div>
        <div class="col-4">
          <figure class="card p-3">
            <img src="/../images/ac.png" alt="" class="img-fluid">
            <h3>Alessio Cordari</h3>
          </figure>
        </div>
        <div class="col-4">
          <figure class="card p-3">
            <img src="/../images/fe.png" alt="" class="img-fluid">
            <h3>Fabrizio Ettori</h3>
          </figure>
        </div>
        <div class="col-4">
          <figure class="card p-3">
            <img src="/../images/fh.png" alt="" class="img-fluid">
            <h3>Federica Hu</h3>
          </figure>
        </div>
      </div>
    </div>
    </div>
    <div></div>
  </div>
</template>

<script>
export default {
    name: "AboutPage"
}
</script>

<style scoped lang="scss">
h4 {
  font-size: 24px;
  margin-top: 20px;
}
p{
 font-size: 18px;
 text-align: justify;
 display:inline-block;
}

figure{
  height: 410px;
}

h3{
  margin-top: 15px;
  color: red;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  text-align: center;
  font-size: 22px;
}
</style>