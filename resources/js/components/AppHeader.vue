<template>
    <header>
        <nav class="navbar navbar-expand-lg bg-navbar">
            <div class="container">
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
    components: {
        AppLogo,
    },
};
</script>
<style lang="scss" scoped>
.bg-navbar {
    height: 100px;
    background-color: #b1291b;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 5px 5px rgba(0, 0, 0, 0.22);

    a {
        color: white;
        font-size: 16px;
        transition: 0.3s;
        margin-left: 5px;

        &:hover {
            font-size: 17px;
        }
    }

    #deliveboo {
        font-size: 35px;
    }

    #header-logo {
        width: 40px;
    }
}

#menu {
    font-size: 25px;
}
.menu-personalized {
    left: -40px;
    min-width: 12rem;
}

header {
    position: sticky;
    top: 0;
    width: 100%;
    z-index: 3;
}
</style>
