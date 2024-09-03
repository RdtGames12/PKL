<template>
    <div>
      <Head :title="form.title" />
      <div class="flex justify-start mb-8 max-w-3xl">
        <h1 class="text-3xl font-bold">
          <Link class="text-indigo-400 hover:text-indigo-600" href="/books">Books</Link>
          <span class="text-indigo-400 font-medium">/</span>
          {{ form.title }}
        </h1>
      </div>
      <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
        <form @submit.prevent="update">
          <div class="flex flex-wrap -mb-8 -mr-6 p-8">
            <text-input v-model="form.title" :error="form.errors.title" class="pb-8 pr-6 w-full lg:w-1/2" label="Title" />
            <text-input v-model="form.author" :error="form.errors.author" class="pb-8 pr-6 w-full lg:w-1/2" label="Author" />
            <text-input v-model="form.publisher" :error="form.errors.publisher" class="pb-8 pr-6 w-full lg:w-1/2" label="Publisher" />
            <select-input v-model="form.category_id" :error="form.errors.category_id" class="pb-8 pr-6 w-full lg:w-1/2" label="Category">
              <option :value="null">Select Category</option>
              <option v-for="category in categories" :key="category.id" :value="category.id">
                {{ category.category }}
              </option>
            </select-input>
          </div>
          <div class="flex justify-between items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
            <div>
              <button v-if="!book.deleted_at && actions.includes('delete')" class="btn-warning ml-auto" tabindex="-1" type="button" @click="destroy">Delete Book</button>
            </div>
            <div class="flex items-end space-x-1">
              <Link href="/books" class="btn-secondary ml-auto"> Back </Link>
              <loading-button v-if="actions.includes('update')" :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update Book</loading-button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { Head, Link } from '@inertiajs/vue3'
  import Layout from '@/Shared/Layout.vue'
  import TextInput from '@/Shared/TextInput.vue'
  import SelectInput from '@/Shared/SelectInput.vue'
  import LoadingButton from '@/Shared/LoadingButton.vue'
  import TrashedMessage from '@/Shared/TrashedMessage.vue'
  
  export default {
    components: {
      Head,
      Link,
      LoadingButton,
      SelectInput,
      TextInput,
      TrashedMessage,
    },
    layout: Layout,
    props: {
      book: Object, 
      categories: Array,  
      actions: Array,
    },
    remember: 'form',
    data() {
      return {
        form: this.$inertia.form({
          _method: 'put',
          title: this.book.title,
          author: this.book.author,
          publisher: this.book.publisher,
          category_id: this.book.category_id,
          errors: {},
          processing: false,
        }),
      }
    },
      methods: {
    update() {
      this.form.put(`/books/${this.book.id}`, {
        onSuccess: () => this.form.reset(),
      });
    },
    destroy() {
      if (confirm('Are you sure you want to delete this book?')) {
        this.$inertia.delete(`/books/${this.book.id}`);
      }
    },
    restore() {
      if (confirm('Are you sure you want to restore this book?')) {
        this.$inertia.put(`/books/${this.book.id}/restore`);
      }
    },
  },
  }
  </script>