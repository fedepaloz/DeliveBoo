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
            Dicono di noi
          </router-link>
          <router-link class="nav-link" :to="{ name: 'about' }">
            Dicono di noi
          </router-link>
          <router-link class="nav-link" :to="{ name: 'about' }">
            Dicono di noi
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
  }

  #deliveboo {
    font-size: 35px;
  }

  #header-logo {
    width: 40px;
  }
}
</style>
