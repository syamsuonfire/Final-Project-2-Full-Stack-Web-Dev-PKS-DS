import Vue from "vue";
import Router from "vue-router";
import DetailItem from "@/components/DetailItem";
import PsikologiItem from "@/components/PsikologiItem";
import HelloWorld from "@/components/HelloWorld";

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: "/",
            name: "HelloWorld",
            component: HelloWorld,
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
    ],
});
