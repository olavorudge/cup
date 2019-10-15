<template>
  <div class="form-group col col-xs-12">
    <label>
      <slot></slot>
    </label>
    <textarea class="form-control" v-model="value">}</textarea>
  </div>
</template>

<script>
export default {
  props: ["value"]
};
</script>

<style>
</style>