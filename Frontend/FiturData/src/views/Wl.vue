<script setup>
import { ref, onMounted, computed, watch } from 'vue';
import axios from 'axios';
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from '@/Pages/Components/ui/accordion/';

const data = ref([]);
const searchQuery = ref('');
const isLoading = ref(true); 

const fetchData = async () => {
  try {
    const response = await axios.get(
      'https://stg.app.tiketux.id/api/list-feature',
      {
        auth: {
          username: 'tiketux_username',
          password: 'tiketux_password',
        },
      }
    );
    data.value = response.data.data;
  } catch (err) {
    console.error('Gagal mengambil data:', err);
  } finally {
    isLoading.value = false; 
  }
};

const filteredData = computed(() => {
  if (!searchQuery.value) return data.value;
  return data.value.filter((item) =>
    item.operator.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
});

onMounted(() => {
  fetchData();
});
</script>

<template>
  <nav-bar />
  <div class="bg-gray-100 min-h-screen">
    <div class="p-8 max-w-6xl mx-auto">
      <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Data White Label</h1>

      <div class="flex justify-center items-center">
        <input
          v-model="searchQuery"
          type="text"
          placeholder="Cari Operator..."
          class="w-[1080px] p-2 border rounded-md text-center mb-6"
        />
      </div>

      <SearchBar v-model="searchQuery" class="mb-8" />

      <div v-if="isLoading" class="text-center text-gray-500">
        Loading data.....
      </div>

      <div v-else-if="filteredData.length === 0" class="text-center text-red-500">
        No results found.
      </div>

      <!-- <div v-else class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-8">
        <div
          v-for="(item, index) in filteredData"
          :key="index"
          class="border-2 p-8 rounded-lg shadow-lg bg-white"
        >
          <h2 class="text-2xl font-semibold text-center text-blue-600 mb-6">
            {{ item.operator }}
          </h2>

          <Accordion type="single" collapsible>
            <div v-for="(feature, idx) in item.features" :key="idx" class="mb-4">
              <AccordionItem :value="'item-' + idx">
                <AccordionTrigger>
                  {{ feature.title }}
                </AccordionTrigger>
                <AccordionContent>
                  <h3 class="text-sm font-bold text-gray-700 mb-4 flex justify-between">
                    {{ feature.description }}
                    <span
                      :class="{
                        'text-green-600': feature.isActive,
                        'text-red-600': !feature.isActive,
                      }"
                      class="ml-auto"
                    >
                      {{ feature.isActive ? 'ON' : 'OFF' }}
                    </span>
                  </h3>
                  
                  <div v-for="(detail, i) in feature.items" :key="i" class="flex justify-between items-center">
                    <span class="text-gray-800">
                      {{ detail.title }}: {{ detail.description }}
                    </span>
                    <span class="font-bold"
                      :class="{
                        'text-green-600': detail.isActive,
                        'text-red-600': !detail.isActive,
                      }"
                    >
                      {{ detail.isActive ? 'ON' : 'OFF' }}
                    </span>
                  </div>
                </AccordionContent>
              </AccordionItem>
            </div>
          </Accordion>
        </div>
      </div> -->
    </div>
  </div>
</template>
  
<style scoped>
.shadow-lg {
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}
</style>