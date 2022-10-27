<template>
    <ul class="list-unstyled">
        <li v-for="item in items" :key="item.id" class="item-card col-12 mb-3">
            <div class="row">
                <div class="col-3">
                    <img :src="item.image" alt="" class="img-fluid py-2" />
                </div>
                <div class="col-9 py-2 d-flex flex-column">
                    <div>
                        <h3>{{ item.name }}</h3>
                        <div class="mb-1">{{ item.description }}</div>
                    </div>
                    <div class="h5 mb-0">{{ item.price }} €</div>
                </div>
                <div class="col-9 offset-3 mb-2">
                    <span class="btn btn-primary" type="button">+</span>
                    <span class="btn btn-primary" type="button">-</span>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    name: "RestaurantMenu",
    props: {
        items: Array,
    },
};
</script>

<style lang="scss" scoped>
.item-card {
    border: 1px solid #0000000a;
    box-shadow: none;
    cursor: pointer;
    height: 100%;
    outline: none;
    overflow: hidden;
    position: relative;
    transition: box-shadow 0.2s ease-in-out;
    width: 100%;
    word-break: break-word;

    &:hover {
        box-shadow: 0 22px 24px 0 #00000014;
    }
}
</style>
