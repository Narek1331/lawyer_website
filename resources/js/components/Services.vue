<template>
    <div class="container mx-auto py-16 px-4">
      <h1 class="text-3xl font-semibold mb-8 text-center">Մեր ծառայությունները</h1>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <div class="bg-white p-6 rounded-lg shadow-md" v-if="posts" v-for="(post, index) in posts">
          <h3 class="text-xl font-semibold mb-4">{{ post.name }}</h3>
          <p class="text-lg">{{ post.description }}</p>
        </div>

      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'ServicesPage',
    methods:{

    },
    mounted(){
      this.$store.dispatch("post/get");
    },
    computed: {
      posts() {
        return this.$store.getters['post/getPosts'];
      },
    }
  }
  </script>
  
  <style scoped>
  /* Scoped styles */
  </style>
  