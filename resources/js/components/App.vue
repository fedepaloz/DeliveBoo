<template lang="">
    <div>
        <AppHeader />
        <HomePage />
    </div>
</template>
<script>
import AppHeader from "./AppHeader.vue";
import HomePage from "./pages/HomePage.vue";
export default {
    name: "App",

    components: {
        AppHeader,
        HomePage,
    }
};
</script>
<style lang="">

</style>
