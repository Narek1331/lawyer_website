<template>
    <div class="bg-gray-100 py-20">
      <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-8">Contact Us</h1>
        <p class="text-lg mb-8">If you have any questions or inquiries, feel free to get in touch with us. We'll be glad to assist you.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Our Office</h2>
            <p class="mb-2">123 Main Street</p>
            <p class="mb-2">New York, NY 10001</p>
            <p class="mb-2">Phone: (123) 456-7890</p>
            <p class="mb-2">Email: info@example.com</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Send Us a Message</h2>
            <form>
              <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Your Name</label>
                <input type="text" id="name" name="name" class="border border-gray-300 rounded-lg w-full px-4 py-2">
              </div>
              <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Your Email</label>
                <input type="email" id="email" name="email" class="border border-gray-300 rounded-lg w-full px-4 py-2">
              </div>
              <div class="mb-4">
                <label for="message" class="block text-gray-700 font-semibold mb-2">Your Message</label>
                <textarea id="message" name="message" rows="4" class="border border-gray-300 rounded-lg w-full px-4 py-2"></textarea>
              </div>
              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">Send Message</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Contact',
  };
  </script>
  
  <style scoped>
  /* Add component specific styles here */
  </style>
  