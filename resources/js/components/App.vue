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
    padding-top: 98px;
    background-image: url('/../images/bbgg.png');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position-y: 50%;    
}
</style>
