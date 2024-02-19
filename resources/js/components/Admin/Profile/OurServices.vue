<template>
    <div class="container mx-auto overflow-x-auto">
      <div class="text-center">
        <router-link class="btn p-2 text-indigo-600 hover:text-indigo-900" to="/admin/profile/services/create">
          Ավելացնել նոր գրառում
        </router-link>
        
      </div>
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ԱՆՈՒՆ</th>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ՆԿԱՐԱԳՐՈՒԹՅՈՒՆ</th>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Գործողություններ</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="(post, index) in posts" :key="index">
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap">{{ post.name }}</td>
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap overflow-hidden overflow-ellipsis">{{ post.description }}</td>
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap">
              <router-link :to="'/admin/profile/services/' + post.id" class="text-indigo-600 hover:text-indigo-900">
                Խմբագրել
              </router-link>
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
      };
    },
    methods: {
      editpost(index) {
        // Handle edit action
      }
    },
    mounted() {
      this.$store.dispatch("post/get");
    },
    computed: {
      posts() {
        return this.$store.getters['post/getPosts'];
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add Tailwind CSS classes here if needed */
  </style>
  