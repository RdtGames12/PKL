<style>
.shadow-lg {
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}
</style>
<template>
  <div class="p-8 max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Data Fitur API</h1>
      <SearchBar v-model="searchQuery" class="mb-8" />
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8">
          <div v-for="(item, index) in filteredData" :key="index" class="border-2 p-8 rounded-lg shadow-lg bg-white">
            <h2 class="text-2xl font-semibold text-center text-blue-600 mb-6">{{ item.operator }}</h2>
              <div class="space-y-6">
                <div v-for="(feature, idx) in item.features" :key="idx" class="p-6 rounded-lg bg-gray-100">
                  <h3 class="text-xl font-bold text-center text-gray-700 mb-4">{{ feature.title }}</h3>
                    <p class="text-gray-600 text-center mb-6">{{ feature.description }}</p>
                      <div class="space-y-4">
                          <div v-for="(detail, i) in feature.items" :key="i" class="flex justify-between items-center">
                <span class="text-gray-800">{{ detail.title }}: {{ detail.description }}</span>
                <span :class="{ 'text-green-600': detail.isActive, 'text-red-600': !detail.isActive }">
                  Aktif: {{ detail.isActive }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';
import SearchBar from './components/Search.vue';
const data = ref([]);
const searchQuery = ref('');
const fetchData = async () => {
  try {
    const response = await axios.get('https://stg.kiosk.asmat.app/api/features', {
      auth: {
        username: 'kiosk_basic_auth_username',
        password: 'kiosk_basic_auth_password'
      }
    });
    data.value = response.data.data;
  } catch (err) {
    console.error('Gagal mengambil data:', err);
  }
};

const filteredData = computed(() => {
  if (!searchQuery.value) return data.value;
  return data.value.map(item => ({
    ...item,
    features: item.features.filter(feature =>
      feature.title.toLowerCase().includes(searchQuery.value.toLowerCase())
    ),
  })).filter(item => item.features.length > 0);
});

onMounted(() => {
  fetchData();
});
</script>


