<script setup>
import { reactive } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

const menus = reactive([
  { title: 'Kiosk', description: 'Lihat Fitur Yang Tersedia di Kiosk', route: 'Kios' },
  { title: 'Tiketux', description: 'Lihat Fitur Yang Tersedia di Tiketux', route: 'Tiketux' },
  { title: 'White Label', description: 'Lihat Fitur Yang Tersedia di White Label', route: 'Wl' }
]);

function goToMenu(route) {
  router.push({ name: route });
}
</script>

<template>
  <nav-bar/>
  <div class=" bg-gray-100 min-h-screen">
 <div class="p-8 max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-12 text-center">Menu</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <div
        v-for="(menu, index) in menus"
        :key="index"
        class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-1 cursor-pointer text-center"
        @click="goToMenu(menu.route)"
      >
        <h2 class="text-3xl font-semibold mb-6">{{ menu.title }}</h2>
        <p class="text-gray-600 text-lg">{{ menu.description }}</p>
      </div>
    </div>
  </div>
</div>
</template>