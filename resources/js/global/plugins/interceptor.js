import axios from 'axios';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import NProgress from 'nprogress';

const toastConfig = {
  position: toast.POSITION.BOTTOM_RIGHT,
  hideProgressBar: true,
  autoClose: false
};

/**
 * Interceptor for responses
 */
axios.interceptors.response.use(function (response) {
    NProgress.done();
    return response;
  }, 
  function (error) {
    toast.error(`${error.message} (${error.response.status})`, toastConfig);
    NProgress.done();
    return Promise.reject(error);
  }
);

/**
 * Interceptor for requests
 */
axios.interceptors.request.use(function (config) {
    NProgress.start();
    return config;
  }, 
  function (error) {
    toast.error(`Request error...`, toastConfig);
    NProgress.done();
    return Promise.reject(error);
  }
);