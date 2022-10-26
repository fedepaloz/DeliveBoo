<template>
  <header>
    <nav class="navbar navbar-expand-lg bg-navbar">
      <div class="container">
        <!-- ! rotta da correggere ! -->
        <a class="navbar-brand" href="#">
          <i class="fa-solid fa-drumstick-bite"></i>
          Deliveboo
          <i class="fa-solid fa-pizza-slice"></i
        ></a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <!-- <li v-for="link in links" :key="link.name" class="nav-item">
                        <router-link class="nav-link" :to="{ name: link.name }"
                            >{{ link.title }}
                        </router-link>
                    </li> -->
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>
<script>
export default {};
</script>
<style lang="scss" scoped>
.bg-navbar {
    height: 100px;
    background-color: #60c442;

  a {
    color: white;
    font-size: 25px;
  }
}
</style>
