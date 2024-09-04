<template>
  <div>
    <Head title="Categories" />
    <h1 class="mb-8 text-3xl text-blue-500 font-bold">Categories</h1>

    <div class="flex items-center justify-between mb-6">
      <SearchFilter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
        <label class="block text-gray-700">Search:</label>
        <input v-model="form.search" type="text" class="form-input mt-1 w-full" placeholder="Search categories...">
      </SearchFilter>
      <Link class="btn-indigo" href="/categories/create">
        <span>Add</span>
        <span class="hidden md:inline">&nbsp;Category</span>
      </Link>
    </div>

    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
      <thead class="bg-gray-200">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Id</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Category</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Action</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="category in categories" :key="category.id">
          <td class="px-6 py-4 whitespace-nowrap text-md font-medium text-gray-500">{{ category.id }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-md font-medium text-gray-500">{{ category.category }}</td>
          <td class="w-px border-t">
            <Link :href="`/categories/${category.id}/edit`" :preserve-scroll :preserve-state class="btn-indigo  flex items-center px-auto" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
              Lihat Detail
            </Link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
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
  categories: Array, // Ubah 'books' menjadi 'categories'
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
      this.$inertia.get('/categories', { search: newSearch }, { preserveState: true });
    },
  },
  methods: {
    reset() {
      this.form.search = '';
    },
  },
}
</script>