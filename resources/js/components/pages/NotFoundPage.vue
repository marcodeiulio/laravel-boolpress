<template>
  <div
    id="not-found"
    class="d-flex flex-column justify-content-center align-items-center"
  >
    <h4 class="text-muted">404 | Not Found</h4>
    <h3 class="text-muted">Whoops! There's nothing to see here 👀</h3>
    <button class="btn btn-outline-primary" @click="$router.back()">
      Go back
    </button>
  </div>
</template>

<script>
export default {
  name: "NotFoundPage",
};
</script>

<style>
#not-found {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
}
</style>