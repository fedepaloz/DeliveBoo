<template lang="">
    <div id="homepage-slider" class="st-slider">
        <input type="radio" class="cs_anchor radio" name="slider" id="slide1" />
        <input type="radio" class="cs_anchor radio" name="slider" id="slide2" />
        <input type="radio" class="cs_anchor radio" name="slider" id="slide3" />
        <input
            type="radio"
            class="cs_anchor radio"
            name="slider"
            id="play1"
            checked=""
        />

        <div class="images">
            <div class="images-inner">
                <div class="image-slide">
                    <div
                        class="first-bg-slide image bg-yellow"
                        style="background-color: yellow"
                        
                    ></div>
                </div>
                <div class="image-slide">
                    <div
                        class="second-bg-slide image bg-blue"
                        style="background-color: pink"
                    ></div>
                </div>
                <div class="image-slide">
                    <div
                        class="third-bg-slide image bg-red"
                        style="background-color: orange"
                    >
                    </div>
                </div>
                <div class="image-slide">
                    <div
                        class="fourth-bg-slide image bg-red"
                        style="background-color: blue"
                    ></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "AppSlider",
};
</script>
<style lang="scss" scoped>

.first-bg-slide {
    background-image: url("https://i.pinimg.com/originals/7c/a2/97/7ca297fa04822482371852ee91fed401.jpg");
    background-size: cover;
    background-position-y: center;
    background-repeat: no-repeat;
}
.second-bg-slide {
    background-image: url("https://www.burgerking.it/site/assets/files/slide-baconking3.png");
    background-size: cover;
    background-position-y: center;
    background-repeat: no-repeat;
}
.third-bg-slide {
    background-image: url("https://www.mcdonalds.it/sites/default/files/styles/compressed/public/product_category/menu--hero-dsk.jpg?itok=YEX__Uhj");
    background-size: cover;
    background-position-y: center;
    background-repeat: no-repeat;
}
.fourth-bg-slide {
    background-image: url("https://www.collater.al/wp-content/uploads/2021/04/mother_kfc_borrowed_slogans_advertising_itsni.width-1440_te9lBFsG7vyNZiZg.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.image {
    width: 100%;
    height: 400px;
    position: static;
    top: 100px;
    left: 0;
    right: 0;
    z-index: -1;
}
.radio {
    display: none;
}
.images {
    overflow: hidden;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
}
.images-inner {
    width: 500%;
    transition: all 800ms cubic-bezier(0.77, 0, 0.175, 1);
    transition-timing-function: cubic-bezier(0.77, 0, 0.175, 1);
}
.image-slide {
    width: 20%;
    float: left;
}
.image-slide,
.fake-radio,
.radio-btn {
    transition: all 0.5s ease-out;
}
.fake-radio {
    float: right;
}

.carousel-image {
    object-position: center;
}

/* Move slides overflowed container */
#slide1:checked ~ .images .images-inner {
    margin-left: 0;
}
#slide2:checked ~ .images .images-inner {
    margin-left: -100%;
}
#slide3:checked ~ .images .images-inner {
    margin-left: -200%;
}
#slide4:checked ~ .images .images-inner {
    margin-left: -300%;
}

/* Color of bullets */
#slide1:checked ~ div .fake-radio .radio-btn:nth-child(1),
#slide2:checked ~ div .fake-radio .radio-btn:nth-child(2),
#slide3:checked ~ div .fake-radio .radio-btn:nth-child(3)
#slide4:checked ~ div .fake-radio .radio-btn:nth-child(4) {
    background: red;
}
.radio-btn {
    width: 9px;
    height: 9px;
    border-radius: 5px;
    background: gray;
    display: inline-block !important;
    margin: 0 1px;
    cursor: pointer;
}
/* Color of bullets - END */

/* Text of slides */
#slide1:checked ~ .labels .label:nth-child(1),
#slide2:checked ~ .labels .label:nth-child(2),
#slide3:checked ~ .labels .label:nth-child(3) {
    opacity: 1;
}

.label {
    opacity: 0;
    position: absolute;
}
/* Text of slides - END */

/* Calculate AUTOPLAY for BULLETS */
@keyframes bullet {
    0%,
    33.32333333333334% {
        background: red;
    }
    33.333333333333336%,
    100% {
        background: gray;
    }
}

#play1:checked ~ div .fake-radio .radio-btn:nth-child(1) {
    animation: bullet 12300ms infinite -1000ms;
}

#play1:checked ~ div .fake-radio .radio-btn:nth-child(2) {
    animation: bullet 12300ms infinite 3100ms;
}

#play1:checked ~ div .fake-radio .radio-btn:nth-child(3) {
    animation: bullet 12300ms infinite 7200ms;
}

#play1:checked ~ div .fake-radio .radio-btn:nth-child(4) {
    animation: bullet 12300ms infinite 7200ms;
}
/* Calculate AUTOPLAY for BULLETS - END */

/* Calculate AUTOPLAY for SLIDES */
@keyframes slide {
    0%,
    20% {
        margin-left: 0;
    }
    28.333333333333336%,
    48.53658536585366% {
        margin-left: -100%;
    }
    54.66666666666667%,
    72.869918699187% {
        margin-left: -200%;
    }
    78.66666666666667%,
    94.869918699187% {
        margin-left: -300%;
    }
}

.st-slider > #play1:checked ~ .images .images-inner {
    animation: slide 12300ms infinite;
}
/* Calculate AUTOPLAY for SLIDES - END */

/* Calculate AUTOPLAY for CAPTION */
@keyframes caption {
    0%,
    33.32333333333334% {
        opacity: 1;
    }
    33.333333333333336%,
    100% {
        opacity: 0;
    }
}

#play1:checked ~ .labels .label:nth-child(1) {
    animation: caption 12300ms infinite -1000ms;
}

#play1:checked ~ .labels .label:nth-child(2) {
    animation: caption 12300ms infinite 3100ms;
}

#play1:checked ~ .labels .label:nth-child(3) {
    animation: caption 12300ms infinite 7200ms;
}

#play1:checked ~ .labels .label:nth-child(4) {
    animation: caption 12300ms infinite 11130ms;
}
/* Calculate AUTOPLAY for CAPTION - END */
</style>
