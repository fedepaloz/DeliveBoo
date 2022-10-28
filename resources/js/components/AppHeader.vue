<template>
  <header>
    <nav class="navbar navbar-expand-lg bg-navbar">
      <div class="container">
        <div class="row">
          <a class="navbar-brand" href="/" id="deliveboo">
            <div class="row align-items-center">
              <AppLogo id="header-logo" class="mr-3" />Deliveboo
            </div>
          </a>
        </div>
        <div class="row">
          <router-link class="nav-link" :to="{ name: 'about' }">
            <i class="fa-regular fa-comment"></i> Dicono di noi
          </router-link>
          <router-link class="nav-link" :to="{ name: 'about' }">
            <i class="fa-solid fa-scale-balanced"></i> Policy aziendale
          </router-link>
          <router-link class="nav-link" :to="{ name: 'home' }">
            <i class="fa-solid fa-house-user"></i>Torna alla Home
          </router-link>
        </div>
      </div>
    </nav>
  </header>
</template>
<script>
import AppLogo from "./AppLogo.vue";
export default {
  name: "AppHeader",
  components: {
    AppLogo,
  },
};
</script>
<style lang="scss" scoped>
.bg-navbar {
  height: 100px;
  background-color: #b1291b;

  a {
    color: white;
    font-size:16px;
    transition: 0.3s;
    margin-left: 5px;

    &:hover {
      font-size: 18px;
      border: 2px solid white;
      border-radius: 25px;
    }
  }

  #deliveboo {
    font-size: 35px;
  }

  #header-logo {
    width: 40px;
  }
}
</style>
