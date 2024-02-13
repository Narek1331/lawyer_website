<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
      <div class="max-w-md w-full p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Admin Login</h2>
        <form @submit.prevent="login" class="space-y-4">
          <div>
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" v-model="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
          <div>
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" id="password" v-model="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
          <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">Login</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        email: '',
        password: ''
      }
    },
    methods: {
      login() {
        console.log(this.email,this.password);
      }
    }
  }
  </script>
  
  <style>
  /* Add custom styles as needed */
  </style>
  