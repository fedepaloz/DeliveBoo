<template>
    <footer>
        <div class="container py-4">
            <nav
                class="row row-cols-1 row-cols-sm-2 row-cols-md-4 my-n2 my-md-0 mx-n2"
            >
                <div class="col py-2 py-md-0 px-2">
                    <div class="footer-card">
                        <h4>Scopri Deliveboo</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Investitori</a></li>
                            <li><a href="#">Chi siamo</a></li>
                            <li><a href="#">Ristoranti</a></li>
                            <li><a href="#">Altro</a></li>
                            <li><a href="#">Pressroom</a></li>
                            <li><a href="#">Programmazione</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Lavora con noi</a></li>
                            <li><a href="#">Diventa nostro partner</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col py-2 py-md-0 px-2">
                    <div class="footer-card">
                        <h4>Note legali</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Termini & Condizioni</a></li>
                            <li><a href="#">Informativa sulla privacy</a></li>
                            <li><a href="#">Cookies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col py-2 py-md-0 px-2">
                    <div class="footer-card">
                        <h4>Aiuto</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Contatti</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Tipi di cucina</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col py-2 py-md-0 px-2">
                    <div class="footer-card">
                        <h4>Porta Deliveboo con te</h4>
                        <div>
                            <a href="">
                                <div class="mb-3" id="app-store"></div>
                            </a>
                            <a href="">
                                <div id="google-play"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="row row-cols-1 row-cols-sm-2 pt-4">
                <div class="col text-center text-sm-left mb-3 mb-sm-0">
                    <a href="">
                        <i class="fa-brands fa-facebook mr-2"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-twitter mr-2"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
                <div class="col text-center text-sm-right" id="copyright">
                    © 2022 Deliveboo
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "AppFooter",
};
</script>

<style lang="scss" scoped>
a {
    color: #fff;
}
footer {
    color: #fff;
    background-color: #2e3333;
}

.footer-card {
    background-color: #434848;
    height: 100%;
    border-radius: 3px;
    padding: 25px 22px;
    ul {
        margin: 0;
        padding: 0;
    }
    a {
        &:hover {
            text-decoration: none;
            color: #00b8a9;
        }
    }
}

#copyright {
    color: #585c5c;
}

#app-store {
    background-image: url(https://consumer-component-library.roocdn.com/26.11.0/static/images/app-store-badges-it.svg);
    width: 135px;
    height: 40px;
}

#google-play {
    background-image: url(https://consumer-component-library.roocdn.com/26.11.0/static/images/app-store-badges-it.svg);
    background-position: -135px 0;
    width: 135px;
    height: 40px;
}

i {
    font-size: 23px;
    &.fa-facebook {
        &:hover {
            color: #1877f2;
        }
    }
    &.fa-twitter {
        &:hover {
            color: #55acee;
        }
    }
    &.fa-instagram {
        &:hover {
            color: #f00075;
        }
    }
}
</style>
