<template>
    <div>
        <!-- Jumbotron -->
        <section id="services">
            <div class="container-fluid">
                <div class="row justify-content-center mt-5">
                    <div class="col-sm col-lg-2">
                        <AppLogo></AppLogo>
                    </div>
                    <div class="col-sm col-lg-6 text-center d-flex align-items-center">
                        <div>

                            <h1 class="font-weight-bold">I nostri servizi</h1>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Ipsam deserunt, eaque iure illum qui iste
                                quaerat voluptates molestias alias veniam beatae
                                exercitationem suscipit. Perferendis sit quos optio
                                ratione laboriosam aspernatur?
                            </p>
                        </div>
                    </div>
                    <div class="col-sm col-lg-2">
                        <img
                            class="img-fluid"
                            src="https://images.prismic.io/deliveroo/2ad27cdc-9c5a-4136-85b4-349f9ba1344f_nan_25+%281%29.JPG?auto=compress,format"
                            alt="servizi"
                        />
                    </div>
                </div>
            </div>
        </section>
        <AppPartners />
    </div>
</template>
<script>
import AppPartners from "../AppPartners.vue";
import AppLogo from "../AppLogo.vue";
export default {
    name: "HomePage",
    components: {
        AppLogo,
        AppPartners,
    },
};
</script>
<style lang="scss" scoped>

</style>
