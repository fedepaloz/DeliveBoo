<template lang="">
    <div class="body-bg">
        <AppHeader />
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
    background-image: url("https://cdn.discordapp.com/attachments/1030396020250648618/1034950385389031584/60-charming-food-background-thumb.png");
}
</style>
