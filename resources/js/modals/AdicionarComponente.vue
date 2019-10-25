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
          <h5 class="modal-title">Adicionar Componente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <v-select :options="[ {value: 'capa', name: 'Capa'}, {value: 'miolo', name:'Miolo'} ]"  v-form="form.componente">Componente</v-select>
          </div>
          <div class="form-row">
            <v-input v-form="form.formato_aberto">Formato aberto (mm)</v-input>
            <v-input v-form="form.formato_fechado">Formato fechado (mm)</v-input>
            <v-input v-form="form.num_paginas">Número de páginas</v-input>
          </div>
          <div class="form-row">
            <v-input v-form="form.papel">Papel/Gramatura</v-input>
            <v-input v-form="form.cores">Cores</v-input>
            <v-input v-form="form.acabamento">Acabamento</v-input>
          </div>
          <div class="form-row">
            <v-input v-form="form.observacoes">Observação</v-input>
          </div>
          <div class="form-row">
            <v-input v-form="form.espessura">Espessura</v-input>
            <v-input v-form="form.peso">Peso (g)</v-input>
            <v-select :options="[{value: 'retrato', name: 'Retrato'}, {value: 'paisagem', name: 'Paisagem'}]" v-form="form.orientacao">Orientação</v-select>
            <v-input  v-form="form.alvura">Alvura (%)</v-input>
          </div>
          <div class="form-row">
            <v-input v-form="form.opacidade">Opacidade</v-input>
            <v-select :options="[{value: 'A', name: 'A'}, {value: 'B', name:'B'} ]"  v-form="form.lombada">Lombada</v-select>
            <v-input v-form="form.medida_lombada">Medidas da lombada</v-input>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-primary">Adicionar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Checkbox from "@/js/components/Checkbox";
import VInput from "@/js/components/Input";
import VSelect from "@/js/components/Select";

export default {
  components: { Checkbox, VInput, VSelect },
  props: [""],
  data() {
    return {
      id: "modal-adicionar-componente",
      form: {}
    };
  },
  watch: {
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
