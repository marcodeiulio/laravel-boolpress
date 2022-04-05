<template>
  <div
    :class="`alert alert-${type} alert-dismissible fade show d-flex justify-content-between align-items-center pe-3`"
    role="alert"
  >
    <slot></slot>
    <span
      v-if="dismissable"
      class="pe-2"
      role="button"
      @click="$emit('on-close')"
    >
      <i class="bi bi-x-circle h5 m-0"></i>
    </span>
  </div>
</template>

<script>
export default {
  name: "Alert",
  props: ["type", "dismissable"],
};
</script>
