import Vue from "vue";
import Router from "vue-router";
import DetailItem from "@/components/DetailItem";
import PsikologiItem from "@/components/PsikologiItem";
import HomePage from "@/components/HomePage";
import RegisterPage from "@/components/RegisterPage";
import LoginPage from "@/components/LoginPage";

Vue.use(Router);

export const router = new Router({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "homepage",
            component: HomePage,
        },
        {
            path: "/detail/:linkprev/:linkhal",
            name: "detail",
            component: DetailItem,
        },
        {
            path: "/psikologi/:linkprev/:id",
            name: "psikologi",
            component: PsikologiItem,
        },
        {
            path: "/register",
            name: "register",
            component: RegisterPage,
        },
        {
            path: "/login",
            name: "login",
            component: LoginPage,
        },
    ],
});

router.beforeEach((to, from, next) => {
    const publicPages = ["/login", "/register", "/"];
    const authRequired = !publicPages.includes(to.path);
    const loggedIn = localStorage.getItem("user");
    // trying to access a restricted page + not logged in
    // redirect to login page
    if (authRequired && !loggedIn) {
        next("/login");
    } else {
        next();
    }
});
