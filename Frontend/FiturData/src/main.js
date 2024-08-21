import { createApp } from 'vue'
import App from './App.vue'
import './assets/tailwind.css';
import router from '../router/index.js';
import NavBar from './components/Navbar.vue';
const app = createApp(App)
app.component('nav-bar', NavBar)
app.use(router).mount('#app');

