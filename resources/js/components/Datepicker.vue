<template>
  <div class="form-group col col-xs-12">
    <label v-if="hasDefaultSlot">
      <slot></slot>
    </label>
    <input type="date" :placeholder="placeholder" class="form-control form-control-sm" v-bind:value="value" v-on:input="$emit('input', $event.target.value)"/>
  </div>
</template>

<script>
export default {
  props: ["placeholder", "value"],
  computed: {
    hasDefaultSlot() {
      return !!this.$slots.default;
    }
  }
};
</script>

<style>
</style>
