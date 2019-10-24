<template>
  <div class="col">
    <div class="custom-file form-control-sm">
      <input type="file" :accept="accept" class="custom-file-input" :name="name" id="customFile" v-bind:value="value" v-on:input="$emit('input', $event.target.value)" />
      <label class="custom-file-label" for="customFile">
        <slot></slot>
      </label>
    </div>
  </div>
</template>

<script>
export default {
  props: ["accept", "name", "value", "change"]
};
</script>

<style>
</style>
