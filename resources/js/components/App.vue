<template lang="">
    <div class="body-bg">
        <AppHeader />
        <router-view></router-view>
        <HomePage />
        <AppFooter />
    </div>
</template>
<script>
import AppHeader from "./AppHeader.vue";
import HomePage from "./pages/HomePage.vue";
import AppFooter from "./AppFooter.vue";
export default {
    name: "App",

    components: {
        AppHeader,
        HomePage,
        AppFooter,
    },
};
</script>
<style>
.body-bg {
    background-size: 50%;
    background-repeat: repeat;
    background-image: url("https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/0f845043109755.57e3972eb7c0f.png");
}
</style>
