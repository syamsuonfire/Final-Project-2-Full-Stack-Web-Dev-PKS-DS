import Vue from "vue";
import Router from "vue-router";
import HomePage from "@/components/HomePage";
import RegisterPage from "@/components/RegisterPage";
import LoginPage from "@/components/LoginPage";
import ListMovie from "@/components/ListMovie";
import ListGame from "@/components/ListGame";
import DetailMovie from "@/components/DetailMovie";
import DetailGame from "@/components/DetailGame";

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
            path: "/register",
            name: "register",
            component: RegisterPage,
        },
        {
            path: "/login",
            name: "login",
            component: LoginPage,
        },
        {
            path: "/movies/",
            name: "movies",
            component: ListMovie,
        },
        {
            path: "/movies/:id",
            name: "detailmovie",
            component: DetailMovie,
        },
        {
            path: "/games/",
            name: "games",
            component: ListGame,
        },
        {
            path: "/games/:id",
            name: "detailgame",
            component: DetailGame,
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
