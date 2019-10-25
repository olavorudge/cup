<template>
  <div class="form-group col col-xs-12">
    <label v-if="hasDefaultSlot">
      <slot></slot>
    </label>
    <select class="form-control form-control-sm"  v-on:input="$emit('input', $event.target.value)">
      <option value=""> Selecione </option>
      <option v-for="option in options" v-bind:value="option.value" :selected="value==option.value">{{ option.name }}</option>
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
