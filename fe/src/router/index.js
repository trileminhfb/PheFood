import { createRouter, createWebHistory } from "vue-router";
import client from "./client";
import authRouter from "./auth";

const routes = [...client, ...authRouter];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
