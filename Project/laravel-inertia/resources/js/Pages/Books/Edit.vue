<template>
  <div>
      <Head title="Edit Book" />
      <h1 class="mb-8 text-3xl font-bold">
          <Link class="text-indigo-400 hover:text-indigo-600" href="/books">Books</Link>
          <span class="text-indigo-400 font-medium">/</span> Edit
      </h1>
      <trashed-message v-if="book.deleted_at" class="mb-6" @restore="restore"> This book has been deleted. </trashed-message>
      <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
          <form @submit.prevent="submit">
              <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                  <text-input v-model="form.title" :error="errors.title" class="pb-8 pr-6 w-full lg:w-1/2" label="Title" />
                  <text-input v-model="form.author" :error="errors.author" class="pb-8 pr-6 w-full lg:w-1/2" label="Author" />
                  <text-input v-model="form.publisher" :error="errors.publisher" class="pb-8 pr-6 w-full lg:w-1/2" label="Publisher" />
                  <select-input v-model="form.category_id" :error="errors.category_id" class="pb-8 pr-6 w-full lg:w-1/2" label="Category">
                      <option :value="null">Select Category</option>
                      <option v-for="category in categories" :key="category.id" :value="category.id">
                          {{ category.category }}
                      </option>
                  </select-input>
              </div>
              <div class="flex justify-between items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
                  <div>
                      <button v-if="!book.deleted_at" class="btn-warning ml-auto" tabindex="-1" type="button" @click="destroy">Delete Book</button>
                  </div>
                  <div class="flex items-end space-x-1">
                      <Link :href="'/books'" class="btn-secondary ml-auto"> Back </Link>
                      <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Save Changes</loading-button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3';
import Layout from '@/Shared/Layout.vue';
import TextInput from '@/Shared/TextInput.vue';
import SelectInput from '@/Shared/SelectInput.vue';
import LoadingButton from '@/Shared/LoadingButton.vue';
import TrashedMessage from '@/Shared/TrashedMessage.vue';

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
  },
  data() {
      return {
          form: this.$inertia.form({
              title: this.book.title,
              author: this.book.author,
              publisher: this.book.publisher,
              category_id: this.book.category_id,
          }),
          errors: {},
      };
  },
  methods: {
      submit() {
          this.form.put(`/books/${this.book.id}`, {
              onSuccess: () => {
                  this.$inertia.visit('/books');
              },
              onError: (errors) => {
                  this.errors = errors;
              },
          });
      },
      destroy() {
          if (confirm('apakah anda yakin ini mengahapus buku ini bro?')) {
              this.$inertia.delete(`/books/${this.book.id}`, {
                  onSuccess: () => {
                      this.$inertia.visit('/books');
                  }
              });
          }
      },
      restore() {
          if (confirm('Apakah Anda yakin ingin memulihkan buku ini kawan?')) {
              this.$inertia.put(`/books/${this.book.id}/restore`, {
                  onSuccess: () => {
                      this.$inertia.visit('/books');
                  }
              });
          }
      },
  },
};
</script>
