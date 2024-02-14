<template>
  <div class="  flex justify-center " style="width: 100%!important;">
    <div class=" p-8  rounded shadow-lg" style="width: 100%!important;">
      <div v-if="message">
        <h1 class="text-2xl font-bold mb-4">{{ message.user.name }}</h1>
        <p class="text-gray-500 mb-2">{{ message.user.email }}</p>
        <p class="mb-4">{{ message.content }}</p>
        <p class="text-gray-500">{{ message.date }}</p>
      </div>
      <form v-if="!answered" @submit.prevent="answerMessage" class="mt-4">
        <textarea v-model="answer" rows="4" class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-300"></textarea>
        <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Submit</button>
      </form>
      <p v-if="answered" class="mt-4 text-green-600">Message sent!</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: null,
      answer: '',
      answered: false
    };
  },
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
      // Here you would submit the answer using an API call
      // For demo purposes, we'll just set answered to true
      this.answered = true;
    }
  }
};
</script>

<style>
/* Add custom styles here */
</style>
