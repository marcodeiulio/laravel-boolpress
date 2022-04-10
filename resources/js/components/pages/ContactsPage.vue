<template>
  <div id="contacts-page" class="container">
    <div class="my-3">
      <label for="email" class="form-label">Email address</label>
      <input
        v-model="form.email"
        type="email"
        class="form-control"
        id="email"
        placeholder="name@example.com"
      />
    </div>
    <div class="mb-3">
      <label for="textarea" class="form-label">Example textarea</label>
      <textarea
        v-model="form.message"
        class="form-control"
        id="textarea"
        rows="3"
      ></textarea>
      <small class="form-text"
        >Il messaggio verrà letto dall'amministratore che provvederà a
        rispondere il prima possibile.</small
      >
    </div>
    <div class="text-end">
      <button @click="sendForm" class="btn btn-outline-primary">Send</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "ContactsPage",
  data() {
    return {
      form: {
        email: "",
        message: "",
      },
      // preparo error bag
      errors: {},
    };
  },
  methods: {
    sendForm() {
      // console.log(this.form.email, this.form.message);
      const params = {
        email: this.form.email,
        message: this.form.message,
      };
      // ? Alternativamente, invece di params, potrei passare anche direttamente this.form
      axios
        .post("http://127.0.0.1:8000/api/mails", this.form)
        .then((res) => {
          this.form.email = "";
          this.form.message = "";
          console.log("Mail sent"); // TODO alert e loader
        })
        .catch((err) => {
          // Recupero error bag
          this.errors = { error: "An error occurred." };
        })
        .then(() => {});
    },
  },
};
</script>

<style>
</style>