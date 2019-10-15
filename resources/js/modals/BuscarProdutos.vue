<template>
  <div
    class="modal fade"
    :id="id"
    tabindex="-1"
    role="dialog"
    :aria-labelledby="id"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-slideout modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Buscar Produtos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <v-input>Nome</v-input>
            <v-input>Número PEG</v-input>
            <v-select :options="[ '1 ano', '2 ano' ]">Ano escolar / Série</v-select>
            <v-select :options="[ 1, 2, 3, 4 ]">Volume</v-select>
          </div>

          <b-table
            :fields="fields"
            :items="items"
            :busy="busy"
            :hover="true"
            tbody-tr-class="row-class"
          >
            <template v-slot:cell(select)="data">
              <checkbox id :value="data.item.id" v-model="selectedItems"></checkbox>
            </template>
          </b-table>

          <div>Exibindo {{ perPage }} de {{ rows }}</div>
          <div>
            <b-pagination
              v-model="currentPage"
              :total-rows="rows"
              :per-page="perPage"
              align="right"
            ></b-pagination>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from "vue";
import BootstrapVue, { BPagination, BTable } from "bootstrap-vue";
import Checkbox from "@/js/components/Checkbox";
import VInput from "@/js/components/Input";
import VSelect from "@/js/components/Select";

Vue.use(BootstrapVue);

export default {
  components: { BTable, Checkbox, VInput, VSelect },
  data() {
    return {
      id: "modal-buscar-produtos",
      busy: false,
      currentPage: 1,
      perPage: 20,
      selectedItems: [],
      items: [
        {
          identificador: "Identificador 001",
          peg: "PEG 001",
          nome: "Nome do produto 001",
          isbn: "ISBN 001",
          dataModificacao: "15/09/2019 14:33",
          id: 1
        },
        {
          identificador: "Identificador 002",
          peg: "PEG 002",
          nome: "Nome do produto 002",
          isbn: "ISBN 002",
          dataModificacao: "01/06/2019 14:33",
          id: 2
        }
      ],
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
        }
      ]
    };
  },
  computed: {
    rows() {
      return this.items.length;
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