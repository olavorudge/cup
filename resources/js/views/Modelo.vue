<template>
  <form>

    <div class="form-row">
      <v-input :value="items.nomeModelo">Nome do Modelo</v-input>
    </div>
    <div class="form-row">
      <v-select :options="['Para todos', 'Somente eu']">Compartilhamento</v-select>
    </div>

    <p>Selecionar campos</p>
    <div class="form-row">
      <checkbox id="titulo">Título</checkbox>
      <checkbox id="tituloObra">Título da obra</checkbox>
      <checkbox id="geracaoUso">Geração de uso (Ano)</checkbox>
      <checkbox id="anoLancamento">Ano de lançamento</checkbox>
    </div>
    <div class="form-row">
      <checkbox id="cicloVida">Ciclo de vida (até)</checkbox>
      <checkbox id="areaConhecimento">Área de conhecimento</checkbox>
      <checkbox id="nivelEnsino">Nível de ensino</checkbox>
      <checkbox id="anoEscolar">Ano escolar/Série</checkbox>
    </div>
    <div class="form-row">
      <checkbox id="volume">Volume</checkbox>
      <checkbox id="numeroEdicao">Número da edição</checkbox>
      <checkbox id="origem">Origem</checkbox>
      <checkbox id="idioma">Idioma</checkbox>
    </div>
    <div class="form-row">
      <checkbox id="pegLa">PEG (LA)</checkbox>
      <checkbox id="pegLp">PEG (LP)</checkbox>
      <checkbox id="isbnLa">ISBN (LA)</checkbox>
      <checkbox id="isbnLp">ISBN (LP)</checkbox>
    </div>
    <div class="form-row">
      <checkbox id="nomeContrato">Nome para contrato</checkbox>
      <checkbox id="nomeCapa">Nome para capa</checkbox>
      <checkbox id="pseudonimo">Pseudônimo</checkbox>
      <checkbox id="numeroContrato">Número do contrato</checkbox>
    </div>
    <div class="form-row">
      <checkbox class="col-3" id="dataAssinatura">Data de assinatura</checkbox>
      <checkbox class="col-3" id="validadeContrato">Validade do contrato</checkbox>
    </div>

    <div class="mt-3 text-right">
      <button class="btn btn-primary btn-salvar-produto">Salvar</button>
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
        items: [
          {}
        ]
      };
    },
    computed: {

      },
      methods: {
        editModelo(){
          axios
          .get('/listar-modelo/'+ this.$route.params.id)
          .then(response => (this.items = response.data))
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
