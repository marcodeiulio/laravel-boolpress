<template>
  <div class="container mt-3">
    <h1 class="mb-3">PAOJDPA</h1>
    <div class="d-flex justify-content-center">
      <post-card v-if="post" :post="post" />
      <h3 v-else>Post non disponibile.</h3>
    </div>
  </div>
</template>

<script>
import PostCard from "../posts/PostCard.vue";
export default {
  name: "PostDetailPage",
  components: {
    PostCard,
  },
  data() {
    return {
      post: null,
    };
  },
  methods: {
    getPost() {
      axios
        .get("http://127.0.0.1:8000/api/posts/" + this.$route.params.id)
        .then((res) => {
          this.post = res.data;
        })
        .catch((err) => {
          console.log(err);
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