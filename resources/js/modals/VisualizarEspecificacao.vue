<template>
  <div
  class="modal fade"
  :id="id"
  tabindex="-1"
  role="dialog"
  :aria-labelledby="id"
  aria-hidden="true"
  >

  <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Visualizar Especificação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-section">
          <div class="row">
            <div class="col-md-6">
              <p>Componente: {{items.componente}}</p>
              <p>Formato aberto: {{items.formatoAberto}}</p>
              <p>Formato fechado: {{items.formatoFechado}}</p>
              <p>Número de Páginas: {{items.numPagina}}</p>
              <p>Papel: {{items.papel}}</p>
              <p>Opacidade: {{items.opacidade}}</p>
              <p>Lombada: {{items.lombada}}</p>
              <p>Observações: {{items.componente}}</p>
            </div>
            <div class="col-md-6">
              <p>Cores: {{items.cores}}</p>
              <p>Acabamento: {{items.acabamento}}</p>
              <p>Espessura: {{items.espessura}}</p>
              <p>Peso: {{items.peso}} g</p>
              <p>Orientação: {{items.orientacao}}</p>
              <p>Alvura: {{items.alvura}}</p>
              <p>Medida Lombada: {{items.medLombada}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import axios from "axios";

export default {
  props: ["value"],
  data() {
    return {
      id: "modal-visualizar-especificacao",
      items: {}
    };
  },
  watch: {
    value: function(newVal, oldVal) { // watch it
      //console.log('Prop changed: ', newVal, ' | was: ', oldVal);
      this.getEspecificacao(newVal);
    }
  },
  methods: {
    getEspecificacao(id){
      this.errors = {};
      axios
      .get('/listar-especificacao-geral/'+ id)
      .then(response => (this.items = response.data))
    }
  },
  mounted() {
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
