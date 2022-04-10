import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = () => {
  return new Vuex.Store({
    state:{
      book: {}
    },
    mutations: {
      setBook(state, data){
        state.book = data
      }
    }
  })
}

export default store
