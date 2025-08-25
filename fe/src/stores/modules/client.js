// store/modules/client.js
export default {
  namespaced: true,
  state: () => ({
    client: JSON.parse(localStorage.getItem("client")) || null,
  }),
  mutations: {
    setClient(state, clientData) {
      state.client = clientData;
      localStorage.setItem("client", JSON.stringify(clientData));
      localStorage.setItem("auth_token", clientData.token);
    },
    clearClient(state) {
      state.client = null;
      localStorage.removeItem("client");
      localStorage.removeItem("auth_token");
    },
  },
  actions: {
    login({ commit }, clientData) {
      commit("setClient", clientData);
    },
    logout({ commit }) {
      commit("clearClient");
    },
  },
  getters: {
    client: (state) => state.client,
  },
};
