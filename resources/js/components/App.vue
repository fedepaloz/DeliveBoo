<template lang="">
    <div class="body-bg">
        <AppHeader />
        <router-view></router-view>
        <AppFooter />
    </div>
</template>
<script>
import AppHeader from "./AppHeader.vue";
import AppFooter from "./AppFooter.vue";
export default {
    name: "App",

    components: {
        AppHeader,
        AppFooter,
    },
};
</script>
<style>
.body-bg {
    background-image: url('/../images/bg-bg-bg-bg-bg.webp');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position-y: 50%;    
}
</style>
