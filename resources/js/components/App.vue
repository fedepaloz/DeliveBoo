<template lang="">
    <div>
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
<style lang=""></style>
