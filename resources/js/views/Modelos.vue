<template>
  <div>
    <div class="mb-3 d-flex justify-content-between">
      <router-link to="/modelo" class="btn btn-primary d-flex align-items-center">
        <span class="material-icons">add</span>
        Adicionar novo modelo
      </router-link>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="response" class="p-6 mb-2 bg-info text-dark">
        </div>
      </div>
    </div>
    <b-table
    :fields="fields"
    :items="visibleItems"
    :busy="busy"
    :hover="true"
    >
    <div slot="table-busy" class="text-center text-blue my-2">
      <b-spinner class="align-middle"></b-spinner>
      <strong>Carregando...</strong>
    </div>
    <template v-slot:cell(nome)="data">
      {{data.item.nomeModelo}}
    </template>
    <template v-slot:cell(identificador)="data">
      {{data.item.autor}}
    </template>
    <template v-slot:cell(actions)="data">
        <router-link :to="{ name: 'editarModelo', params: { id: data.item.idModelo } }" title="Editar">
          <span class="material-icons">edit</span>
        </router-link>
        <button type="" class="button-invisible" title="Deletar" data-toggle="tooltip" @click="deleteModelo(data.item.idModelo)">
          <span class="material-icons">delete</span>
        </button>
    </template>
  </b-table>
</div>
</template>

<script>
import Vue from "vue";
import BootstrapVue, { BPagination, BTable } from "bootstrap-vue";
import axios from "axios";
import $ from "jquery";

Vue.use(BootstrapVue);

export default {
  components: { BTable },
  data() {
    return {
      busy: false,
      fields: [
        {
          key: "nome",
          label: "Nome",
          class: "text-center"
        },
        {
          key: "autor",
          label: "Autor",
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
      return this.items;
    }
  },
  methods: {
    rowClass(item, type) {
      return 'table-danger';
    },
    getModelos(){
      axios
      .get('/listar-modelos')
      .then(response => (this.items = response.data))
    },
    deleteModelo(id) {
      if(confirm('Deletar?')){
        axios
        .get('/deletar-modelo/' + id)
        .then(response => {
          var responseLog = document.getElementById('response');
          var responseMsg = response.data.msg;
          responseLog.innerHTML = responseMsg;
        })
      }
      setTimeout(() => this.getModelos(), 100);
    }
  },
  mounted(){
    this.getModelos();
  }
};
</script>

<style>
</style>
