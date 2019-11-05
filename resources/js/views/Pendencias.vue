<template>
  <div>
    <div class="mb-3 d-flex justify-content-between">
      <div></div>
      <div>
        <button @click="() => showFilters = !showFilters" class="btn p-1" title="Filtrar">
          <span class="material-icons">filter_list</span>
        </button>
      </div>
    </div>

    <div v-if="showFilters" class="form-row">
      <v-input placeholder="Nome"></v-input>
      <v-input placeholder="Número PEG"></v-input>
      <v-select :options="[ 'Ano escolar / Série', '1 ano', '2 ano' ]"></v-select>
      <v-select :options="[ 'Volume', 1, 2, 3, 4 ]"></v-select>
    </div>

    <b-table
      :fields="fields"
      :items="visibleItems"
      :busy="busy"
      :hover="true"
      :tbody-tr-class="rowClass"
    >
      <div slot="table-busy" class="text-center text-blue my-2">
        <b-spinner class="align-middle"></b-spinner>
        <strong>Carregando...</strong>
      </div>
      <template v-slot:cell(nome)="row">
        <p>{{ row.item.titulo }}</p>
      </template>
      <template v-slot:cell(numeroPendencias)="row">
        <p>{{ row.item.totalPendentes }}</p>
      </template>
      <template v-slot:cell(isbn)="row">
        <p>{{ row.item.isbn_la }}</p>
      </template>
      <template v-slot:cell(peg)="row">
        <p>{{ row.item.peg_la }}</p>
      </template>
      <template v-slot:cell(dataModificacao)="row">
        <p>05/11/2019</p>
      </template>

      <template v-slot:cell(actions)="row">
        <a
          href="#"
          @click="row.toggleDetails"
          title="Mostrar detalhes"
          data-toggle="tooltip"
          :show="row.detailsShowing"
        >
          <span class="material-icons">error_outline</span>
        </a>

        <router-link
          v-if="!row.item.archived"
          :to="{ name: 'editarProduto', params: { id: row.item.id } }"
          title="Editar"
        >
          <span class="material-icons">edit</span>
        </router-link>
      </template>

      <template v-slot:row-details="row">
        <p><b>Campos pendentes:</b></p>
        {{row.item.CamposPendentes}}
      </template>
    </b-table>

    <div>Exibindo {{ perPage }} de {{ rows }}</div>
    <div>
      <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" align="right"></b-pagination>
    </div>
  </div>
</template>
<script>
import Vue from "vue";
import BootstrapVue, { BPagination, BTable } from "bootstrap-vue";
import Checkbox from "@/js/components/Checkbox";
import VInput from "@/js/components/Input";
import VSelect from "@/js/components/Select";
import $ from "jquery";
import axios from "axios";

Vue.use(BootstrapVue);

export default {
  components: {
    BPagination,
    BTable,
    Checkbox,
    VInput,
    VSelect
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
          key: "nome",
          label: "Nome",
          sortable: true,
          class: "text-center"
        },
        {
          key: "numeroPendencias",
          label: "Número de pendências",
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
          key: "peg",
          label: "PEG",
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
        {}
      ]
    };
  },
  computed: {
    rows() {
      return this.items.length;
    },
    visibleItems() {
      return this.items.filter(
        item => !item.arquivado || item.arquivado == this.showArchivedItems
      );
    },
  },
  methods: {
    openModal(modalId) {
      $(modalId).modal();
    },
    rowClass(item, type) {
      if (item.arquivado) return "table-danger";
    },
    getPendencias(){
      axios
      .get('/listar-pendencias')
      .then(response => (this.items = response.data))
    }
  },
  mounted(){
    this.getPendencias();
  }
};
</script>

<style>
</style>
