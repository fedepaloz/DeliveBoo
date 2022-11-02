<template lang="">
    <div class="body-bg">
        <AppHeader />
        <AppSlider />
        <router-view></router-view>
        <AppFooter />
    </div>
</template>
<script>
import AppHeader from "./AppHeader.vue";
import AppFooter from "./AppFooter.vue";
import AppSlider from "./AppSlider.vue";
export default {
    name: "App",

    components: {
        AppHeader,
        AppFooter,
        AppSlider,
    },
};
</script>
<style></style>
