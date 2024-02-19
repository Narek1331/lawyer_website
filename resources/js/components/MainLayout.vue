<template>
    <div id="app" class="flex flex-col min-h-screen">
      <nav class="bg-gray-800 shadow-lg">
        <div class="container mx-auto px-4">
          <div class="flex justify-between items-center py-4">
            <div class="text-2xl font-semibold text-gray-100">
              <router-link to="/" >Law</router-link>
            </div>
            <div>
              <router-link to="/" class="text-gray-100 hover:text-gray-200 px-4" :class="{ 'text-xl	': getActiveClass('/') }">Գլխավոր էջ</router-link>
              <router-link to="/services" class="text-gray-100 hover:text-gray-200 px-4" :class="{ 'text-xl	': getActiveClass('/services') }">Մեր ծառայությունները</router-link>
              <router-link to="/about" class="text-gray-100 hover:text-gray-200 px-4" :class="{ 'text-xl	': getActiveClass('/about') }">Մեր մասին</router-link>
              <router-link to="/contact" class="text-gray-100 hover:text-gray-200 px-4" :class="{ 'text-xl	': getActiveClass('/contact') }">Կոնտակտային տվյալներ</router-link>
            </div>
          </div>
        </div>
      </nav>
  
      <router-view class="flex-grow"/>
  
      <footer class="bg-gray-800 text-white py-8 mt-auto">
        <div class="container mx-auto px-4 text-center">
          <p>&copy; {{ getFullYear() }} Իրավաբանական ընկերություն. Բոլոր իրավունքները պաշտպանված են.</p>
        </div>
      </footer>
    </div>
  </template>

  
  <script>
  
  export default {
  data() {
    return {
      data: ''
    };
  },
  methods: {
    getFullYear(){
      const now = new Date();
      return now.getFullYear();
    },  
    getActiveClass(route) {
      return this.$route.path === route;
    }
  }
}
  </script>
  
  <style>
  /* Add styling for the main layout */
  .main-content {
    margin-top: 20px; /* Example margin */
  }
  </style>
  