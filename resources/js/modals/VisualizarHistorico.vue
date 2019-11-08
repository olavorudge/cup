<template>
  <div
  class="modal fade"
  :id="id"
  tabindex="-1"
  role="dialog"
  :aria-labelledby="id"
  aria-hidden="true"
  >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Histórico de Alterações</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b-table
        :fields="fields"
        :items="items"
        :busy="busy"
        :hover="true"
        tbody-tr-class="row-class no-hover"
        >
        <template v-slot:cell(dataModificacao)="data">
          {{data.item.created_at}}
        </template>
        <template v-slot:cell(descricao)="data">
          {{data.item.observacao}}
        </template>
        <template v-slot:cell(usuario)="data">
          isa
        </template>
        <template v-slot:cell(showDetails)="row">
          <a
          href="#"
          @click="row.toggleDetails"
          title="Mostrar detalhes"
          data-toggle="tooltip"
          :show="row.detailsShowing"
          >
          <span class="material-icons">error_outline</span>
        </a>
      </template>

      <template v-slot:row-details="data">
        <p v-html="descricaoLog(data.item.descricaoLog)"></p>
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
import axios from "axios";

export default {
  components: { BTable },
  props: ["value"],
  data() {
    return {
      id: "modal-visualizar-historico",
      busy: false,
      currentPage: 1,
      perPage: 20,
      items: [
        {}
      ],
      fields: [
        {
          key: "dataModificacao",
          label: "Data de modificação"
        },
        {
          key: "descricao",
          label: "Descrição"
        },
        {
          key: "usuario",
          label: "Usuário"
        },
        {
          key: "showDetails",
          label: "Ações"
        }
      ]
    };
  },
  computed: {
    rows() {
      return this.items.length;
    }
  },
  watch: {
    value: function(newVal, oldVal) { // watch it
      //console.log('Prop changed: ', newVal, ' | was: ', oldVal);
      this.getLogs(newVal);
    }
  },
  methods: {
    getLogs(id){
      this.errors = {};
      axios
      .get('/listar-logs-produto/'+ id)
      .then(response => (this.items = response.data))
    },

    descricaoLog(item){
      return item;
    }
  },
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
