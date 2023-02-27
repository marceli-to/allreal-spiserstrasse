// app.js
import './bootstrap';
import '../../css/spa/app.css'; 

// Vue
import {createApp} from 'vue';
import App from './App.vue';
const app = createApp(App);

// Axios
import VueAxios from "vue-axios";
app.use(VueAxios, axios);

// Axios interceptors
import './plugins/interceptor';

// Pinia store
import { createPinia } from "pinia";
app.use(createPinia());

// Router
import router from "@/spa/config/router";
app.use(router);

// Mount app
app.mount("#app");
