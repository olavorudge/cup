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
        <div class="row">
          <div class="col-md-12">
            <div id="responseProdutos" class="p-6 mb-2 bg-light text-dark">
            </div>
          </div>
        </div>
        <b-table
        :fields="fields"
        :items="items"
        :busy="busy"
        :hover="true"
        tbody-tr-class="row-class"
        >

        <template v-slot:cell(select)="data">
          <checkbox id :value="data.item.idProduto" v-model="selectedItems"></checkbox>
        </template>
        <template v-slot:cell(identificador)="data">
          {{data.item.idProduto}}
        </template>
        <template v-slot:cell(peg)="data">
          {{data.item.pegLA}}
        </template>
        <template v-slot:cell(nome)="data">
          {{data.item.titulo}}
        </template>
        <template v-slot:cell(isbn)="data">
          {{data.item.ISBN_LA}}
        </template>
        <template v-slot:cell(dataModificacao)="data">
          {{data.item.updated_at}}
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
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary" v-on:click="submit">Adicionar</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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
import axios from "axios";

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
      items: [{}],
      produto: {
        id: 1
      },
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
  },
  methods: {
    getProdutos(){
      axios
      .get('/listar-produtos')
      .then(response => (this.items = response.data))
    },
    submit() {
      axios
      .post('/cadastrar-estrutura', {
        idProduto: this.produto.id,
        selectedItems: this.selectedItems
      })
      .then(response => {
        var responseLog = document.getElementById('responseProdutos');
        responseLog.innerHTML = response.data.msg;
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
          var responseLog = document.getElementById('responseProdutos');
          var errorHandling = Object.values((JSON.parse(JSON.stringify(error.response.data.errors))));

          responseLog.innerHTML = errorHandling[0];
        }
      });
    }
  },
  mounted(){
    this.getProdutos();
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
