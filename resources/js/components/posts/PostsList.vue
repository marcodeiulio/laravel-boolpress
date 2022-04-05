<template>
  <section id="posts-list" class="container">
    <h2 class="mt-3">Posts</h2>
    <ul v-if="posts.length" class="list-unstyled">
      <li
        v-for="post in posts"
        :key="post.id"
        class="col-12 d-flex justify-content-center my-3"
      >
        <post-card :post="post" :expandable="true" />
      </li>
    </ul>
    <p v-else>Non ci sono post</p>
  </section>
</template>

<script>
import PostCard from "./PostCard.vue";
export default {
  name: "PostsList",
  components: { PostCard },
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    getPosts() {
      axios
        .get("http://localhost:8000/api/posts")
        .then((res) => {
          this.posts = res.data;
          console.log(res.data);
        })
        .catch((err) => {
          console.log(err);
        })
        .then(() => {
          console.log("Chiamata terminata");
        });
    },
  },
  mounted() {
    this.getPosts();
  },
};
</script>

<style>
</style>