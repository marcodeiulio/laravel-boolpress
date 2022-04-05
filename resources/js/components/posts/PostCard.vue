<template>
  <div id="post-card" class="card" style="width: 50%">
    <figure class="d-flex justify-content-center align-items-center w-100">
      <img
        :src="post.image"
        class="card-img-top"
        :alt="`Thumb: [${post.title}]`"
      />
    </figure>
    <div class="card-body">
      <h5 class="card-title">{{ post.title }}</h5>
      <p class="card-text">
        {{ post.content }}
      </p>
      <p class="card-text text-end">
        <small class="text-muted">{{ updatedAt }}</small>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["post"],
  computed: {
    updatedAt() {
      const postDate = new Date(this.post.updated_at);
      let day = postDate.getDate();
      let month = postDate.getMonth() + 1;
      const year = postDate.getFullYear();
      const hours = postDate.getHours();
      let minute = postDate.getMinutes();
      const second = postDate.getSeconds();

      if (minute < 10) minute = "0" + minute;
      if (day < 10) day = "0" + day;
      if (month < 10) month = "0" + month;

      return `${day}/${month}/${year} ${hours}:${minute}`;
    },
  },
};
</script>

<style lang="scss" scoped>
#post-card {
  img {
    max-width: 50%;
  }
}
</style>