<template lang="">
    <div class="container">
        <div
            class="row justify-content-center align-items-center text-center bg-light mt-4 py-3"
        >
            <div class="col-5">
                <img
                    class="img-fluid"
                    width="250px"
                    src="https://images.unsplash.com/photo-1571091718767-18b5b1457add?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8YnVyZ2VyfGVufDB8fDB8fA%3D%3D&w=1000&q=80"
                    alt="..."
                />
            </div>

            <div class="col-7">
                <h3 class="card-title">
                    Nome ristorante:
                    <span class="riepilogue-text"> {{ restaurant.name }} </span>
                </h3>
                <p class="card-text">
                    Indirizzo:
                    <span class="riepilogue-text">
                        {{ restaurant.address }}
                    </span>
                </p>
                <p class="card-text">
                    Orario Apertura:
                    <span class="riepilogue-text">{{
                        restaurant.opening_time
                    }}</span>
                </p>
                <p class="card-text">
                    Costo consegna:
                    <span class="riepilogue-text">{{
                        restaurant.delivery_cost
                    }}</span>
                </p>
                <p class="card-text">
                    Minimo d'ordine:
                    <span class="riepilogue-text">{{
                        restaurant.min_order
                    }}</span>
                </p>
                <button class="btn btn-search">
                    <a href="">Ordina ora</a>
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "RestaurantList",

    props: {
        restaurant: Object,
    },
};
</script>
<style scoped>
.select-bg {
    background-size: cover;
    background-image: url("https://png.pngtree.com/thumb_back/fh260/back_our/20190621/ourmid/pngtree-black-atmosphere-simple-meal-food-food-banner-image_176553.jpg");
    background-repeat: no-repeat;
}

.riepilogue-text {
    color: #60c442;
}

.btn-search {
    align-items: center;
    appearance: none;
    background-clip: padding-box;
    background-color: initial;
    background-image: none;
    border-style: none;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    flex-direction: row;
    flex-shrink: 0;
    font-family: Eina01, sans-serif;
    font-size: 16px;
    font-weight: 800;
    justify-content: center;
    line-height: 24px;
    margin: 0;
    min-height: 64px;
    outline: none;
    overflow: visible;
    padding: 19px 26px;
    pointer-events: auto;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-transform: none;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    vertical-align: middle;
    width: auto;
    word-break: keep-all;
    z-index: 0;
}

@media (min-width: 768px) {
    .btn-search {
        padding: 19px 32px;
    }
}

.btn-search:before,
.btn-search:after {
    border-radius: 80px;
}

.btn-search:before {
    background-image: linear-gradient(92.83deg, #60c442 0, #f93a13 100%);
    content: "";
    display: block;
    height: 100%;
    left: 0;
    overflow: hidden;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: -2;
}

.btn-search:after {
    background-color: initial;
    background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
    bottom: 4px;
    content: "";
    display: block;
    left: 4px;
    overflow: hidden;
    position: absolute;
    right: 4px;
    top: 4px;
    transition: all 100ms ease-out;
    z-index: -1;
}

.btn-search:hover:not(:disabled):before {
    background: linear-gradient(
        92.83deg,
        rgb(255, 116, 38) 0%,
        rgb(249, 58, 19) 100%
    );
}

.btn-search:hover:not(:disabled):after {
    bottom: 0;
    left: 0;
    right: 0;
    top: 0;
    transition-timing-function: ease-in;
    opacity: 0;
}
.btn-search a {
    text-decoration: none;
    color: white;
}

.btn-search:active:not(:disabled) {
    color: #ccc;
}

.btn-search:active:not(:disabled):before {
    background-image: linear-gradient(
            0deg,
            rgba(0, 0, 0, 0.2),
            rgba(0, 0, 0, 0.2)
        ),
        linear-gradient(92.83deg, #60c442 0, #f93a13 100%);
}

.btn-search:active:not(:disabled):after {
    background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
    bottom: 4px;
    left: 4px;
    right: 4px;
    top: 4px;
}

.btn-search:disabled {
    cursor: default;
    opacity: 0.24;
}

</style>
