<template>
  <div
    id="loader"
    class="d-flex justify-content-center align-items-center text-warning"
  >
    <h3>Loading...</h3>
  </div>
</template>

<script>
export default {
  name: "Loader",
};
</script>

<style>
#loader {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: rgba(0, 0, 0, 0.733);
}
</style>