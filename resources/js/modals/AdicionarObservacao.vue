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
        <div class="row">
          <div class="col-md-12">
            <div class="response responseObservacao p-6 mb-2 bg-info text-dark">
              <span class="material-icons">done</span>
              <span id="observacaoResponse"></span>
            </div>
          </div>
        </div>
        <form name="form" id="form" @submit.prevent="submit">
        <div class="modal-body">
          <div>
            <p>Adicione uma breve descrição das alterações realizadas.</p>
          </div>
          <div class="form-row">
            <v-textarea v-model="form.observacao"></v-textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</template>

<script>
import VTextarea from "@/js/components/Textarea";
import axios from "axios";

export default {
  components: { VTextarea },
  data() {
    return {
      id: "modal-adicionar-observacao",
      form: {
        idProduto: 1,
        idUsuario: 1,
        observacao: ''
      }
    };
  },
  methods: {
    submit() {
      this.errors = {};
      console.log('ole');
      axios.post('/cadastrar-observacao', {
        idProduto: this.$route.params.id,
        idUsuario: this.form.idUsuario,
        observacao: this.form.observacao
      }).then(response => {
        var responseLog = document.getElementById('observacaoResponse');
        responseLog.innerHTML = response.data.msg;
        document.getElementsByClassName('responseObservacao')[0].style.display = "block";
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
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
