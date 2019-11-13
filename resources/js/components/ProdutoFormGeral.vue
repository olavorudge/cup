<template>
  <div class="d-flex" style="flex-flow: column">
    <h6>
      <small><b style="color: #f00;">*</b> Campos obrigatórios.</small><br>
      <small><b style="color: #f00;">**</b> Só é possível cadastrar especificações após o cadastro dos dados gerais do produto.</small>
    </h6>
    <div class="row">
      <div class="col-md-12">
        <div class="response p-6 mb-2 bg-info text-dark">
          <span class="material-icons">done</span>
          <span id="response"></span>
        </div>
      </div>
    </div>
    <form class="mr-3" id="form" style="flex: 1; margin-top:15px" method="POST" @submit.prevent="submit" enctype="multipart/form-data" >
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
        <v-input  v-model="form.titulo">Título*</v-input>
        <v-input v-model="form.titulo_obra">Título da obra*</v-input>
      </div>
      <div class="form-row">
        <v-select :options="[{value:2019, name:2019}, {value:2018, name:2018}, {value:2017, name:2017}]" v-model="form.ano_uso">Geração de uso (ano)*</v-select>
        <v-select :options="[{value:2019, name:2019}, {value:2018, name:2018}, {value:2017, name:2017}]" v-model="form.ano_lancamento">Ano de lançamento*</v-select>
        <v-select :options="[{value:2019, name:2019}, {value:2018, name:2018}, {value:2017, name:2017}]" v-model="form.ano_ciclo">Ciclo de vida (até)*</v-select>
      </div>
      <div class="form-row">
        <v-select :options="areaconhecimento" v-model="form.area_conhec">Área de conhecimento</v-select>
        <v-select :options="nivelensino" v-model="form.nivel_ensino">Nível de ensino</v-select>
        <v-select :options="anoescolar" v-model="form.serie">Ano escolar/Série</v-select>
      </div>
      <div class="form-row">
        <v-select :options="[{value:1, name:1}, {value:2, name:2}, {value:3, name:3}, {value:4, name:4}]" v-model="form.volume">Volume</v-select>
        <v-input v-model="form.num_edicao">Número da edição*</v-input>
        <v-select :options="[{value:'1', name:'Brasil'}, {value:'2', name:'Japão'}]" v-model="form.origem">Origem*</v-select>
        <v-select :options="[ {value:'pt-br', name:'Português-BR'}, {value:'en-usa', name:'Inglês-EUA'} ]" v-model="form.idioma">Idioma*</v-select>
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
        <v-input v-model="form.pseudonimo">Pseudônimo</v-input>
      </div>
      <div class="form-row">
        <v-input v-model="form.num_contrato">Número do contrato</v-input>
        <v-datepicker v-model="form.data_assinatura">Data de assinatura</v-datepicker>
        <v-datepicker v-model="form.validade_contrato">Validade do contrato</v-datepicker>
      </div>
      <div>
        <label>Imagens</label>
        <div class="form-row">
          <img :src="image" class="img-thumbnail" width="100px" height="auto">
          <filepicker accept="'image/png, image/jpeg'" v-model="form.produto_imgs" v-on:input.native="onFileChange">Adicionar Imagem</filepicker>
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
    <modal-success v-model="produto_id" @close="doSomethingOnHidden"></modal-success>
  </div>
</template>

<script>
import Filepicker from "@/js/components/Filepicker";
import VInput from "@/js/components/Input";
import VSelect from "@/js/components/Select";
import ModalSuccess from "@/js/modals/Success";
import VDatepicker from "@/js/components/Datepicker";
import axios from "axios";
import $ from "jquery";

export default {
  components: { Filepicker, VInput, VSelect, VDatepicker, ModalSuccess},
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
        pseudonimo: '',
        num_contrato: '',
        data_assinatura: '',
        validade_contrato: '',
      },
      image: '',
      areaconhecimento:  {},
      nivelensino:  {},
      anoescolar:  {},
      produto_id: '',
    }
  },
  methods: {
    submit() {
      this.errors = {};
      if(this.$route.params.id){
        axios.post('/editar-produto', {
          idProduto: this.$route.params.id,
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
          pseudonimo: this.form.pseudonimo,
          num_contrato: this.form.num_contrato,
          data_assinatura: this.form.data_assinatura,
          validade_contrato: this.form.validade_contrato,
          image: this.image,
        }).then(response => {
          var responseLog = document.getElementById('response');
          responseLog.innerHTML = response.data.msg;
          document.getElementsByClassName('response')[0].style.display = "block";
        }).catch(error => {
          if (error.response.status === 422) {
            var errorHandling = Object.values((JSON.parse(JSON.stringify(error.response.data.errors))));
            this.errors = errorHandling[0] || {};
          }
        });
      } else{
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
          pseudonimo: this.form.pseudonimo,
          num_contrato: this.form.num_contrato,
          data_assinatura: this.form.data_assinatura,
          validade_contrato: this.form.validade_contrato,
          image: this.image,
        }).then(response => {
            this.produto_id = response.data.id;
            $('#modal-success').modal();

        }).catch(error => {
          if (error.response.status === 422) {
            var errorHandling = Object.values((JSON.parse(JSON.stringify(error.response.data.errors))));
            this.errors = errorHandling[0] || {};
          }
        });
      }
    },
    onFileChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length)
      return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    getAreaConhecimento(){
      axios
      .get('/listar-areaconhecimento')
      .then(response => (this.areaconhecimento = response.data))
    },
    getNivelEnsino(){
      axios
      .get('/listar-nivelensino')
      .then(response => (this.nivelensino = response.data))
    },
    getAnoEscolar(){
      axios
      .get('/listar-anoescolar')
      .then(response => (this.anoescolar = response.data))
    },
    editProduto(id){
      this.errors = {};
      axios
      .get('/listar-produto/'+ id)
      .then(response => (this.form = response.data))
    }
  },
  mounted() {
    this.getAreaConhecimento();
    this.getNivelEnsino();
    this.getAnoEscolar();
    if(this.$route.params.id){
      this.editProduto(this.$route.params.id);
    }

  }
}
</script>

<style>
</style>
