import Vue from 'vue'
import VueRouter from 'vue-router'
// import HomePage from './components/pages/HomePage.vue'


Vue.use(VueRouter)

const routes = new VueRouter({
    mode: 'history',
    // linkExactActiveClass: 'active',
    routes: [
        // { path: '/restaurants', component: HomePage, name: 'home' },
        // { path: '/about', component: AboutPage, name: 'about' },
        // { path: '/contacts', component: ContactsPage, name: 'contacts' },
        // { path: '/posts/:slug', component: PostDetailPage, name: 'post-detail' },
        // { path: '*', component: NotFoundPage, name: 'not_found' },
    ]
});

export default routes;