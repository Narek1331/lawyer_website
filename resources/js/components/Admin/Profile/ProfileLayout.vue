<template>
    <div class="flex flex-col h-screen">
      <!-- Top Bar -->
      <div class="bg-gray-900 text-white py-4 px-6 flex justify-between items-center">
        <div>
          <button @click="toggleSidebar" class="text-gray-300 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
  </svg>
  
          </button>
        </div>
        <div>Admin Panel</div>
        <div>
          <button @click="logout" class="text-gray-300 hover:text-white">Logout</button>
        </div>
      </div>
  
      <div class="flex flex-1">
        <!-- Sidebar -->
        <div :class="{ 'hidden': !isSidebarOpen }" class="bg-gray-800 w-64">
          <!-- Sidebar content goes here -->
          <ul class="py-4">
            <li class="px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-700" :class="{ 'text-white': isActiveRoute('/admin/profile/users') }">
                <router-link to="/admin/profile/users">Users</router-link>
            </li>
            <li class="px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-700" :class="{ 'text-white': isActiveRoute('/admin/profile/services') }">
                <router-link to="/admin/profile/services">Our Services</router-link>
            </li>
            <li class="px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-700" :class="{ 'text-white': isActiveRoute('/admin/profile/settings') }">
                <router-link to="/admin/profile/settings">Settings</router-link>
            </li>
            <li class="px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-700" :class="{ 'text-white': isActiveRoute('/admin/profile/add/user') }">
                <router-link to="/admin/profile/add/user">Add Admin User</router-link>
            </li>
          </ul>
        </div>
        
        <router-view/>

      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'AdminPanel',
    data() {
      return {
        isSidebarOpen: true
      }
    },
    methods: {
      toggleSidebar() {
        this.isSidebarOpen = !this.isSidebarOpen;
      },
      logout() {
        // Implement your logout logic here
        console.log('Logged out');
      },
      isActiveRoute(route){
        return this.$route.path === route;
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add custom styles here if needed */
  </style>
  