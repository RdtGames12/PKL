import { createRouter, createWebHistory } from 'vue-router';
import Home from '../src/views/Home.vue';
import Kios from '../src/views/Kios.vue';
import Tiketuk from '../src/views/Tiketux.vue';
import Wl from '../src/views/Wl.vue';

const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/Kios', name: 'Kios', component: Kios },
  { path: '/Tiketuk', name: 'Tiketuk', component: Tiketuk },
  { path: '/Wl', name: 'Wl', component: Wl }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
