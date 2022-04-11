import Vue from "vue";
import Vuex from "vuex";
import { auth } from "./auth.module";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        book: {},
    },
    getters: {},
    mutations: {
        setBook(state, data) {
            state.book = data;
        },
    },
    actions: {},
    modules: { auth },
});
