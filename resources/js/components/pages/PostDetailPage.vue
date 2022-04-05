<template>
  <div class="container mt-3">
    <h1>PAOJDPA</h1>
    <post-card v-if="post" :post="post" />
    <h3 v-else>Post non disponibile.</h3>
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
        .get("http://127.0.0.1:8000/api/posts/3")
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