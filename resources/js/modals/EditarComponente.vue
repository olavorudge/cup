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
          <h5 class="modal-title">Editar Componente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="response responseComponente p-6 mb-2 bg-info text-dark">
              <span class="material-icons">done</span>
              <span id="componenteResponse"></span>
            </div>
          </div>
        </div>
        <form name="form" id="form" @submit.prevent="submit">
        <div class="modal-body">
          <div class="form-row">
            <v-select :options="[ {value: 'capa', name: 'Capa'}, {value: 'miolo', name:'Miolo'} ]"  v-model="form.componente">Componente</v-select>
          </div>
          <div class="form-row">
            <v-input v-model="form.formatoAberto">Formato aberto (mm)</v-input>
            <v-input v-model="form.formatoFechado">Formato fechado (mm)</v-input>
            <v-input v-model="form.numPagina">Número de páginas</v-input>
          </div>
          <div class="form-row">
            <v-input v-model="form.papel">Papel/Gramatura</v-input>
            <v-input v-model="form.cores">Cores</v-input>
            <v-input v-model="form.acabamento">Acabamento</v-input>
          </div>
          <div class="form-row">
            <v-input v-model="form.observacoes">Observação</v-input>
          </div>
          <div class="form-row">
            <v-input v-model="form.espessura">Espessura</v-input>
            <v-input v-model="form.peso">Peso (g)</v-input>
            <v-select :options="[{value: 'retrato', name: 'Retrato'}, {value: 'paisagem', name: 'Paisagem'}]" v-model="form.orientacao">Orientação</v-select>
            <v-input  v-model="form.alvura">Alvura (%)</v-input>
          </div>
          <div class="form-row">
            <v-input v-model="form.opacidade">Opacidade</v-input>
            <v-select :options="[{value: 'A', name: 'A'}, {value: 'B', name:'B'} ]"  v-model="form.lombada">Lombada</v-select>
            <v-input v-model="form.medLombada">Medidas da lombada</v-input>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Adicionar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</template>

<script>
import Checkbox from "@/js/components/Checkbox";
import VInput from "@/js/components/Input";
import VSelect from "@/js/components/Select";
import axios from "axios";

export default {
  components: { Checkbox, VInput, VSelect },
  props: ["value"],
  data() {
    return {
      id: "modal-editar-componente",
      form: {
        idEspecificacao: '',
        idProduto: '',
        idTipoEspecificacao: '',
        componente: '',
        formatoAberto: '',
        formatoFechado: '',
        numPagina: '',
        papel: '',
        cores: '',
        acabamento: '',
        observacoes: '',
        espessura: '',
        peso: '',
        orientacao: '',
        alvura: '',
        opacidade: '',
        lombada: '',
        medLombada: ''
      }
    };
  },
  watch: {
    value: function(newVal, oldVal) { // watch it
      //console.log('Prop changed: ', newVal, ' | was: ', oldVal);
      this.getEspecificacao(newVal);
    }
  },
  methods: {
    submit() {
      this.errors = {};

      axios.post('/editar-especificacao', {
        idProduto: this.form.idProduto,
        idEspecificacao: this.form.idEspecificacao,
        idTipoEspecificacao: this.form.idTipoEspecificacao,
        componente: this.form.componente,
        formatoAberto: this.form.formatoAberto,
        formatoFechado: this.form.formatoFechado,
        numPagina: this.form.numPagina,
        papel: this.form.papel,
        cores: this.form.cores,
        acabamento: this.form.acabamento,
        observacoes: this.form.observacoes,
        espessura: this.form.espessura,
        peso: this.form.peso,
        orientacao: this.form.orientacao,
        alvura: this.form.alvura,
        opacidade: this.form.opacidade,
        lombada: this.form.lombada,
        medLombada: this.form.medLombada
      }).then(response => {
          var responseLog = document.getElementById('componenteResponse');
          responseLog.innerHTML = response.data.msg;
          document.getElementsByClassName('responseComponente')[0].style.display = "block";
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    },
    getEspecificacao(id){
      axios
      .get('/listar-especificacao-geral/' + id)
      .then(response => (this.form = response.data))
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
