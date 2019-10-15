<template>
  <div
    class="modal fade"
    :id="id"
    tabindex="-1"
    role="dialog"
    :aria-labelledby="id"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-slideout modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Selecionar Campos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div v-for="field in fields" :key="field.key" class="form-row">
            <checkbox :id="field.key" :value="field.key" v-model="selectedFields">{{ field.label }}</checkbox>
          </div>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>-->
      </div>
    </div>
  </div>
</template>

<script>
import Checkbox from "@/js/components/Checkbox";

export default {
  components: { Checkbox },
  props: ["fields"],
  data() {
    return {
      id: "modal-selecionar-componentes",
      selectedFields: this.fields
        .filter(field => field.hideable && field.visible)
        .map(field => field.key)
    };
  },
  watch: {
    selectedFields(newValue) {
      this.$emit("updateFields", newValue);
    }
  }
};
</script>

<style scoped>
p {
  margin-bottom: 0.5rem;
}

.row.row-separator::after {
  margin: 10px 1rem 0;
}
</style>