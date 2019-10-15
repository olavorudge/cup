<template>
  <div>
    <div class="mb-3 d-flex justify-content-between">
      <slot name="buttons"></slot>
      
      <router-link
        to="/produto"
        class="btn btn-primary btn-adicionar-produto d-flex align-items-center"
      >
        <span class="material-icons">add</span>
        Adicionar novo produto
      </router-link>

      <div>
        <button @click="() => showFilters = !showFilters" class="btn p-1" title="Filtrar">
          <span class="material-icons">filter_list</span>
        </button>
        <button @click="() => showExport = !showExport" class="btn p-1" title="Filtrar">
          <span class="material-icons">import_export</span>
        </button>
        <button @click="() => showArchivedItems = !showArchivedItems" class="btn p-1" title="Mostrar items arquivados">
          <span class="material-icons">archive</span>
        </button>
      </div>
    </div>

    <div v-if="showFilters" class="form-row">
      <v-input placeholder="Nome"></v-input>
      <v-input placeholder="Número PEG"></v-input>
      <v-select :options="[ 'Ano escolar / Série', '1 ano', '2 ano' ]"></v-select>
      <v-select :options="[ 'Volume', 1, 2, 3, 4 ]"></v-select>
    </div>
    <div v-if="showExport" class="form-row">
      <div class="col-3">Selecione um modelo de relatório para exportar os dados.</div>
      <v-select class="col-3" :options="[ 'Modelo geral 1', 'Modelo personalizado 1' ]"></v-select>
    </div>

    <b-table :fields="fields" :items="visibleItems" :busy="busy" :hover="true" :tbody-tr-class="rowClass">
      <div slot="table-busy" class="text-center text-blue my-2">
        <b-spinner class="align-middle"></b-spinner>
        <strong>Carregando...</strong>
      </div>

      <template v-slot:cell(select)="data">
        <checkbox id :value="data.item.id" v-model="selectedItems"></checkbox>
      </template>

      <template v-slot:cell(actions)="data">
        <a href data-toggle="modal">
          <span
            title="Visualizar"
            class="material-icons"
            @click="openModal('#modal-visualizar-produto')"
          >remove_red_eye</span>
        </a>

        <router-link v-if="!data.item.archived" :to="{ name: 'editarProduto', params: { id: data.item.id } }" title="Editar">
          <span class="material-icons">edit</span>
        </router-link>
        <a href v-if="!data.item.archived" title="Deletar" data-toggle="tooltip">
          <span class="material-icons">delete</span>
        </a>
        <a href v-if="!data.item.archived" title="Duplicar" data-toggle="tooltip">
          <span class="material-icons">file_copy</span>
        </a>
        <a href title="Exportar" data-toggle="tooltip">
          <span class="material-icons">picture_as_pdf</span>
        </a>
        <a href data-toggle="modal">
          <span
            title="Histórico"
            class="material-icons"
            @click="openModal('#modal-visualizar-historico')"
          >history</span>
        </a>
      </template>
    </b-table>

    <div>Exibindo {{ perPage }} de {{ rows }}</div>
    <div>
      <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" align="right"></b-pagination>
    </div>

    <modal-visualizar-historico></modal-visualizar-historico>
    <modal-visualizar-produto></modal-visualizar-produto>
  </div>
</template>

<script>
import Vue from "vue";
import BootstrapVue, { BPagination, BTable } from "bootstrap-vue";
import Checkbox from "@/js/components/Checkbox";
import VInput from "@/js/components/Input";
import VSelect from "@/js/components/Select";
import ModalVisualizarHistorico from "@/js/modals/VisualizarHistorico";
import ModalVisualizarProduto from "@/js/modals/VisualizarProduto";
import $ from "jquery";

Vue.use(BootstrapVue);

export default {
  components: {
    BPagination,
    BTable,
    Checkbox,
    VInput,
    VSelect,
    ModalVisualizarHistorico,
    ModalVisualizarProduto
  },
  data() {
    return {
      busy: false,
      currentPage: 1,
      perPage: 20,
      showFilters: true,
      showExport: false,
      showArchivedItems: false,
      selectedItems: [],
      fields: [
        {
          key: "select",
          label: ""
        },
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
        {
          key: "isbn",
          label: "ISBN",
          sortable: true,
          class: "text-center"
        },
        {
          key: "dataModificacao",
          label: "Modificação",
          sortable: true,
          class: "text-center"
        },
        { key: "actions", label: "Ações", class: "text-center" }
      ],
      items: [
        {
          identificador: "Identificador 001",
          peg: "PEG 001",
          nome: "Nome do produto 001",
          isbn: "ISBN 001",
          dataModificacao: "15/09/2019 14:33",
          id: 1,
          archived: false
        },
        {
          identificador: "Identificador 005",
          peg: "PEG 005",
          nome: "Nome do produto 005",
          isbn: "ISBN 005",
          dataModificacao: "01/04/2017 14:33",
          id: 1,
          archived: true
        },
        {
          identificador: "Identificador 003",
          peg: "PEG 003",
          nome: "Nome do produto 003",
          isbn: "ISBN 003",
          dataModificacao: "12/06/2019 14:33",
          id: 1,
          archived: false
        },
      ]
    };
  },
  computed: {
    rows() {
      return this.items.length;
    },
    visibleItems() {
      return this.items.filter(
        item => !item.archived || item.archived == this.showArchivedItems
      );
    }
  },
  methods: {
    // openModal(modalId) {
    //   $(modalId).modal();
    // },
    rowClass(item, type) {
      if (item.archived) return 'table-danger'
    }
  }
};
</script>

<style>
</style>