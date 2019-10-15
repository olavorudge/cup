<template>
  <div
    class="modal fade"
    :id="id"
    tabindex="-1"
    role="dialog"
    :aria-labelledby="id"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Observação</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
            <p>Adicione uma breve descrição das alterações realizadas.</p>
          </div>
          <div class="form-row">
            <v-textarea></v-textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Adicionar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VTextarea from "@/js/components/Textarea";

export default {
  components: { VTextarea },
  data() {
    return {
      id: "modal-adicionar-observacao"
    };
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