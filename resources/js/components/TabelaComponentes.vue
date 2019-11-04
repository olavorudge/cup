<template>
  <div>
    <div class="mb-3 d-flex justify-content-between">
      <button
        @click="openModal('#modal-adicionar-componente')"
        class="btn btn-primary d-flex align-items-center"
      >
        <span class="material-icons">add</span>
        Adicionar novo componente
      </button>

      <div>
        <button
          @click="openModal('#modal-selecionar-componentes')"
          class="btn p-1"
          title="Selecionar campos"
          >
          <span class="material-icons">filter_list</span>
        </button>
      </div>
    </div>

    <b-table
      :fields="visibleFields"
      :items="filteredItems"
      :busy="busy"
      :hover="true"
      tbody-tr-class="row-class"
    >
      <div slot="table-busy" class="text-center text-blue my-2">
        <b-spinner class="align-middle"></b-spinner>
        <strong>Carregando...</strong>
      </div>
      <template v-slot:cell(tipo)="data">
        {{data.item.componente}}
      </template>
      <template v-slot:cell(formatoAberto)="data">
        {{data.item.formatoAberto}}
      </template>
      <template v-slot:cell(formatoFechado)="data">
        {{data.item.formatoFechado}}
      </template>
      <template v-slot:cell(numeroPaginas)="data">
        {{data.item.numPagina}}
      </template>
      <template v-slot:cell(papelGramatura)="data">
        {{data.item.papel}}
      </template>
      <template v-slot:cell(cores)="data">
        {{data.item.cores}}
      </template>
      <template v-slot:cell(acabamento)="data">
        {{data.item.acabamento}}
      </template>
      <template v-slot:cell(observacao)="data">
        {{data.item.observacao}}
      </template>
      <template v-slot:cell(espessura)="data">
        {{data.item.espessura}}
      </template>
      <template v-slot:cell(peso)="data">
        {{data.item.peso}}
      </template>
      <template v-slot:cell(orientacao)="data">
        {{data.item.orientacao}}
      </template>
      <template v-slot:cell(alvura)="data">
        {{data.item.alvura}}
      </template>
      <template v-slot:cell(opacidade)="data">
        {{data.item.opacidade}}
      </template>
      <template v-slot:cell(lombada)="data">
        {{data.item.lombada}}
      </template>
      <template v-slot:cell(medidasLombada)="data">
        {{data.item.medidasLombada}}
      </template>
      <template v-slot:cell(actions)="data" v-if="">
        <a href data-toggle="modal">
          <span
            title="Visualizar"
            class="material-icons"
            @click="openModal('#modal-visualizar-especificacao', data.item.idEspecificacao)"
          >remove_red_eye</span>
        </a>
        <a href data-toggle="modal">
          <span
            title="Editar"
            class="material-icons"
            @click="openModal('#modal-editar-componente', data.item.idEspecificacao)"
          >edit</span>
        </a>
        <button type="button" title="Deletar" class="button-invisible" data-toggle="tooltip" @click="DeleteEspecificacao(data.item.idEspecificacao)">
          <span class="material-icons">delete</span>
        </button>
        <a href title="Exportar" data-toggle="tooltip">
          <span class="material-icons">picture_as_pdf</span>
        </a>
        <a href="#" title="Histórico" data-toggle="modal" data-target="#modal-listar-alteracoes">
          <span class="material-icons">history</span>
        </a>
      </template>
    </b-table>
    <modal-selecionar-componentes :fields="hideableFields" @updateFields="updateFields"></modal-selecionar-componentes>
    <modal-adicionar-componente></modal-adicionar-componente>
    <modal-editar-componente v-model="especificacao_modal"></modal-editar-componente>
    <modal-visualizar-especificacao v-model="especificacao_modal"></modal-visualizar-especificacao>
  </div>
</template>

<script>
import Vue from "vue";
import ModalSelecionarComponentes from "@/js/modals/SelecionarComponentes";
import ModalAdicionarComponente from "@/js/modals/AdicionarComponente";
import ModalEditarComponente from "@/js/modals/EditarComponente";
import ModalVisualizarEspecificacao from "@/js/modals/VisualizarEspecificacao";
import BootstrapVue, { BPagination, BTable } from "bootstrap-vue";
import axios from "axios";
import $ from "jquery";

Vue.use(BootstrapVue);

export default {
  components: {
    BPagination,
    BTable,
    ModalSelecionarComponentes,
    ModalAdicionarComponente,
    ModalEditarComponente,
    ModalVisualizarEspecificacao
  },
  props: ["filterBy"],
  data() {
    return {
      busy: false,
      currentPage: 1,
      perPage: 20,
      fields: [
        {
          key: "tipo",
          label: "Tipo",
          sortable: true,
          class: "text-center",
          visible: true,
          hideable: true
        },
        {
          key: "formatoAberto",
          label: "Formato aberto (mm)",
          sortable: true,
          class: "text-center",
          visible: false,
          hideable: true
        },
        {
          key: "formatoFechado",
          label: "Formato fechado (mm)",
          sortable: true,
          class: "text-center",
          visible: false,
          hideable: true
        },
        {
          key: "numeroPaginas",
          label: "Número de páginas",
          sortable: true,
          class: "text-center",
          visible: true,
          hideable: true
        },
        {
          key: "papelGramatura",
          label: "Papel/Gramatura",
          sortable: true,
          class: "text-center",
          visible: true,
          hideable: true
        },
        {
          key: "cores",
          label: "Cores",
          sortable: true,
          class: "text-center",
          visible: true,
          hideable: true
        },
        {
          key: "acabamento",
          label: "Acabamento",
          sortable: true,
          class: "text-center",
          visible: true,
          hideable: true
        },
        {
          key: "observacao",
          label: "Observação",
          sortable: true,
          class: "text-center",
          visible: false,
          hideable: true
        },
        {
          key: "espessura",
          label: "Espessura",
          sortable: true,
          class: "text-center",
          visible: true,
          hideable: true
        },
        {
          key: "peso",
          label: "Peso (g)",
          sortable: true,
          class: "text-center",
          visible: true,
          hideable: true
        },
        {
          key: "orientacao",
          label: "Orientação",
          sortable: true,
          class: "text-center",
          visible: true,
          hideable: true
        },
        {
          key: "alvura",
          label: "Alvura (%)",
          sortable: true,
          class: "text-center",
          visible: true,
          hideable: true
        },
        {
          key: "opacidade",
          label: "Opacidade",
          sortable: true,
          class: "text-center",
          visible: false,
          hideable: true
        },
        {
          key: "lombada",
          label: "Lombada",
          sortable: true,
          class: "text-center",
          visible: false,
          hideable: true
        },
        {
          key: "medidasLombada",
          label: "Medidas da lombada (mm)",
          sortable: true,
          class: "text-center",
          visible: false,
          hideable: true
        },
        {
          key: "actions",
          label: "Ações",
          class: "text-center",
          visible: true,
          hideable: false
        }
      ],
      items: [
        {
          idProduto: '',
        },
      ],
      especificacao_modal: '',
    };
  },
  computed: {
    visibleFields() {
      return this.fields.filter(field => field.visible);
    },
    hideableFields() {
      return this.fields.filter(field => field.hideable);
    },
    filteredItems() {
      if (this.filterBy === 0) return this.items;
      return this.items.filter(item => item.idTipoEspecificacao === this.filterBy);
    }
  },
  methods: {
    openModal(modalId, id) {
      this.especificacao_modal = id;
      $(modalId).modal();
    },
    updateFields(selectedFields) {
      this.fields.forEach(field => {
        field.visible = selectedFields.includes(field.key);
      });
    },
    getEspecificacoes(id){
      axios
      .get('/listar-especificacoes/' + id)
      .then(response => (this.items = response.data))
    },
    DeleteEspecificacao(id) {
      if(confirm('Deletar?')){
        axios
        .get('/deletar-especificacao/' + id)
        .then(response => {
          var responseLog = document.getElementById('response');
          var responseMsg = response.data.msg;
          responseLog.innerHTML = responseMsg;
        })
      }
      setTimeout(() => this.getEspecificacoes(this.$route.params.id), 100);
    }
  },
  mounted(){
    this.getEspecificacoes(this.$route.params.id);
  }
};
</script>

<style>
</style>
