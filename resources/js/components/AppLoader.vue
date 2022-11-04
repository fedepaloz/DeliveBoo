<template>
    <div class="loader-overlay">
        <div class="spinner-border" role="status"></div>
    </div>
</template>
<script>
export default {
    name: "AppLoader",
};
</script>
<style lang="scss" scoped>
.loader-overlay {
    position: fixed;
    display: flex;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    background-color: rgba(44, 41, 41, 0.5);
    align-items: center;
    justify-content: center;
    z-index: 9;

    .spinner-border {
        width: 250px;
        height: 250px;
        background-image: url('https://codemyui.com/wp-content/uploads/2018/02/cheesy-pizza-loader.gif');
        background-position: center
    }
}
</style>