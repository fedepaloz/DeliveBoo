<template>
    <div class="row justify-content-center">
        <div
            v-for="category in categories"
            :key="category.id"
            class="list-item col-6 col-md-2 m-1"
        >
            <div class="text-center">
                <input
                    type="checkbox"
                    class="form-check-input ml-2"
                    :value="category.id"
                    v-model="select_categories"
                    :id="category.id"
                    @change="emitCheckboxInput"
                />
                <label :for="category.id">
                    <h6 class="">{{ category.name }}</h6>
                    <img
                        :src="category.image"
                        :alt="category.name"
                        class="ml-2 img-fluid cat-img d-none d-md-block"
                    />
                </label>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "AdvancedSearch",
    props: {
        categories: Array,
    },
    data() {
        return {
            select_categories: [],
        };
    },

    methods: {
        emitCheckboxInput() {
            this.$emit("selected-categories", this.select_categories);
        },
    },
};
</script>

<style scoped lang="scss">
label {
    padding: 5px;
    display: block;
    position: relative;
    margin: 10px;
    cursor: pointer;
}

label:before {
    background-color: white;
    color: white;
    content: " ";
    display: block;
    border-radius: 50%;
    border: 1px solid grey;
    position: absolute;
    top: -5px;
    left: -5px;
    width: 25px;
    height: 25px;
    text-align: center;
    line-height: 28px;
    transition-duration: 0.4s;
    transform: scale(0);
}

label img {
    height: 100px;
    width: 100px;
    transition-duration: 0.2s;
    transform-origin: 50% 50%;
}

:checked + label {
    border-color: #ddd;
}

:checked + label:before {
    content: "✓";
    background-color: grey;
    transform: scale(1);
}

:checked + label img {
    transform: scale(0.9);
    box-shadow: 0 0 5px #333;
    z-index: -1;
}
input {
    display: none;
}

.select-bg {
    background-size: cover;
    background-image: url("https://png.pngtree.com/thumb_back/fh260/back_our/20190621/ourmid/pngtree-black-atmosphere-simple-meal-food-food-banner-image_176553.jpg");
    background-repeat: no-repeat;
}
.cat-img {
    width: 94%;
    height: 80%;
    margin-top: 5px;
}
.list-item {
    padding: 7px;
    color: white;
    background-color: #b1291b;
    border-radius: 8px;
    transition: 0.3s;
    border: 1px solid black;

    &:hover {
        margin: 10px 10px;
        background-color: white;
        color: #b1291b;
        border: 1.5px solid #b1291b;
    }
}

.check {
    display: none;
}
</style>
