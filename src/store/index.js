import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    datapusherUrl: 'http://localhost:8800'
  },
  getters: {
    datapusherUrl: vals => vals.datapusherUrl
  },
  mutations: {
  },
  actions: {
  },
  modules: {
  }
})
