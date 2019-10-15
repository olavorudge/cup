<template>
  <div class="form-group col col-xs-12">
    <label v-if="hasDefaultSlot">
      <slot></slot>
    </label>
    <select class="form-control form-control-sm">
      <option v-for="option in options" :key="option">{{ option }}</option>
    </select>
  </div>
</template>

<script>
export default {
  props: ["options"],
  computed: {
    hasDefaultSlot() {
      return !!this.$slots.default;
    }
  }
};
</script>

<style>
</style>