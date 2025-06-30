import { createRouter, createWebHistory } from "vue-router";
import client from "./client";

const routes = [...client];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
