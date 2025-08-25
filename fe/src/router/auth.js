const authRouter = [
  {
    path: "/auth",
    component: () => import("../layout/auth/index.vue"),
    children: [
      {
        path: "login-customer",
        name: "login-customer",
        component: () => import("../pages/auth/customer/Login.vue"),
      },
      {
        path: "register-customer",
        name: "register-customer",
        component: () => import("../pages/auth/customer/Register/Register.vue"),
      },
      {
        path: "register-customer/verify",
        name: "verify-register-customer",
        component: () =>
          import("../pages/auth/customer/Register/VerifyRegister.vue"),
      },
      {
        path: "forgot-password",
        name: "forgot-password",
        component: () =>
          import("../pages/auth/customer/ForgotPassword/ForgotPassword.vue"),
      },
      {
        path: "forgot-password/verify-otp",
        name: "verify-otp-forgot-password",
        component: () =>
          import(
            "../pages/auth/customer/ForgotPassword/VerifyOtpForgotPassword.vue"
          ),
      },
      {
        path: "forgot-password/reset-password",
        name: "reset-forgot-password",
        component: () =>
          import(
            "../pages/auth/customer/ForgotPassword/ResetForgotPassword.vue"
          ),
      },
    ],
  },
];

export default authRouter;
