<template>
  <div>
    <div class="mb-3">
      <button class="btn btn-primary d-flex" @click="openModal('#modal-buscar-produtos')">
        <span class="material-icons">add</span>Adicionar produto
      </button>
    </div>

    <b-table :fields="fields" :items="items" :busy="busy" :hover="true" tbody-tr-class="row-class">
      <div slot="table-busy" class="text-center text-blue my-2">
        <b-spinner class="align-middle"></b-spinner>
        <strong>Carregando...</strong>
      </div>
      <template v-slot:cell(identificador)="data">
        {{data.item.idProduto}}
      </template>
      <template v-slot:cell(peg)="data">
        {{data.item.pegLA}}
      </template>
      <template v-slot:cell(nome)="data">
        {{data.item.titulo}}
      </template>
      <template v-slot:cell(actions)="data">
        <button type="button" title="Remover" data-toggle="tooltip" class="button-invisible" @click="deletarEstrutura(data.item.idProduto)">
          <span class="material-icons">clear</span>
        </button>
      </template>
    </b-table>
    <modal-buscar-produtos></modal-buscar-produtos>
  </div>
</template>

<script>
import Vue from "vue";
import axios from "axios";
import BootstrapVue, { BPagination, BTable } from "bootstrap-vue";
import ModalBuscarProdutos from "@/js/modals/BuscarProdutos";
import $ from "jquery";

Vue.use(BootstrapVue);

export default {
  components: { BTable, ModalBuscarProdutos },
  data() {
    return {
      busy: false,
      currentPage: 1,
      perPage: 20,
      items: [{
        idProduto: ''
      }],
      fields: [
        {
          key: "identificador",
          label: "Identificador",
          sortable: true,
          class: "text-center"
        },
        {
          key: "peg",
          label: "PEG",
          sortable: true,
          class: "text-center"
        },
        {
          key: "nome",
          label: "Nome",
          sortable: true,
          class: "text-center"
        },
        { key: "actions", label: "Ações", class: "text-center" }
      ]
    };
  },
  methods: {
    openModal(modalId) {
      $(modalId).modal();
    },
    getEstrutura(id){
      axios
      .get('/listar-estruturas/' + id)
      .then(response => (this.items = response.data))
    },
    deletarEstrutura(idProduto){
      axios
      .post('/deletar-estrutura', {
        idEstrutura: 1,
        idProduto: idProduto
      })
      .then(response => {
        var responseMsg = response.data.msg;
        var responseLog = document.getElementById('response');
        responseLog.innerHTML = responseMsg;
      })
      setTimeout(() => this.getEstrutura(1), 100);
    }
  },
  mounted(){
    this.getEstrutura(1);
  }
};
</script>

<style>
</style>
