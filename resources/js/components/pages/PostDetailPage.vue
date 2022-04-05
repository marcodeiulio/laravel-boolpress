<template>
  <div class="container mt-3">
    <h1 class="mb-3">PAOJDPA</h1>
    <alert v-if="isError" type="danger" @on-close="isError = false">
      <p class="m-0">Si è verificato un errore</p>
      <router-link :to="{ name: 'Home' }" class="text-end d-inline"
        >Back to home</router-link
      >
    </alert>
    <div class="d-flex justify-content-center">
      <post-card v-if="post" :post="post" />
      <h3 v-else>Post non disponibile.</h3>
    </div>
  </div>
</template>

<script>
import Alert from "../Alert.vue";
import PostCard from "../posts/PostCard.vue";
export default {
  name: "PostDetailPage",
  components: {
    PostCard,
    Alert,
  },
  data() {
    return {
      post: null,
      isError: false,
    };
  },
  methods: {
    getPost() {
      axios
        .get("http://127.0.0.1:8000/api/posts/" + this.$route.params.slug)
        .then((res) => {
          this.post = res.data;
        })
        .catch((err) => {
          console.log(err);
          this.isError = true;
        });
      // TODO Aggiungere Loader
    },
  },
  mounted() {
    this.getPost();
  },
};
</script>

<style>
</style>