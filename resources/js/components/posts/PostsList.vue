<template>
  <section id="posts-list" class="container">
    <h2>Posts</h2>
    <ul v-if="posts.length" class="list-unstyled">
      <li
        v-for="post in posts"
        :key="post.id"
        class="col-12 d-flex justify-content-center my-3"
      >
        <div class="card mb-3" style="max-width: 540px">
          <div class="row g-0">
            <div class="col-md-4">
              <img
                :src="post.image"
                class="img-fluid rounded-start"
                :alt="`Thumb: [${post.title}]`"
              />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{ post.title }}</h5>
                <p class="card-text">
                  {{ post.content }}
                </p>
                <p class="card-text">
                  <small class="text-muted">{{ post.updated_at }}</small>
                </p>
              </div>
            </div>
          </div>
        </div>
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