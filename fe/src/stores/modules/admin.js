// store/modules/admin.js

export default {
  namespaced: true,
  state: () => ({
    user: JSON.parse(localStorage.getItem("admin")) || null,
  }),
  mutations: {
    setUser(state, userData) {
      state.user = userData;
      localStorage.setItem("admin", JSON.stringify(userData));
      localStorage.setItem("auth_token", userData.token);
    },
    clearUser(state) {
      state.user = null;
      localStorage.removeItem("admin");
      localStorage.removeItem("auth_token");
    },
  },
  actions: {
    login({ commit }, userData) {
      commit("setUser", userData);
    },
    logout({ commit }) {
      commit("clearUser");
    },
  },
  getters: {
    user: (state) => state.user,
  },
};
