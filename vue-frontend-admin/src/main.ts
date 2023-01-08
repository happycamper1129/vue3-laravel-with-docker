import { createApp } from "vue";
import { createPinia } from "pinia";

// @ts-ignore
import App from "./App.vue";
import router from "./router";
// import store from "./store";
import axios from "axios";
// import "./assets/main.css";

// Bootstrap
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";

// global base url
axios.defaults.baseURL = 'http://localhost:8080/api/';

const app = createApp(App);

app.use(createPinia());
app.use(router);
// app.use(store);

app.mount("#app");
