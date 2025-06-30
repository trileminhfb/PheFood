import client from "../layout/client/index.vue";
import Home_Client from "../pages/client/Home.vue";

export default [
  {
    path: "/",
    component: client,
    children: [
      {
        path: "",
        name: "client",
        component: Home_Client,
      },
    ],
  },
];
