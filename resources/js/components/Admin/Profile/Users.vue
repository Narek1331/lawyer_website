<template>
    <div class="container mx-auto overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="(user, index) in users" :key="index">
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap">{{ user.name }}</td>
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap">{{ user.email }}</td>
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap">{{ user.phone }}</td>
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap overflow-hidden overflow-ellipsis">{{ user.message }}</td>
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap">
              <button @click="editUser(index)" class="text-indigo-600 hover:text-indigo-900">Edit</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        users: [
          { name: 'John Doe', email: 'john@example.com', phone: '123-456-7890', message: 'This is a very long message that needs to be truncated to fit into the table cell.' },
          { name: 'Jane Doe', email: 'jane@example.com', phone: '987-654-3210', message: 'Vue.js is awesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesomeawesome!' },
          // Add more users as needed
        ]
      };
    },
    methods: {
      editUser(index) {
        // Handle edit action
        console.log('Edit user:', this.users[index]);
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add Tailwind CSS classes here if needed */
  </style>
  