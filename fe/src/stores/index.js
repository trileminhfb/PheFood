// store/index.js
import { createStore } from "vuex";
import admin from "./modules/admin";
import client from "./modules/client";

const store = createStore({
  modules: {
    admin,
    client,
  },
});

export default store;
