<template>
  <div
  class="modal fade"
  :id="id"
  tabindex="-1"
  role="dialog"
  :aria-labelledby="id"
  aria-hidden="true"
  >
  <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Visualizar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-section">
          <div class="card product-line-card">
            <div class="card-header visualizar-produto-card" data-toggle="collapse" :data-target="'#card-items-0'">
              <p>Dados Gerais</p>
              <span data-toggle="tooltip" class="material-icons">chevron_right</span>
            </div>
          </div>
          <div class="collapse card-inside" :id="'card-items-0'">
            <div class="row">
              <div class="col-md-6">
                <p>Título: <b>{{form.dadosGerais.titulo}}</b></p>
                <p>Geração de uso(ano): {{form.dadosGerais.ano_uso}}</p>
                <p>Ano de lançamento: {{form.dadosGerais.ano_lancamento}}</p>
                <p>Área de conhecimento: {{form.dadosGerais.area_conhec}}</p>
                <p>Volume: {{form.dadosGerais.volume}}</p>
                <p>Número da edição: {{form.dadosGerais.num_edicao}}</p>
                <p>PEG (LA): {{form.dadosGerais.peg_la}}</p>
                <p>ISBN (LA): {{form.dadosGerais.isbn_la}}</p>
              </div>
              <div class="col-md-6">
                <p>Título da obra: {{form.dadosGerais.titulo_obra}}</p>
                <p>Ciclo e vida (até): {{form.dadosGerais.ano_ciclo}}</p>
                <p>Nível de Ensino: {{form.dadosGerais.nivel_ensino}}</p>
                <p>Ano Escolar/Série: {{form.dadosGerais.ano_ciclo}}</p>
                <p>Origem: {{form.dadosGerais.origem}}</p>
                <p>Idioma: {{form.dadosGerais.idioma}}</p>
                <p>PEG (LP): {{form.dadosGerais.peg_lp}}</p>
                <p>ISBN (LP): {{form.dadosGerais.isbn_lp}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-section">
          <div class="card product-line-card">
            <div class="card-header visualizar-produto-card" data-toggle="collapse" :data-target="'#card-items-1'">
              <p>Autoria</p>
              <span data-toggle="tooltip" class="material-icons">chevron_right</span>
            </div>
          </div>
          <div class="collapse card-inside" :id="'card-items-1'">
            <div class="row">
              <div class="col-md-6">
                <p>Nome para Contrato: {{form.dadosGerais.nome_contrato}}</p>
                <p>Nome para Capa: {{form.dadosGerais.nome_capa}}</p>
                <p>Data de assinatura: {{form.dadosGerais.data_assinatura}}</p>
              </div>
              <div class="col-md-6">
                <p>Número do contrato: {{form.dadosGerais.titulo_obra}}</p>
                <p>Pseudônimo: {{form.dadosGerais.pseudonimo}}</p>
                <p>Validade do Contrato: {{form.dadosGerais.validade_contrato}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-section">
          <div class="card product-line-card">
            <div class="card-header visualizar-produto-card" data-toggle="collapse" :data-target="'#card-items-2'">
              <p>Especificações Técnicas</p>
              <span data-toggle="tooltip" class="material-icons">chevron_right</span>
            </div>
          </div>
          <div class="collapse card-inside" :id="'card-items-2'" >
          <div v-for="especificacao in form.especificacoes" class="">
              <div class="row">
                <div class="col-md-12">
                  <h5 v-if="especificacao.idTipoEspecificacao == 1">Livros e Suplementos</h5>
                  <h5 v-if="especificacao.idTipoEspecificacao == 2">Livro do Aluno</h5>
                  <h5 v-if="especificacao.idTipoEspecificacao == 3">Livro do Professor</h5>
                  <h5 v-if="especificacao.idTipoEspecificacao == 4">Suplementos</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p>Componente: {{especificacao.componente}}</p>
                  <p>Formato aberto: {{especificacao.formatoAberto}}</p>
                  <p>Formato fechado: {{especificacao.formatoFechado}}</p>
                  <p>Papel: {{especificacao.papel}}</p>
                  <p>Orientação: {{especificacao.orientacao}}</p>
                  <p>Alvura: {{especificacao.alvura}}</p>
                  <p>Lombada: {{especificacao.lombada}}</p>
                </div>
                <div class="col-md-6">
                  <p>Número de Páginas: {{especificacao.numPagina}}</p>
                  <p>Acabamento: {{especificacao.acabamento}}</p>
                  <p>Espessura: {{especificacao.espessura}}</p>
                  <p>Peso: {{especificacao.peso}}g</p>
                  <p>Opacidade: {{especificacao.opacidade}}</p>
                  <p>Medida Lombada: {{especificacao.medLombada}}</p>
                </div>
              </div>
              <hr>
          </div >
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>-->
  </div>
</div>
</div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      id: "modal-visualizar-produto",
      form: {
        dadosGerais: {
          titulo: '',
          titulo_obra: '',
          ano_uso: '',
          ano_lancamento: '',
          area_conhec: '',
          data_assinatura: '',
          idioma: '',
          isbn_la: '',
          isbn_lp: '',
          nivel_ensino: '',
          nome_capa: '',
          nome_contrato: '',
          num_contrato: '',
          num_edicao: '',
          origem: '',
          peg_la: '',
          peg_lp: '',
          pseudonimo: '',
          serie: '',
          volume: '',
          validade_contrato: '',

        },
        especificacoes:{
        }
      }
    };
  },
  methods: {
    getProduto(id){
      this.errors = {};
      axios
      .get('/listar-produto-geral/'+ id)
      .then(response => (this.form = response.data))
    }
  },
  mounted() {
    this.getProduto(1);
  }
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
