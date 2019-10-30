<template>
  <div>
    <div class="mb-3">
      <button class="btn btn-primary d-flex" @click="openModal('#modal-adicionar-observacao')">
        <span class="material-icons">add</span>Adicionar observação
      </button>
    </div>
    <b-table :fields="fields" :items="items" :busy="busy" :hover="true" tbody-tr-class="row-class">
      <div slot="table-busy" class="text-center text-blue my-2">
        <b-spinner class="align-middle"></b-spinner>
        <strong>Carregando...</strong>
      </div>
      <template v-slot:cell(data)="data">
        {{data.item.created_at}}
      </template>
      <template v-slot:cell(usuario)="data">
        Isabella
      </template>
      <template v-slot:cell(observacao)="data">
        {{data.item.observacao}}
      </template>
    </b-table>
    <modal-adicionar-observacao></modal-adicionar-observacao>
  </div>
</template>

<script>
import Vue from "vue";
import BootstrapVue, { BPagination, BTable } from "bootstrap-vue";
import ModalAdicionarObservacao from "@/js/modals/AdicionarObservacao";
import axios from "axios";
import $ from "jquery";

Vue.use(BootstrapVue);

export default {
  components: { BTable, ModalAdicionarObservacao },
  data() {
    return {
      busy: false,
      currentPage: 1,
      perPage: 20,
      items: [{
        idProduto: '',
        observacao: '',
        created_at: '',
      }],
      fields: [
        {
          key: "data",
          label: "Data de criação",
          class: "text-center"
        },
        {
          key: "usuario",
          label: "Usuário",
          class: "text-center"
        },
        {
          key: "observacao",
          label: "Observação",
          class: "text-center"
        }
      ]
    };
  },
  methods: {
    openModal(modalId) {
      $(modalId).modal();
    },
    getObservacoes(id){
      axios
      .get('/listar-observacoes/' + id)
      .then(response => (this.items = response.data))
    },
  },
  mounted(){
    this.getObservacoes(this.$route.params.id);
  }
};
</script>

<style>
</style>
