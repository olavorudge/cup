<template>
  <div class="col">
    <div class="custom-file form-control-sm">
      <input type="file" :accept="accept" class="custom-file-input" id="customFile" />
      <label class="custom-file-label" for="customFile">
        <slot></slot>
      </label>
    </div>
  </div>
</template>

<script>
export default {
  props: ["accept"]
};
</script>

<style>
</style>