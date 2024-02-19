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
        <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Submit</button>
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
      answered: false
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
      // this.answered = true;
      const id = this.$route.params.id;

      this.$store.dispatch("message/answer",{
          id:id,
          message:this.answer,
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
