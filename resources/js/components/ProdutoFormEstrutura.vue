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

      <template v-slot:cell(actions)="data">
        <a href title="Remover" data-toggle="tooltip">
          <span class="material-icons">clear</span>
        </a>
      </template>
    </b-table>

    <modal-buscar-produtos></modal-buscar-produtos>
  </div>
</template>

<script>
import Vue from "vue";
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
      items: [],
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
    }
  }
};
</script>

<style>
</style>