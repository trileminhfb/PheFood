const client = [
  {
    path: "/",
    component: () => import("../layout/client/index.vue"),
    children: [
      {
        path: "",
        name: "home",
        component: () => import("../pages/client/Home.vue"),
      },
    ],
  },
];
export default client;
