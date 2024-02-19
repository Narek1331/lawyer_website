<template>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errorMessage">
      <strong class="font-bold">Error!</strong>
      <span class="block sm:inline">{{ errorMessage }}</span>
      <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="closeError">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <title>Close</title>
          <path d="M14.348 14.849a1 1 0 0 1-1.497 1.32l-2.352-2.211-2.372 2.211a1 1 0 1 1-1.497-1.32l2.446-2.282-2.446-2.283a1 1 0 1 1 1.497-1.32l2.372 2.211 2.352-2.211a1 1 0 0 1 1.497 1.32l-2.426 2.282 2.426 2.283z"/>
        </svg>
      </span>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      errorResponse: {
        type: Object,
        default: () => ({})
      }
    },
    computed: {
      errorMessage() {
        if (this.errorResponse && this.errorResponse.message) {
          return this.errorResponse.message;
        } else {
          return null;
        }
      }
    },
    mounted(){
    },
    methods: {
      closeError() {
        // Optionally, you can emit an event to handle the error dismissal
      }
    }
  };
  </script>
  