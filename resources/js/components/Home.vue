<template>
  <div class="bg-gray-100 min-h-screen">
   
  <div class="home-bg bg-cover min-h-screen flex flex-col justify-center items-center text-white">
    <h1 class="text-5xl font-bold mb-6">Welcome to Our Law Firm</h1>
    <p class="text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla fringilla auctor justo vitae consectetur.</p>
    <router-link to="/services" class="bg-white text-blue-500 font-semibold py-2 px-6 rounded-full mt-8 inline-block hover:bg-blue-400 hover:text-white">Our Services</router-link>
  </div>

    <section class="container mx-auto py-16 px-4">
      <h2 class="text-2xl font-semibold mb-8">Why Choose Us?</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold mb-4">Experienced Lawyers</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold mb-4">Client Satisfaction</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold mb-4">Affordable Pricing</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
    </section>

  </div>
</template>

<script>
export default {
  name: 'HomePage'
}
</script>
<style scoped>
.home-bg {
  background-image: url('https://thumbor.forbes.com/thumbor/fit-in/900x510/https://www.forbes.com/advisor/wp-content/uploads/2022/11/Become_a_Lawyer.jpeg.jpg');
}
</style>
