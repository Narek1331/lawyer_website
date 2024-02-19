<template>
    <div class=" p-8 rounded  mx-auto w-full md:max-w-md">
      <h1 class="text-2xl font-semibold mb-4">Ավելացնել ադմինիստրատորի օգտվող</h1>
      <form @submit.prevent="addAdminUser">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="userName">Անուն</label>
          <input required v-model="name" type="text" id="userName" name="userName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="newPassword">Էլեկտրոնային հասցե</label>
          <input required v-model="email" type="email" id="userEmail" name="userEmail" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="userPassword">Գաղտնաբառ</label>
          <input required v-model="password" type="password" id="userPassword" name="userPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Պահպանել</button>
      </form>
      <p class="mt-4 text-green-600" v-if="added_admin">
        Ադմինիստրատորի օգտատերը հաջողությամբ ավելացվել է
      </p>
      <ErrorMessage :error-response="apiError" v-if="apiError" />

    </div>
  </template>
  
  <script>
    import ErrorMessage from "../../Error.vue"; 
  export default {
    data() {
      return {
        name: '',
        email: '',
        password: ''
      };
    },
    components: {
      ErrorMessage
    },
    computed:{
      added_admin(){
        return this.$store.getters['auth/addedAdmin'];
      },
      apiError(){
        return this.$store.getters['auth/errorMessages'];
      }
    },
    methods: {
      addAdminUser() {
    

        this.$store.dispatch("auth/addAdminUser",{
          name:this.name,
          email:this.email,
          password:this.password
        })
      }
    }
  };
  </script>
  