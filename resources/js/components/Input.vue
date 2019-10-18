<template>
  <div class="form-group col col-xs-12">
    <label v-if="hasDefaultSlot">
      <slot></slot>
    </label>
    <input type="text" :placeholder="placeholder" class="form-control form-control-sm" :value="value" :v-model="vmodel" />
  </div>
</template>

<script>
export default {
  props: ["placeholder", "value", "vmodel"],
  computed: {
    hasDefaultSlot() {
      return !!this.$slots.default;
    }
  }
};
</script>

<style>
</style>
