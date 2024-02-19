<template>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
      <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-800">404 - Էջը չի գտնվել</h1>
        <p class="text-xl text-gray-600 mt-4">Ձեր փնտրած էջը գոյություն չունի</p>
        <router-link to="/" class="text-blue-500 hover:underline mt-4">Գլխավոր էջ</router-link>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'NotFound'
  }
  </script>
  