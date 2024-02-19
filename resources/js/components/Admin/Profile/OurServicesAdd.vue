<template>
    <div class=" p-8 rounded  mx-auto w-full md:max-w-md">
      <h1 class="text-2xl font-semibold mb-4">
        Ավելացնել նոր գրառում
      </h1>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2">Անուն</label>
          <input required v-model="name" type="text"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2">Նկարագրություն</label>
          <textarea required id="description" v-model="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>

        </div>
        <button @click="saveData" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
          Պահպանել
        </button>

    </div>       
  </template>
  
  <script>
  export default {
    data() {
      return {
        name: '',
        description: ''
      };
    },
    async mounted() {},
    methods: {
      async saveData(){
        if(!this.name || !this.description){
          return false;
        }
        await this.$store.dispatch("post/store",{name:this.name,description:this.description}).then((res)=>{
            this.$router.push('/admin/profile/services')
        })
      },
    },
  };
  </script>
  