<template>
  <div>
    <Head title="Books" />
    <h1 class="mb-8 text-3xl font-bold">Books</h1>

    <div class="flex items-center justify-between mb-6">
      <SearchFilter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
        <label class="block text-gray-700">Search:</label>
        <input v-model="form.search" type="text" class="form-input mt-1 w-full" placeholder="Search books...">
      </SearchFilter>
      <Link class="btn-indigo" href="/books/create">
        <span>Add</span>
        <span class="hidden md:inline">&nbsp;Book</span>
      </Link>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publisher</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="book in books" :key="book.id">
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ book.title }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ book.author }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ book.publisher }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ book.category_name }}</td>
          <td class="w-px border-t">
            <Link :href="`/books/${book.id}/edit`" :preserve-scroll :preserve-state class="flex items-center px-4" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
              EDIT
            </Link>
          </td>

        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Layout from '@/Shared/Layout.vue'
import SearchFilter from '@/Shared/SearchFilter.vue'

export default {
  components: {
    Head,
    Link,
    SearchFilter,
  },
  layout: Layout,
  props: {
    books: Array,
  },
  data() {
    return {
      form: {
        search: '',
      },
    }
  },
  watch: {
    'form.search': function (newSearch) {
      this.$inertia.get('/books', { search: newSearch }, { preserveState: true });
    },
  },
  methods: {
    reset() {
      this.form.search = '';
    },
  },
}
</script>