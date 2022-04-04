<template>
  <div>
    <Header :title="title" />
    <PostsList />
  </div>
</template>

<script>
import Header from "./Header.vue";
import PostsList from "./posts/PostsList.vue";
export default {
  name: "App",
  components: {
    Header,
    PostsList,
  },
  data() {
    return {
      title: "Boolpress",
    };
  },
};
</script>
