<template>
    <header id="navbar"  class="header py-3" :class="{ 'is-hidden': !showHeader }">
        <nav  class="navbar navbar-expand-lg bg-navbar">
            <div class="container px-0">
                <div class="row">
                    <router-link
                        class="navbar-brand"
                        id="deliveboo"
                        :to="{ name: 'home' }"
                    >
                        <div class="row align-items-center">
                            <AppLogo id="header-logo" class="mr-3" />Deliveboo
                        </div>
                    </router-link>
                </div>

                <!-- ! Visibile al md ! -->
                <div class="d-none d-md-block">
                    <div class="row">
                        <router-link
                            class="nav-link d-"
                            :to="{ name: 'about' }"
                        >
                            <i class="fa-regular fa-comment"></i> Dicono di noi
                        </router-link>
                        <router-link class="nav-link" :to="{ name: 'policy' }">
                            <i class="fa-solid fa-scale-balanced"></i> Policy
                            aziendale
                        </router-link>
                        <router-link class="nav-link" :to="{ name: 'home' }">
                            <i class="fa-solid fa-house-user"></i> Torna alla
                            Home
                        </router-link>
                        <a class="nav-link" href="http://127.0.0.1:8000/login"
                            ><i class="fa-solid fa-right-to-bracket"></i> Accedi
                        </a>
                        <a
                            class="nav-link"
                            href="http://127.0.0.1:8000/register"
                            ><i class="fa-solid fa-user-plus"></i> Registrati
                        </a>
                    </div>
                </div>
                <!-- ! Visibile sotto il md ! -->
                <div class="d-block d-md-none">
                    <div class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fa-solid fa-bars" id="menu"></i>
                        </a>
                        <div class="dropdown-menu menu-personalized">
                            <router-link
                                class="nav-link dropdown-item text-danger"
                                :to="{ name: 'about' }"
                            >
                                <i class="fa-regular fa-comment"></i> Dicono di
                                noi
                            </router-link>
                            <router-link
                                class="nav-link dropdown-item text-danger"
                                :to="{ name: 'policy' }"
                            >
                                <i class="fa-solid fa-scale-balanced"></i>
                                Policy aziendale
                            </router-link>
                            <router-link
                                class="nav-link dropdown-item text-danger"
                                :to="{ name: 'home' }"
                            >
                                <i class="fa-solid fa-house-user"></i>Torna alla
                                Home
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>
<script>
import AppLogo from "./AppLogo.vue";
export default {
    name: "AppHeader",
    data() {
        return {
            showHeader: true,
            lastScrollPosition: 0,
            scrollOffset: 40,
        };
    },
    components: {
        AppLogo,
    },
    methods: {
        // Toggle if navigation is shown or hidden
        onScroll() {
            if (window.pageYOffset < 0) {
                return;
            }
            if (
                Math.abs(window.pageYOffset - this.lastScrollPosition) <
                this.scrollOffset
            ) {
                return;
            }
            this.showHeader = window.pageYOffset < this.lastScrollPosition;
            this.lastScrollPosition = window.pageYOffset;
        },
    },
    mounted() {
        this.lastScrollPosition = window.pageYOffset;
        window.addEventListener("scroll", this.onScroll);
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.onScroll);
    },
};
</script>
<style lang="scss" scoped>
#navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    background-color: #b1291b;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 5px 5px rgba(0, 0, 0, 0.22);
    transition: 0.5s;
    z-index: 5;
    a {
        color: white;
        font-size: 16px;
        transition: 0.3s;
        margin-left: 5px;

        &:hover {
            font-size: 17px;
        }
    }
}

#deliveboo {
    font-size: 35px;
}

#header-logo {
    width: 40px;
}

#menu {
    font-size: 25px;
}
.menu-personalized {
    left: -40px;
    min-width: 12rem;
}
.header {
    transform: translateY(0);
    transition: transform 300ms linear;
}

.header.is-hidden {
    transform: translateY(-100%);
}

</style>
