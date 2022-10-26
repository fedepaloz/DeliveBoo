<template lang="">
    <div>
        <AppHeader />
        <AdvancedSearch />
        
    </div>
</template>
<script>
import AppHeader from "./AppHeader.vue";
import AdvancedSearch from "./pages/AdvancedSearch.vue";
export default {
    name: "App",

    components: {
        AppHeader,
        AdvancedSearch
    }
};
</script>
<style lang="">

</style>
