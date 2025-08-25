//src/services/api.js

import axios from "axios";

const getHeader = () => {
  let token = window.localStorage.getItem("auth_token");

  if (token == null) {
    return {};
  }
  return {
    Authorization: "Bearer " + token,
    Accept: "application/json",
  };
};

const api = axios.create({
  baseURL: "http://127.0.0.1:8000/api",
  timeout: 10000,
});

api.interceptors.request.use(
  (config) => {
    const headers = getHeader();
    config.headers = {
      ...config.headers,
      ...headers,
    };
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

export default api;
