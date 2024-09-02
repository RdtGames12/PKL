<template>
  <div>
      <Head title="Add Book" />
      <h1 class="mb-8 text-3xl font-bold">
          <Link class="text-indigo-400 hover:text-indigo-600" href="/books">Books</Link>
          <span class="text-indigo-400 font-medium">/</span> Add
      </h1>
      <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
          <form @submit.prevent="store">
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
              <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
                  <loading-button :loading="form.processing" class="btn-indigo" type="submit">Create Book</loading-button>
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

export default {
  components: {
      Head,
      Link,
      LoadingButton,
      SelectInput,
      TextInput,
  },
  layout: Layout,
  props: {
      categories: Array, 
  },
  mounted() {
    console.log(this.categories);
  },
  data() {
      return {
          form: this.$inertia.form({
              title: '',
              author: '',
              publisher: '',
              category_id: '', 
          }),
      }
  },
  methods: {
      store() {
          this.form.post('/books', {
              onSuccess: () => {
                  this.$inertia.visit('/books');
              },
          });
      },
  },
}
</script>
