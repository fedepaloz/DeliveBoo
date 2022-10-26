<template lang="">
    <div>
        <AppHeader />
        <AdvancedSearch />
        <HomePage />
        <AppFooter />
    </div>
</template>
<script>
import AppHeader from "./AppHeader.vue";
import HomePage from "./pages/HomePage.vue";
import AppFooter from "./AppFooter.vue";
import AdvancedSearch from "./pages/AdvancedSearch.vue";
export default {
    name: "App",

    components: {
        AppHeader,
        HomePage,
        AppFooter,
        AdvancedSearch,
    },
};
</script>
<style lang=""></style>
