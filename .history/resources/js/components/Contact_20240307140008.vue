<template>
  <div class="bg-gray-100 py-20">
    <div class="container mx-auto px-4">
      <h1 class="text-4xl font-bold mb-8">Կապ մեզ հետ</h1>
      <p class="text-lg mb-8">
        Եթե ​​ունեք հարցեր կամ հարցումներ,կապվեք մեզ հետ: Մենք ուրախ կլինենք օգնել ձեզ
      </p>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h2 class="text-xl font-semibold mb-4">Մեր գրասենյակը</h2>
          <p class="mb-2">
            <a href="geo:latitude,longitude">Հասցե: Քաղաք Արմավիր, Հանրապետության 28</a>
          </p>
          <p class="mb-2">Հեռախոսահամար Մխիթար Տիգրանյան:
            <a href="tel:+37498539936">+374-98-53-99-36</a>
          </p>
          <p class="mb-2">Հեռախոսահամար:
            <a href="tel:+37493194025">+374-93-19-40-25</a>
          </p>
          <p class="mb-2">էլեկտրոնային հասցե:
            <a href="mailto:recipient@example.com">recipient@example.com</a>
          </p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h2 class="text-xl font-semibold mb-4">Ուղարկեք մեզ հաղորդագրություն</h2>
          <Form @submit="handleSubmit" :validation-schema="schema">
            <div class="mb-4">
              <label for="name" class="block text-gray-700 font-semibold mb-2">Ձեր Անունը</label>
              <Field name="name" type="text" class="border border-gray-300 rounded-lg w-full px-4 py-2" v-model="name"/>
              <ErrorMessage name="name" class="mt-1 text-red-500" />
            </div>
            <div class="mb-4">
              <label for="email" class="block text-gray-700 font-semibold mb-2">Ձեր էլեկտրոնային հասցեն</label>
              <Field name="email" type="text" class="border border-gray-300 rounded-lg w-full px-4 py-2" v-model="email"/>
              <ErrorMessage name="email" class="mt-1 text-red-500" />
            </div>
            <div class="mb-4">
              <label for="phone_number" class="block text-gray-700 font-semibold mb-2">Ձեր Հեռախոսահամարը</label>
              <Field name="phone_number" type="text" class="border border-gray-300 rounded-lg w-full px-4 py-2" v-model="phone_number"/>
              <ErrorMessage name="phone_number" class="mt-1 text-red-500" />
            </div>
            <div class="mb-4">
              <label for="message" class="block text-gray-700 font-semibold mb-2">Ձեր հարցը</label>
              <Field name="message" as="textarea" rows="4" class="border border-gray-300 rounded-lg w-full px-4 py-2" v-model="msg"/>
              <ErrorMessage name="message" class="mt-1 text-red-500" />
            </div>
            <button type="submit" :disabled="loading" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
              <span v-if="loading">Այժմ ուղարկվում է...</span>
              <span v-else>Ուղարկել</span>
            </button>
          </Form>
          <span  v-if="sended_message">{{ sended_message }}</span>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Form, Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";

export default {
  name: 'Contact',
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  data() {
    const schema = yup.object().shape({
      name: yup.string().required("Անունը պարտադիր է։"),
      email: yup.string().email("Խնդրում ենք մուտքագրել գործող էլեկտրոնային հասցե").required("Էլեկտրոնային հասցեն պարտադիր է:"),
      message: yup.string().required("Հաղորդագրությունը պարտադիր է:"),
      phone_number: yup.string().matches(/^\d+$/, "Հեռախոսահամարը պետք է լինի թվային").required("Հեռախոսահամարը պարտադիր է:"),
    });

    return {
      loading: false,
      message: "",
      schema,
      name:"",
      email:"",
      msg:"",
      phone_number:"",
      sended_message:"",
    };
  },
  methods: {
    async handleSubmit() {
      this.sended_message = "";
      try {
        const response = await this.$store.dispatch("message/store", {
          name: this.name,
          email: this.email,
          message: this.msg,
          phone_number: this.phone_number,
        });
        this.loading = false;
        this.sended_message = "Հաղորդագրությունը հաջողությամբ ուղարկվեց!";
        // this.name = ""
        // this.email = ""
        // this.msg =""
        // this.phone_number =""
      } catch (error) {
        console.error("Error:", error);
        this.sended_message = "Սխալ՝ հաղորդագրություն ուղարկելիս: Խնդրում եմ կրկին փորձեք.";
      } finally {
        // this.sended_message = "";
      }
    }

  },
};
</script>

<style scoped>
/* Add component specific styles here */
</style>
