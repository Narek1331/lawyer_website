<template>
    <div class=" p-8 rounded  mx-auto w-full md:max-w-md">
      <h1 class="text-2xl font-semibold mb-4">Edit Serive</h1>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
          <input v-model="name" type="text"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
          <textarea id="description" v-model="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>

        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Save</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        currentPassword: '',
        newPassword: '',
        confirmPassword: ''
      };
    },
    methods: {
      changePassword() {
        // Implement your logic to handle password change
        console.log('Changing password...');
        console.log('Current Password:', this.currentPassword);
        console.log('New Password:', this.newPassword);
        console.log('Confirm Password:', this.confirmPassword);
        // Reset form fields after submission if needed
        this.currentPassword = '';
        this.newPassword = '';
        this.confirmPassword = '';
      }
    }
  };
  </script>
  