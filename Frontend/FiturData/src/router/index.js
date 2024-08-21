import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import Kios from '../views/Kios.vue';
import Tiketux from '../views/Tiketux.vue';
import Wl from '../views/Wl.vue';

const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/Kios', name: 'Kios', component: Kios },
  { path: '/Tiketux', name: 'Tiketux', component: Tiketux },
  { path: '/Wl', name: 'Wl', component: Wl }
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL || '/'),
  routes,
});

export default router;
