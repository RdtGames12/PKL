<template>
  <div class="p-10 mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-red-800 -mt-16">Data dari API</h1>
    <SearchBar v-model="searchQuery" />
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <div v-for="(item, index) in filteredData" :key="index" class="border p-4 rounded-md">
        <strong class="text-lg hover:underline">{{ item.operator }}</strong>
        <div class="mt-2 space-y-2">
          <div v-for="(feature, idx) in item.features" :key="idx" class="border p-3 rounded-md bg-gray-50">
            <h4 class="font-semibold text-gray-800">{{ feature.title }}</h4>
            <p class="text-gray-600">{{ feature.description }}</p>
            <div class="mt-2 space-y-1">
              <div v-for="(detail, i) in feature.items" :key="i" class="text-sm text-gray-700">
                {{ detail.title }}: {{ detail.description }} - 
                <span :class="{'text-green-500': detail.isActive, 'text-red-500': !detail.isActive}">
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
    error.value = 'Gagal mengambil data: ' + err.message;
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

