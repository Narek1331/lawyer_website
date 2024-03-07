<template>
  <div id="app" class="flex flex-col min-h-screen">
    <nav class="bg-gray-800 shadow-lg">
      <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
          <div class="text-2xl font-semibold text-gray-100">
            <router-link to="/" >Փորձ և Հմտություն</router-link>
          </div>
          <!-- Toggle for smaller screens -->
          <button @click="toggleMenu" class="block lg:hidden text-gray-100 focus:outline-none">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
          </button>
          <!-- Navigation links for larger screens -->
          <div class="hidden lg:flex lg:items-center lg:justify-end lg:flex-1">
            <router-link to="/" class="text-gray-100 hover:text-gray-200 px-4" :class="{ 'text-xl': getActiveClass('/') }">Գլխավոր էջ</router-link>
            <router-link to="/services" class="text-gray-100 hover:text-gray-200 px-4" :class="{ 'text-xl': getActiveClass('/services') }">Մեր ծառայությունները</router-link>
            <router-link to="/about" class="text-gray-100 hover:text-gray-200 px-4" :class="{ 'text-xl': getActiveClass('/about') }">Մեր մասին</router-link>
            <router-link to="/contact" class="text-gray-100 hover:text-gray-200 px-4" :class="{ 'text-xl': getActiveClass('/contact') }">Կոնտակտային տվյալներ</router-link>
          </div>
        </div>
      </div>
      <!-- Mobile Menu -->
      <div :class="{'block': isMenuOpen, 'hidden': !isMenuOpen}" class="lg:hidden">
        <router-link to="/" class="block text-gray-100 hover:text-gray-200 py-2 px-4 border-b border-gray-700" :class="{ 'text-xl': getActiveClass('/') }">Գլխավոր էջ</router-link>
        <router-link to="/services" class="block text-gray-100 hover:text-gray-200 py-2 px-4 border-b border-gray-700" :class="{ 'text-xl': getActiveClass('/services') }">Մեր ծառայությունները</router-link>
        <router-link to="/about" class="block text-gray-100 hover:text-gray-200 py-2 px-4 border-b border-gray-700" :class="{ 'text-xl': getActiveClass('/about') }">Մեր մասին</router-link>
        <router-link to="/contact" class="block text-gray-100 hover:text-gray-200 py-2 px-4 border-b border-gray-700" :class="{ 'text-xl': getActiveClass('/contact') }">Կոնտակտային տվյալներ</router-link>
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
      isMenuOpen: false
    };
  },
  methods: {
    getFullYear() {
      const now = new Date();
      return now.getFullYear();
    },
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
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
