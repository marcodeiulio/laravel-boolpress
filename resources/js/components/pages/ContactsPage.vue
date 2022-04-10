<template>
  <div id="contacts-page" class="container">
    <alert
      v-if="hasErrors || alertMessage"
      :type="hasErrors ? 'danger' : 'success'"
      class="my-2"
    >
      <span v-if="alertMessage">{{ alertMessage }}</span>
      <ul v-if="hasErrors">
        <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
      </ul>
    </alert>
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
import Alert from "../Alert.vue";
export default {
  name: "ContactsPage",
  components: { Alert },
  data() {
    return {
      alertMessage: "",
      form: {
        email: "",
        message: "",
      },
      // preparo error bag
      errors: {},
    };
  },
  computed: {
    hasErrors() {
      return Object.keys(this.errors).length;
    },
  },
  methods: {
    sendForm() {
      //! prima di far partire la chiamata, controllo che il form sia ben compilato
      //! preparo l'oggetto errors che NON è lo stesso errors che ho in data()
      const errors = {};
      //! inizio validazione
      if (!this.form.email.trim()) errors.email = "Mail field is required.";
      if (!this.form.message.trim())
        errors.message = "Message field is required.";
      if (!this.form.email.match("/^w+@[a-zA-Z_]+?.[a-zA-Z]{2,3}$/"))
        errors.email = "Email is invalid.";
      //! Ora riassegno errors del data()
      this.errors = errors;

      // ? Alternativamente, invece di params, potrei passare anche direttamente this.form
      axios
        .post("http://127.0.0.1:8000/api/mas", this.form)
        .then((res) => {
          this.form.email = "";
          this.form.message = "";
          // TODO alert e loader
          this.alertMessage = "Mail successfully sent.";
        })
        .catch((err) => {
          // Recupero error bag
          this.hasErrors = true;
          this.errors = { error: "An error occurred." };
        })
        .then(() => {});
    },
  },
};
</script>

<style>
</style>