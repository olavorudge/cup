<template>
  <form @submit.prevent="submitModelo">
    <div class="row">
      <div class="col-md-12">
        <div id="response" class="p-6 mb-2 bg-info text-dark">
        </div>
      </div>
    </div>
    <div class="form-row">
      <v-input v-model="form.nome_modelo">Nome do Modelo</v-input>
    </div>
    <div class="form-row">
      <v-select :options="[{value: 1, name:'Para todos'}, {value: 2, name:'Somente eu'}]" v-model="form.compartilhamento">Compartilhamento</v-select>
    </div>

    <p>Selecionar campos</p>
    <div class="form-row">
      <checkbox v-model="form.checkbox" id="titulo" :value="1">Título</checkbox>
      <checkbox v-model="form.checkbox" id="tituloObra" :value="2">Título da obra</checkbox>
      <checkbox v-model="form.checkbox" id="geracaoUso" :value="3">Geração de uso (Ano)</checkbox>
      <checkbox v-model="form.checkbox" id="anoLancamento" :value="4">Ano de lançamento</checkbox>
    </div>
    <div class="form-row">
      <checkbox v-model="form.checkbox" id="cicloVida" :value="5">Ciclo de vida (até)</checkbox>
      <checkbox v-model="form.checkbox" id="areaConhecimento" :value="6">Área de conhecimento</checkbox>
      <checkbox v-model="form.checkbox" id="nivelEnsino" :value="7">Nível de ensino</checkbox>
      <checkbox v-model="form.checkbox" id="anoEscolar" :value="8">Ano escolar/Série</checkbox>
    </div>
    <div class="form-row">
      <checkbox v-model="form.checkbox" id="volume" :value="9">Volume</checkbox>
      <checkbox v-model="form.checkbox" id="numeroEdicao" :value="10">Número da edição</checkbox>
      <checkbox v-model="form.checkbox" id="origem" :value="11">Origem</checkbox>
      <checkbox v-model="form.checkbox" id="idioma" :value="12">Idioma</checkbox>
    </div>
    <div class="form-row">
      <checkbox v-model="form.checkbox" id="pegLa" :value="13">PEG (LA)</checkbox>
      <checkbox v-model="form.checkbox" id="pegLp" :value="14">PEG (LP)</checkbox>
      <checkbox v-model="form.checkbox" id="isbnLa" :value="15">ISBN (LA)</checkbox>
      <checkbox v-model="form.checkbox" id="isbnLp" :value="16">ISBN (LP)</checkbox>
    </div>
    <div class="form-row">
      <checkbox v-model="form.checkbox" id="nomeContrato" :value="17">Nome para contrato</checkbox>
      <checkbox v-model="form.checkbox" id="nomeCapa" :value="18">Nome para capa</checkbox>
      <checkbox v-model="form.checkbox" id="pseudonimo" :value="19">Pseudônimo</checkbox>
      <checkbox v-model="form.checkbox" id="numeroContrato" :value="20">Número do contrato</checkbox>
    </div>
    <div class="form-row">
      <checkbox v-model="form.checkbox" class="col-3" id="dataAssinatura" :value="21">Data de assinatura</checkbox>
      <checkbox v-model="form.checkbox" class="col-3" id="validadeContrato" :value="22">Validade do contrato</checkbox>
    </div>
    {{form.checkbox}}
    <div class="mt-3 text-right">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <router-link to="/modelos" class="btn btn-secondary">Cancelar</router-link>
    </div>
  </form>
</template>

<script>
import Checkbox from "@/js/components/Checkbox";
import VInput from "@/js/components/Input";
import VSelect from "@/js/components/Select";
import axios from "axios";
import Router from "vue-router";


export default {
  components: { Checkbox, VInput, VSelect },
    data() {
      return {
        busy: false,
        items:
          {
          },
        form: {
          nome_modelo: '',
          compartilhamento: '',
          checkbox: [],
        }
      };
    },
    computed: {

      },
      methods: {
        editModelo(){
          axios
          .get('/listar-modelo/'+ this.$route.params.id)
          .then(response => (this.form = response.data))
        },
        submitModelo(){
          this.errors = {};

          axios.post('/cadastrar-modelo', {
            nome_modelo: this.form.nome_modelo,
            compartilhamento: this.form.compartilhamento,
            checkbox: this.form.checkbox
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
        }
      },
      mounted(){
        if(this.$route.params.id){
          this.editModelo();
        }
      }
  };

</script>

<style>
</style>
