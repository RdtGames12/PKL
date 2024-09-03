<template>
  <div>
    <Head title="Edit Book" />
    <h1 class="mb-8 text-3xl font-bold">Edit Book</h1>

    <form @submit.prevent="submit">
      <div class="mb-4">
        <label class="block text-gray-700">Title</label>
        <input v-model="form.title" type="text" class="form-input mt-1 block w-full" />
        <span v-if="errors.title" class="text-red-600 text-sm">{{ errors.title }}</span>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Author</label>
        <input v-model="form.author" type="text" class="form-input mt-1 block w-full" />
        <span v-if="errors.author" class="text-red-600 text-sm">{{ errors.author }}</span>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Publisher</label>
        <input v-model="form.publisher" type="text" class="form-input mt-1 block w-full" />
        <span v-if="errors.publisher" class="text-red-600 text-sm">{{ errors.publisher }}</span>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Category</label>
        <select v-model="form.category_id" class="form-select mt-1 block w-full">
          <option v-for="category in categories" :key="category.id" :value="category.id">
            {{ category.category }}
          </option>
        </select>
        <span v-if="errors.category_id" class="text-red-600 text-sm">{{ errors.category_id }}</span>
      </div>

      <div class="mt-6">
        <button type="submit" class="btn-indigo">Save Changes</button>
      </div>
    </form>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3';


export default {
  components: {
    Head,
  },
  props: {
    book: Object,
    categories: Array,
  },
  data() {
    return {
      form: {
        title: this.book.title,
        author: this.book.author,
        publisher: this.book.publisher,
        category_id: this.book.category_id,
      },
      errors: {},
    }
  },
  methods: {
    async submit() {
      this.$inertia.put(`/books/${this.book.id}`, this.form, {
        onError: (errors) => {
          this.errors = errors;
        },
      });
    },
  },
}
</script>
