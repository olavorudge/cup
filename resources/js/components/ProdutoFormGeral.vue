<template>
  <div class="d-flex" style="flex-flow: column">
    <h6>
      <b>Dados gerais</b>
    </h6>
    <form class="mr-3" style="flex: 1" method="POST">
      <div class="form-row">
        <v-input>Título</v-input>
        <v-input>Título da obra</v-input>
      </div>
      <div class="form-row">
        <v-select :options="[ 2019, 2018, 2017 ]">Geração de uso (ano)</v-select>
        <v-select :options="[ 2019, 2018, 2017 ]">Ano de lançamento</v-select>
        <v-select :options="[ 2019, 2018, 2017 ]">Ciclo de vida (até)</v-select>
      </div>
      <div class="form-row">
        <v-select :options="[ 'Ciências', 'Português' ]">Área de conhecimento</v-select>
        <v-select :options="[ 'Fundamental 1', 'Médio' ]">Nível de ensino</v-select>
        <v-select :options="[ '1 ano', '2 ano' ]">Ano escolar/ Série</v-select>
      </div>
      <div class="form-row">
        <v-select :options="[ 1, 2, 3, 4 ]">Volume</v-select>
        <v-input>Número da edição</v-input>
        <v-select :options="[ 'Brasil', 'Japão' ]">Origem</v-select>
        <v-select :options="[ 'PT-Br' ]">Idioma</v-select>
      </div>
      <div class="form-row">
        <v-input>PEG (LA)</v-input>
        <v-input>PEG (LP)</v-input>
        <v-input>ISBN (LA)</v-input>
        <v-input>ISBN (LP)</v-input>
      </div>
      <h6>
        <b>Autoria</b>
      </h6>
      <div class="form-row">
        <v-input>Nome para contrato</v-input>
      </div>
      <div class="form-row">
        <v-input>Nome para capa</v-input>
        <v-input>Pseudônimo</v-input>
      </div>
      <div class="form-row">
        <v-input>Nome do contrato</v-input>
        <v-input>Data de assinatura</v-input>
        <v-input>Validade do contrato</v-input>
      </div>
    </form>
    <div>
      <label>Imagens</label>
      <div class="form-row">
        <filepicker accept="'image/png, image/jpeg'">Adicionar imagem</filepicker>
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
      <button class="btn btn-primary btn-salvar-produto">Salvar</button>
      <button class="btn btn-secondary">Cancelar</button>
    </div>
  </div>
</template>

<script>
import Filepicker from "@/js/components/Filepicker";
import VInput from "@/js/components/Input";
import VSelect from "@/js/components/Select";

export default {
  components: { Filepicker, VInput, VSelect }
};
</script>

<style>
</style>