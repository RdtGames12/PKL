<script setup>
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import SearchBar from "../components/Search.vue";

const data = ref([]);
const searchQuery = ref("");
const activeAccordion = ref({});

const fetchData = async () => {
  try {
    const response = await axios.get(
      "https://stg.kiosk.asmat.app/api/features",
      {
        auth: {
          username: "kiosk_basic_auth_username",
          password: "kiosk_basic_auth_password",
        },
      }
    );
    data.value = response.data.data;
  } catch (err) {
    console.error("Gagal mengambil data:", err);
  }
};

const filteredData = computed(() => {
  if (!searchQuery.value) return data.value;
  return data.value.filter((item) =>
    item.operator.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
});

const toggleAccordion = (parentIndex, childIndex) => {
  activeAccordion.value[parentIndex] =
    activeAccordion.value[parentIndex] === childIndex ? null : childIndex;
};

onMounted(() => {
  fetchData();
});
</script>


<template>
  <nav-bar />
  <div class="bg-gray-100 min-h-screen">
    <div class="p-8 max-w-6xl mx-auto">
      <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">
        Data Kiosk
      </h1>
      <SearchBar v-model="searchQuery" class="mb-8" />
      <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-8">
        <div
          v-for="(item, index) in filteredData"
          :key="index"
          class="border-2 p-8 rounded-lg shadow-lg bg-white"
        >
          <h2 class="text-2xl font-semibold text-center text-blue-600 mb-6">
            {{ item.operator }}
          </h2>

          <div v-for="(feature, idx) in item.features" :key="idx" class="mb-4">
            <button
              class="w-full text-left p-4 font-bold bg-gray-200 rounded-lg shadow-md"
              @click="toggleAccordion(index, idx)"
            >
              {{ feature.title }}
            </button>

            <div
              v-show="activeAccordion[index] === idx"
              class="mt-2 bg-gray-100 p-4 rounded-lg"
            >
              <h3
                class="text-sm font-bold text-gray-700 mb-4 flex justify-between"
              >
                {{ feature.description }}
                <span
                  :class="{
                    'text-green-600': feature.isActive,
                    'text-red-600': !feature.isActive,
                  }"
                  class="ml-auto"
                >
                  {{ feature.isActive ? "ON" : "OFF" }}
                </span>
              </h3>

              <div
                v-for="(detail, i) in feature.items"
                :key="i"
                class="flex justify-between items-center"
              >
                <span class="text-gray-800"
                  >{{ detail.title }}: {{ detail.description }}</span
                >
                <span class="font-bold"
                  :class="{
                    'text-green-600': detail.isActive,
                    'text-red-600': !detail.isActive,
                  }"
                >
                  {{ detail.isActive ? "ON" : "OFF" }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.shadow-lg {
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.accordion-button {
  cursor: pointer;
  background-color: #f1f1f1;
  border: none;
  padding: 10px;
  text-align: left;
  width: 100%;
  outline: none;
  transition: background-color 0.3s ease;
}

.accordion-button:hover {
  background-color: #ddd;
}

.accordion-content {
  padding: 10px;
  background-color: #fafafa;
}
</style>
