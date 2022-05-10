import Vue from "vue";
import Vuex from "vuex";
import { auth } from "./auth.module";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        movie: {},
        game: {},
    },
    getters: {},
    mutations: {
        setMovie(state, data) {
            state.movie = data;
        },
        setGame(state, data) {
            state.game = data;
        },
    },
    actions: {},
    modules: { auth },
});
