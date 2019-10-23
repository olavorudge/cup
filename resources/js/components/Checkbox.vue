<template>
  <div class="form-check form-check-inline col">
    <input v-model="checkboxModel" :value="value" class="form-check-input" type="checkbox" :id="id" />
    <label class="form-check-label" :for="id">
      <slot></slot>
    </label>
  </div>
</template>

<script>
export default {
  model: {
    prop: "model",
    event: "input"
  },
  props: ["id", "model", "value"],
  data() {
    return {
      checkboxModel: this.model
    };
  },
  computed: {
    hasDefaultSlot() {
      return !!this.$slots.default;
    }
  },
  watch: {
    model(newValue) {
      this.checkboxModel = newValue;
    },
    checkboxModel(newValue) {
      this.$emit("input", newValue);
    }
  }
};
</script>

<style>
</style>
