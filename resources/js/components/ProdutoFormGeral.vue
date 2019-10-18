<template>
  <div class="d-flex" style="flex-flow: column">
    <h6>
      <b>Dados gerais</b>
    </h6>
    <form class="mr-3" style="flex: 1" method="POST" @submit.prevent="submit">
      <div class="form-row">
        <v-input vmodel="form.titulo">Título</v-input>
        <v-input vmodel="form.titulo-obra">Título da obra</v-input>
      </div>
      <div class="form-row">
        <v-select :options="[ 2019, 2018, 2017 ]" vmodel="form.ano-uso">Geração de uso (ano)</v-select>
        <v-select :options="[ 2019, 2018, 2017 ]" vmodel="form.ano-lancamento">Ano de lançamento</v-select>
        <v-select :options="[ 2019, 2018, 2017 ]" vmodel="form.ano-ciclo">Ciclo de vida (até)</v-select>
      </div>
      <div class="form-row">
        <v-select :options="[ 1, 2 ]" vmodel="form.area-conhec">Área de conhecimento</v-select>
        <v-select :options="[ 1, 2 ]" vmodel="form.nivel-ensino">Nível de ensino</v-select>
        <v-select :options="[ 1, 2]" vmodel="form.serie">Ano escolar/ Série</v-select>
      </div>
      <div class="form-row">
        <v-select :options="[ 1, 2, 3, 4 ]" vmodel="form.volume">Volume</v-select>
        <v-input vmodel="form.num-edicao">Número da edição</v-input>
        <v-select :options="[ 'Brasil', 'Japão' ]" vmodel="form.origem">Origem</v-select>
        <v-select :options="[ 'PT-Br' ]" vmodel="form.idiomas">Idioma</v-select>
      </div>
      <div class="form-row">
        <v-input vmodel="form.peg-la">PEG (LA)</v-input>
        <v-input vmodel="form.peg-lp">PEG (LP)</v-input>
        <v-input vmodel="form.isbn-la">ISBN (LA)</v-input>
        <v-input vmodel="form.isbn-lp">ISBN (LP)</v-input>
      </div>
      <h6>
        <b>Autoria</b>
      </h6>
      <div class="form-row">
        <v-input vmodel="form.nome-contrato">Nome para contrato</v-input>
      </div>
      <div class="form-row">
        <v-input vmodel="form.nome-capa">Nome para capa</v-input>
        <v-input vmodel="form.pseudonomio">Pseudônimo</v-input>
      </div>
      <div class="form-row">
        <v-input vmodel="form.nome-contrato">Nome do contrato</v-input>
        <v-input vmodel="form.data-assinatura">Data de assinatura</v-input>
        <v-input vmodel="form.validade-contrato">Validade do contrato</v-input>
      </div>
      <div>
        <label>Imagens</label>
        <div class="form-row">
          <filepicker accept="'image/png, image/jpeg'" vmodel="form.produto-img">Adicionar imagem</filepicker>
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
      form: {},
      errors: {},
    }
  },
  methods: {
    submit() {
      this.errors = {};
      axios.post('/cadastrar-produto', this.form).then(response => {
        alert('Message sent!');
        console.log(response);
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    },
  }
}
</script>

<style>
</style>
