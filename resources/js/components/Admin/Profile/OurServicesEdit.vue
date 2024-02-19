<template>
    <div class=" p-8 rounded  mx-auto w-full md:max-w-md">
      <h1 class="text-2xl font-semibold mb-4">Խմբագրել գրառումը</h1>
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
        <br>
        <br>
        <button @click="deleteData" type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
          Ջնջել
        </button>
        <p v-if="editStatus" class="mt-4 text-green-600">
          Գրառումը հաջողությամբ պահպանվեց
        </p>

    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        name: '',
        description: '',
        id: 0
      };
    },
    methods: {
      saveData(){
        if(!this.name || !this.description){
          return false;
        }
        this.$store.dispatch("post/edit",{id:this.id,name:this.name,description:this.description})
      },
      async deleteData(){
        this.$store.dispatch("post/destroy",this.id).then((res)=>{
          this.$router.push('/admin/profile/services');
        });

      }
    },
    async mounted() {
      const id = this.$route.params.id;
      this.id = id;
      await this.$store.dispatch("post/getById",id).then((res)=>{
        this.name = res.name;
        this.description = res.description;
      })
    },
    computed: {
      post() {
        return this.$store.getters['post/getPost'];
      },
      editStatus(){
        return this.$store.getters['post/getEditStatus'];
      }
    }
  };
  </script>
  