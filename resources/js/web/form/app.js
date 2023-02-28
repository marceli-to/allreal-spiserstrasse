// app.js
import '@/global/bootstrap';

// Vue
import {createApp} from 'vue';
import App from './App.vue';

const app = createApp(App);

// Axios
import VueAxios from "vue-axios";
app.use(VueAxios, axios);

// Mount app
app.mount("#app-form");
