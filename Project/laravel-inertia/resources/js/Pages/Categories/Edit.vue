<template>
  <div>
    <Head title="Edit Category" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/categories">Categories</Link>
      <span class="text-indigo-400 font-medium">/</span> {{ category.category }}
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.category" :error="form.errors.category" class="pb-8 pr-6 w-full lg:w-1/2" label="Category" />
        </div>
        <div class="flex justify-between items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <div>
            <button v-if="!category.deleted_at" class="btn-warning ml-auto" tabindex="-1" type="button" @click="destroy">Delete Category</button>
          </div>
          <div class="flex items-end space-x-1">
            <Link href="/categories" class="btn-secondary ml-auto">Back</Link>
            <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Save Changes</loading-button>
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
import LoadingButton from '@/Shared/LoadingButton.vue'

export default {
  components: {
    Head,
    Link,
    TextInput,
    LoadingButton,
  },
  layout: Layout,
  props: {
    category: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        category: this.category.category,
      }),
    }
  },
  methods: {
    update() {
      this.form.put(`/categories/${this.category.id}`, {
        onSuccess: () => {
          this.$inertia.visit('/categories');
        },
      });
    },
    destroy() {
      if (confirm('Are you sure you want to delete this category?')) {
        this.$inertia.delete(`/categories/${this.category.id}`, {
          onSuccess: () => {
            this.$inertia.visit('/categories');
          },
        });
      }
    },
  },
}
</script>
