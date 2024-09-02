<script setup>
import { reactive } from 'vue';

const menus = reactive([
  { title: 'Kiosk', description: 'Lihat Fitur Yang Tersedia di Kiosk', route: '/kios' },
  { title: 'Tiketux', description: 'Lihat Fitur Yang Tersedia di Tiketux', route: '/tiketux' },
  { title: 'White Label', description: 'Lihat Fitur Yang Tersedia di White Label', route: '/wl' }
]);

function goToMenu(route) {
  window.location.href = route;
}
</script>

<template>
  <div class="bg-gray-100 flex justify-center min-h-screen">
    <div class="p-4 w-full max-w-6xl">
      <h1 class="text-3xl font-bold mb-8 text-center title">Menu</h1>
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
