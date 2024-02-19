<template>
  <div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-md">
      <img
        id="profile-img"
        src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"
        class="w-24 h-24 mx-auto rounded-full"
      />
      <Form @submit="handleLogin" :validation-schema="schema">
        <div class="mt-4">
          <label for="email" class="block text-gray-700">Էլեկտրոնային հասցե</label>
          <Field name="email" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
          <ErrorMessage name="email" class="mt-1 text-red-500" />
        </div>
        <div class="mt-4">
          <label for="password" class="block text-gray-700">Գաղտնաբառ</label>
          <Field name="password" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
          <ErrorMessage name="password" class="mt-1 text-red-500" />
        </div>

        <div class="mt-4">
          <button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" :disabled="loading">
            <span v-show="loading" class="mr-2">
              <svg class="animate-spin h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V1.5A1.5 1.5 0 0113.5 0h-3A1.5 1.5 0 019 1.5V4a8 8 0 01-4 6.928M1.735 15.733A8.004 8.004 0 014 4.073"></path>
              </svg>
            </span>
            <span>Մուտք գործել</span>
          </button>
        </div>

        <div v-if="message" class="mt-4">
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ message }}</span>
          </div>
        </div>
      </Form>
    </div>
  </div>
</template>

<script>
import { Form, Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";

export default {
  name: "Login",
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  data() {
    const schema = yup.object().shape({
      email: yup.string().required("Էլփոստի հասցեն պարտադիր է !"),
      password: yup.string().required("Գաղտնաբառը հասցեն պարտադիր է !"),
    });

    return {
      loading: false,
      message: "",
      schema,
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.auth.status.loggedIn;
    },
  },
  created() {
    if (this.loggedIn) {
      this.$router.push("/admin/profile");
    }
  },
  methods: {
    handleLogin(user) {
      this.loading = true;

      this.$store.dispatch("auth/login", user).then(
        () => {
          this.$router.push("/admin/profile");
        },
        (error) => {
          this.loading = false;
          this.message =
            (error.response &&
              error.response.data &&
              error.response.data.message) ||
            error.message ||
            error.toString();
        }
      );
    },
  },
};
</script>

<style scoped>
/* Tailwind CSS classes are applied directly in the template */
</style>
