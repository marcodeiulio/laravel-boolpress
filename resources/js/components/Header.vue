<template>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <span class="navbar-brand mb-0 h1">{{ title }}</span>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Header",
  props: ["title"],
};
</script>