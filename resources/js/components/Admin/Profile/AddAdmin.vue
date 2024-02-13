<!-- ChangePasswordForm.vue -->
<template>
    <div class=" p-8 rounded  mx-auto w-full md:max-w-md">
      <h1 class="text-2xl font-semibold mb-4">Add Admin User</h1>
      <form @submit.prevent="changePassword">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="currentPassword">Current Password</label>
          <input v-model="currentPassword" type="password" id="currentPassword" name="currentPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="newPassword">New Password</label>
          <input v-model="newPassword" type="password" id="newPassword" name="newPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="confirmPassword">Confirm New Password</label>
          <input v-model="confirmPassword" type="password" id="confirmPassword" name="confirmPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Save</button>
      </form>
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
  