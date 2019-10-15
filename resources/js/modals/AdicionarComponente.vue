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
            <v-select :options="[ 'Capa', 'Miolo' ]">Componente</v-select>
          </div>
          <div class="form-row">
            <v-input>Formato aberto (mm)</v-input>
            <v-input>Formato fechado (mm)</v-input>
            <v-input>Número de páginas</v-input>
          </div>
          <div class="form-row">
            <v-input>Papel/Gramatura</v-input>
            <v-input>Cores</v-input>
            <v-input>Acabamento</v-input>
          </div>
          <div class="form-row">
            <v-input>Observação</v-input>
          </div>
          <div class="form-row">
            <v-input>Espessura</v-input>
            <v-input>Peso (g)</v-input>
            <v-select :options="['Retrato','Paisagem']">Orientação</v-select>
            <v-input>Alvura (%)</v-input>
          </div>
          <div class="form-row">
            <v-input>Opacidade</v-input>
            <v-select :options="['A','B']">Lombada</v-select>
            <v-input>Medidas da lombada</v-input>
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
      id: "modal-adicionar-componente"
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