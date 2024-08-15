<template>
  <div class="mb-4">
    <div class="input-group d-flex justify-content-center">
      <button class="btn btn-secondary" type="button" aria-readonly="true">
        Search
      </button>
      <input 
        type="text" 
        class="form-control-sm" 
        placeholder="Search Movies..." 
        aria-label="Search Movies" 
        name="search" 
        v-model="searchQuery" 
        @input="emitSearchQuery"
      />
    </div>
  </div>
</template>

<script>
import { ref, watch } from "vue";

export default {
  setup(props, { emit }) {
    const searchQuery = ref("");

    const emitSearchQuery = () => {
      emit("update-query", searchQuery.value);
    };

    // Emit search query whenever it changes
    watch(searchQuery, emitSearchQuery);

    return {
      searchQuery,
      emitSearchQuery,
    };
  },
};
</script>
