<template>
  <div class="  flex justify-center " style="width: 100%!important;">
    <div class=" p-8  rounded shadow-lg" style="width: 100%!important;">
      <div v-if="userData">
        <!-- <h1 class="text-2xl font-bold mb-4">Անուն: {{ userData.name }}</h1> -->
        <p class="text-gray-500 mb-2">Անուն: {{ userData.name }}</p>
        <p class="text-gray-500 mb-2">էլեկտրոնային հասցե: {{ userData.email }}</p>
        <p class="text-gray-500">Ամսաթիվ: {{ formatDate(userData.created_at) }}</p>
        <br>
        <textarea style="pointer-events: none" id="message" rows="4" readonly class="block p-2.5 w-full text-sm  rounded-lg border " :placeholder="'Հարցը:  ' + userData.message"></textarea>
        <br>
        <textarea v-if="userData.answer" style="pointer-events: none" id="message" rows="4" readonly class="block p-2.5 w-full text-sm  rounded-lg border " :placeholder="'Պատասխանը:  ' + userData.answer.message"></textarea>

      </div>
      <form v-if="!userData.answer" @submit.prevent="answerMessage" class="mt-4">
        <textarea v-model="answer" rows="4" class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-300" placeholder="Պատասխանել հարցին"></textarea>
        <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Պահպանել
            <span v-show="loading">
              <svg class="animate-spin h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V1.5A1.5 1.5 0 0113.5 0h-3A1.5 1.5 0 019 1.5V4a8 8 0 01-4 6.928M1.735 15.733A8.004 8.004 0 014 4.073"></path>
              </svg>
            </span>
        </button>
      </form>
      <p v-if="answered" class="mt-4 text-green-600">Message sent!</p>
    </div>
  </div>
</template>

<script>
import { dateMixin } from '../../../mixins/dateMixin'; // adjust the import path as per your project structure

export default {
  data() {
    return {
      message: null,
      answer: '',
      answered: false,
      loading: false
    };
  },
  mixins: [dateMixin],
  mounted() {
    // Fetch message data (you'll need to replace this with your own API call)
    this.message = {
      user: {
        name: 'John Doe',
        email: 'john@example.com'
      },
      content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
      date: 'February 13, 2024'
    };
  },
  methods: {
    answerMessage() {

      if(!this.answer){
        return false
      }
      this.loading = true;
      // this.answered = true;
      const id = this.$route.params.id;

      this.$store.dispatch("message/answer",{
          id:id,
          message:this.answer,
        }).then((res)=>{
          this.loading = false;
        })
    }
  },
  mounted(){
    const id = this.$route.params.id;
    this.$store.dispatch("message/getById",id);
  },
  computed: {
      userData() {
        return this.$store.getters['message/getMessage'];
      }
  }
};
</script>

<style>
/* Add custom styles here */
</style>
