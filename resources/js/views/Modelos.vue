<template>
  <div>
    <div class="mb-3 d-flex justify-content-between">
      <router-link to="/modelo" class="btn btn-primary d-flex align-items-center">
        <span class="material-icons">add</span>
        Adicionar novo modelo
      </router-link>
    </div>

    <b-table
      :fields="fields"
      :items="items"
      :busy="busy"
      :hover="true"
    >
      <div slot="table-busy" class="text-center text-blue my-2">
        <b-spinner class="align-middle"></b-spinner>
        <strong>Carregando...</strong>
      </div>

      <template v-slot:cell(actions)="row">
        <router-link :to="{ name: 'editarModelo', params: { id: row.item.id } }" title="Editar">
          <span class="material-icons">edit</span>
        </router-link>
        <a href title="Deletar" data-toggle="tooltip">
          <span class="material-icons">delete</span>
        </a>
      </template>
    </b-table>
  </div>
</template>

<script>
import Vue from "vue";
import BootstrapVue, { BPagination, BTable } from "bootstrap-vue";

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
        {
          nome: "Nome do modelo 001",
          autor: "Alexandre",
          editable: true,
          id: 1
        },
        {
          nome: "Nome do modelo 002",
          autor: "Administrador",
          editable: false,
          id: 2
        },
        {
          nome: "Nome do modelo 003",
          autor: "Alexandre",
          editable: true,
          id: 3
        }
      ]
    };
  }
};
</script>

<style>
</style>