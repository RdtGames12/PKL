<template>
    <div>
        <Head title="Add Category" />
        <h1 class="mb-8 text-3xl font-bold">
            <Link class="text-indigo-400 hover:text-indigo-600" href="/categories">Categories</Link>
            <span class="text-indigo-400 font-medium">/</span> Add
        </h1>
        <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
            <form @submit.prevent="store">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <text-input v-model="form.category" :error="form.errors.category" class="pb-8 pr-6 w-full lg:w-1/2" label="Category" />
                </div>
                <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
                    <loading-button :loading="form.processing" class="btn-indigo" type="submit">Create Category</loading-button>
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
        LoadingButton
    },
    layout: Layout,
    data() {
        return {
            form: this.$inertia.form({
                category: '',
            }),
        }
    },
    methods: {
        store() {
            this.form.post('/categories', {
                onSuccess: () => {
                    this.$inertia.visit('/categories');
                },
            });
        },
    },
}
</script>
