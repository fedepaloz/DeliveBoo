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
<style></style>
