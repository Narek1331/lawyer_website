<template>
    <div class=" p-8 rounded  mx-auto w-full md:max-w-md">
      <h1 class="text-2xl font-semibold mb-4">Փոխել գաղտնաբառը</h1>
      <form @submit.prevent="changePassword">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="currentPassword">Ընթացիկ գաղտնաբառը</label>
          <input required v-model="currentPassword" type="password" id="currentPassword" name="currentPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="newPassword">Նոր ծածկագիր</label>
          <input required v-model="newPassword" type="password" id="newPassword" name="newPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="confirmPassword">Հաստատեք նոր գաղտնաբառը</label>
          <input required v-model="confirmPassword" type="password" id="confirmPassword" name="confirmPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
          Պահպանել
        </button>
      </form>
      <p class="mt-4 text-green-600" v-if="chnaged_password">
        Գաղտնաբառը հաջողությամբ փոխվեց
      </p>
      <ErrorMessage :error-response="apiError" v-if="apiError" />

    </div>
  
  </template>
  
  <script>
  import ErrorMessage from "../../Error.vue"; 

  export default {
    data() {
      return {
        currentPassword: '',
        newPassword: '',
        confirmPassword: ''
      };
    },
    components: {
      ErrorMessage
    },
    computed:{
      chnaged_password(){
        return this.$store.getters['auth/chnagedPassword'];
      },
      apiError(){
        return this.$store.getters['auth/errorMessages'];
      }
    },
    methods: {
      changePassword() {
        this.$store.dispatch("auth/changePassword",{
          current_password:this.currentPassword,
          new_password:this.newPassword,
          new_password_confirmation:this.confirmPassword
        })
        
        this.currentPassword = '';
        this.newPassword = '';
        this.confirmPassword = '';
      }
    }
  };
  </script>
  