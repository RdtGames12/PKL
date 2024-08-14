<template>
    <div class="mb-4">
      <div class="input-group d-flex justify-content-center">
        <button class="btn btn-secondary" type="button" aria-readonly="true">
          Search
        </button>
        <input 
          type="text" 
          class="form-control-sm " 
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
  export default {
    data() {
      return {
        searchQuery: ''
      }
    },
    methods: {
      emitSearchQuery() {
        this.$emit('update-query', this.searchQuery);
      }
    }
  }
  </script>
  