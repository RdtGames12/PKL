<script setup>
import { ref, defineEmits, watch } from 'vue';
const props = defineProps({
  modelValue: String
});

const emit = defineEmits(['update:modelValue']);
const Search = ref(props.modelValue);

watch(Search, (newVal) => {
  emit('update:modelValue', newVal);
});
</script> 

  <template>
      <div class="flex justify-center items-center">
      <input
          v-model="Search"
          type="text"
          placeholder="Cari fitur..."
          class="w-[700px] p-2 border rounded-md text-center mb-6"
      />
  </div>


  </template>
