<template>
    <Layout>
      <div>
        <Head title="Dashboard" />
        <h1 class="mb-8 text-3xl font-bold">Dashboard</h1>
      </div>
    </Layout>
  </template>
  
  <script>
  import { Head } from '@inertiajs/vue3'
  import Layout from '@/Shared/Layout.vue'
  
  export default {
    components: {
      Head,
      Layout, // Make sure Layout is registered here if it's a local component
    },
    // If Layout is a global component or handled by Inertia, remove the layout property
    // layout: Layout,
  }
  </script>