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
      <h5 class="card-title">
        {{ post.title }}
        <span :class="`badge rounded-pill bg-${post.category.color}`">{{
          post.category.label
        }}</span>
      </h5>
      <p class="card-text">
        {{ post.content }}
      </p>
    </div>
    <router-link
      class="btn btn-sm btn-outline-info"
      :to="{ name: 'PostDetailPage', params: { id: post.id } }"
      v-if="expandable"
      >See more...</router-link
    >
    <div
      class="card-footer d-flex align-items-center"
      :class="
        post.tags.label ? 'justify-content-between' : 'justify-content-end'
      "
    >
      <span :class="`badge rounded-pill bg-${post.tags.color}`">{{
        post.tags.label
      }}</span>
      <small class="text-muted text-end">{{ updatedAt }}</small>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["post", "expandable"],
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