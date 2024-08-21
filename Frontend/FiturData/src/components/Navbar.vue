<script setup>

</script>
<template>
<nav class="border-gray-200 bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <router-link to="/" >
        <img src="../assets/tiketux.png" class="h-10" alt="">    
    </router-link>
  <div class="flex md:order-2">
        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-gray-900">
          <li>
            <router-link to="/" class="block py-2 px-3 bg-blue-700 rounded bg-transparent text-blue-700 md:p-0" aria-current="page">Home</router-link>
          </li>
        </ul>
      </div>
  </div>
</nav>
</template>