import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

// import {Form, HasError, AlertError} from 'vform';
// window.Form = Form;
// vue.component(HasError.name, HasError); // eslint-disable-line
// vue.component(AlertError.name, AlertError); // eslint-disable-line


// import bootstrap
import 'bootstrap-vue/dist/bootstrap-vue.css';
import 'bootstrap/dist/css/bootstrap.css';
import "bootstrap/dist/js/bootstrap.js"

/* import the fontawesome core */
import '@fortawesome/free-solid-svg-icons'   

/* import font awesome icon component */
import '@fortawesome/free-regular-svg-icons'
/* import specific icons */
import '@fortawesome/free-brands-svg-icons'





createApp(App).use(store).use(router).mount('#app')
