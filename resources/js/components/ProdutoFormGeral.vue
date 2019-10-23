<template>
  <div class="d-flex" style="flex-flow: column">
    <h6>
      <b>Dados gerais</b>
    </h6>
    <div class="row">
      <div class="col-md-12">
        <div id="response" class="p-6 mb-2 bg-light text-dark">
        </div>
      </div>
    </div>
    <form class="mr-3" id="form" style="flex: 1" method="POST" @submit.prevent="submit">
      <div class="row">
        <div class="col-md-12">
          <p v-if="errors.length">
            <b>Por favor, corrija o(s) seguinte(s) erro(s):</b>
            <ul class="bg-alert">
              <li v-for="error in errors">{{ error }}</li>
            </ul>
        </p>
      </div>
      </div>
      <div class="form-row">
        <v-input  v-model="form.titulo">Título</v-input>
        <v-input v-model="form.titulo_obra">Título da obra</v-input>
      </div>
      <div class="form-row">
        <v-select :options="[ 2019, 2018, 2017 ]" v-model="form.ano_uso">Geração de uso (ano)</v-select>
        <v-select :options="[ 2019, 2018, 2017 ]" v-model="form.ano_lancamento">Ano de lançamento</v-select>
        <v-select :options="[ 2019, 2018, 2017 ]" v-model="form.ano_ciclo">Ciclo de vida (até)</v-select>
      </div>
      <div class="form-row">
        <v-select :options="[ 1, 2 ]" v-model="form.area_conhec">Área de conhecimento</v-select>
        <v-select :options="[ 1, 2 ]" v-model="form.nivel_ensino">Nível de ensino</v-select>
        <v-select :options="[ 1, 2]" v-model="form.serie">Ano escolar/ Série</v-select>
      </div>
      <div class="form-row">
        <v-select :options="[ 1, 2, 3, 4 ]" v-model="form.volume">Volume</v-select>
        <v-input v-model="form.num_edicao">Número da edição</v-input>
        <v-select :options="[ 'Brasil', 'Japão' ]" v-model="form.origem">Origem</v-select>
        <v-select :options="[ 'PT-Br' ]" v-model="form.idioma">Idioma</v-select>
      </div>
      <div class="form-row">
        <v-input v-model="form.peg_la">PEG (LA)</v-input>
        <v-input v-model="form.peg_lp">PEG (LP)</v-input>
        <v-input v-model="form.isbn_la">ISBN (LA)</v-input>
        <v-input v-model="form.isbn_lp">ISBN (LP)</v-input>
      </div>
      <h6>
        <b>Autoria</b>
      </h6>
      <div class="form-row">
        <v-input v-model="form.nome_contrato">Nome para contrato</v-input>
      </div>
      <div class="form-row">
        <v-input v-model="form.nome_capa">Nome para capa</v-input>
        <v-input v-model="form.pseudonomio">Pseudônimo</v-input>
      </div>
      <div class="form-row">
        <v-input v-model="form.num_contrato">Número do contrato</v-input>
        <v-input v-model="form.data_assinatura">Data de assinatura</v-input>
        <v-input v-model="form.validade_contrato">Validade do contrato</v-input>
      </div>
      <div>
        <label>Imagens</label>
        <div class="form-row">
        </div>
        <div class="row">
          <div class="col-4">
            <img width="100%" src />
          </div>
          <div class="col-4">
            <img width="100%" src />
          </div>
          <div class="col-4">
            <img width="100%" src />
          </div>
        </div>
      </div>
      <div class="mt-3 text-right">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="" class="btn btn-secondary">Cancelar</button>
      </div>

    </form>
  </div>
</template>

<script>
import Filepicker from "@/js/components/Filepicker";
import VInput from "@/js/components/Input";
import VSelect from "@/js/components/Select";
import axios from "axios";

export default {
  components: { Filepicker, VInput, VSelect },
  data() {
    return {
      errors: {},
      form: {
        titulo: '',
        titulo_obra: '',
        ano_uso: '',
        ano_lancamento: '',
        ano_ciclo: '',
        area_conhec: '',
        nivel_ensino: '',
        serie: '',
        volume: '',
        num_edicao: '',
        origem: '',
        idioma: '',
        peg_la: '',
        peg_lp: '',
        isbn_la: '',
        isbn_lp: '',
        nome_contrato: '',
        nome_capa: '',
        pseudonomio: '',
        num_contrato: '',
        data_assinatura: '',
        validade_contrato: '',
      },
    }
  },
  methods: {
    submit() {
      this.errors = {};
      axios.post('/cadastrar-produto', {
        titulo: this.form.titulo,
        titulo_obra: this.form.titulo_obra,
        ano_uso: this.form.ano_uso,
        ano_lancamento: this.form.ano_lancamento,
        ano_ciclo: this.form.ano_ciclo,
        area_conhec: this.form.area_conhec,
        nivel_ensino: this.form.nivel_ensino,
        serie: this.form.serie,
        volume: this.form.volume,
        num_edicao: this.form.num_edicao,
        origem: this.form.origem,
        idioma: this.form.idioma,
        peg_la: this.form.peg_la,
        peg_lp: this.form.peg_lp,
        isbn_la: this.form.isbn_la,
        isbn_lp: this.form.isbn_lp,
        nome_contrato: this.form.nome_contrato,
        nome_capa: this.form.nome_capa,
        pseudonomio: this.form.pseudonomio,
        num_contrato: this.form.num_contrato,
        data_assinatura: this.form.data_assinatura,
        validade_contrato: this.form.validade_contrato,
      }).then(response => {
        var responseLog = document.getElementById('response');
        responseLog.innerHTML = response.data.msg;
      }).catch(error => {
        if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
            var responseLog = document.getElementById('response');
            var errorHandling = Object.values((JSON.parse(JSON.stringify(error.response.data.errors))));

            responseLog.innerHTML = errorHandling[0];
        }
      });
    },
  }
}
</script>

<style>
</style>
