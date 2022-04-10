import Vue from "vue";
import Vuex from "vuex";

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
    modules: {},
});
