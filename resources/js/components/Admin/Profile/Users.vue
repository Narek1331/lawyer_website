<template>
    <div class="container mx-auto overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ԱՆՈՒՆ</th>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">էլեկտրոնային հասցե</th>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Հեռախոսահամար</th>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Հաղորդագրություն</th>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Կարգավիճակ</th>
            <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Գործողություններ</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="(user, index) in users" :key="index">
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap">{{ user.name }}</td>
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap">{{ user.email }}</td>
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap">{{ user.phone_number }}</td>
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap overflow-hidden overflow-ellipsis">{{ user.message }}</td>
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap" :class="{'text-green-500': user.answer, 'text-red-500': !user.answer}">{{ user.answer ? 'Ուղարկված է' : 'Ուղարկված չէ' }}</td>
            <td class="px-2 sm:px-6 py-4 whitespace-nowrap">
              <router-link :to="'/admin/profile/users/' + user.id" class="text-indigo-600 hover:text-indigo-900">
                Ցույց տալ ամբողջը
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
    },
    mounted() {
      this.$store.dispatch("message/get");
    },
    computed: {
      users() {
        return this.$store.getters['message/getMessages'];
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add Tailwind CSS classes here if needed */
  </style>
  