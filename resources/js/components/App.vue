
  <template>
          <!-- <p>Website created by narek.dev13@gmail.com</p> -->
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
  