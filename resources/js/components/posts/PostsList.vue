<template>
  <section id="posts-list" class="container">
    <ul v-if="posts.length">
      <li v-for="post in posts" :key="post.id">
        <h5>{{ post.title }}</h5>
      </li>
    </ul>
    <p v-else>Non ci sono post</p>
  </section>
</template>

<script>
export default {
  name: "PostsList",
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