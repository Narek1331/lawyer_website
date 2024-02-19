
  <template>
          <router-view/>
  </template>
  
  <script>
  export default {
    name: 'App',
    mounted() {
    document.title = "Իրավաբանական ընկերություն"; // Change the title when the component is mounted
    }
  }
  </script>
  
  <style scoped>
  /* Scoped styles */
  </style>
  