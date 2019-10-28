<template>
  <div class="form-group col col-xs-12">
    <label>
      <slot></slot>
    </label>
    <textarea class="form-control" v-bind:value="value" v-on:input="$emit('input', $event.target.value)"></textarea>
  </div>
</template>

<script>
export default {
  props: ["value"]
};
</script>

<style>
</style>
