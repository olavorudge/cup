<template>
  <div class="form-group col col-xs-12">
    <label v-if="hasDefaultSlot">
      <slot></slot>
    </label>
    <select class="form-control form-control-sm" :v-model="vmodel">
      <option v-for="option in options" :value="option">{{ option }}</option>
    </select>
  </div>
</template>

<script>
export default {
  props: ["options", "value", "vmodel"],
  computed: {
    hasDefaultSlot() {
      return !!this.$slots.default;
    }
  }
};
</script>

<style>
</style>
