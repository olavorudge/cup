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
            <h5>Dados gerais</h5>
            <div class="row">
              <div class="col">
                <p>Título: Just For Kids</p>
                <p>Geração de uso (ano): 2019</p>
                <p>Ciclo de vida (até): 2022</p>
              </div>
              <div class="col">
                <p>Título da obra: Just For Kids - EF1 - Inglês 1º Ano</p>
                <p>Ano de lançamento: 2019</p>
              </div>
            </div>
          </div>

          <div class="modal-section">
            <h5>Autoria</h5>
            <div class="row">
              <div class="col">
                <p>Nome para contrato: sdfah sdfashfkjfs af</p>
                <p>Nome do contrato: sdfah sdfashfkjfs af</p>
              </div>
              <div class="col">
                <p>Nome para capa: sdfah sdfashfkjfs af</p>
              </div>
            </div>
          </div>

          <div class="modal-section">
            <h5>Especificações técnicas</h5>
            <h6>
              <b>Livro do aluno</b>
            </h6>
            <div class="row row-separator">
              <div class="col">
                <p>01) Componente: Capa</p>
                <p>03) Formato Aberto (mm): 550 x 205</p>
                <p>05) Orientação: Horizontal</p>
                <p>07) Peso (g):</p>
                <p>09) Opacidade:</p>
                <p>11) Lombada: Espiral</p>
                <p>13) Papel/Gramatura : Cartão Sólido 350g</p>
                <p>
                  15) Obervação : Troca de chapa 4 cores na frente (AL e PF) e no verso troca o preto. Com CD Peg PF: 2000.51885 e
                  Peg AL: 2000.51880, colado na 3ª capa.
                </p>
              </div>
              <div class="col">
                <p>02) Número de Paginas: 4</p>
                <p>04) Formato Fechado (mm): 275 x 205</p>
                <p>06) Espessura (mm):</p>
                <p>08) Alvura (%):</p>
                <p>10) Cores: 4x1 (preto)</p>
                <p>12) Medidas da lombada (mm):</p>
                <p>14) Acabamento : Plastificação Brilho</p>
              </div>
            </div>
            <div class="row row-separator">
              <div class="col">
                <p>01) Componente: Capa</p>
                <p>03) Formato Aberto (mm): 550 x 205</p>
                <p>05) Orientação: Horizontal</p>
                <p>07) Peso (g):</p>
                <p>09) Opacidade:</p>
                <p>11) Lombada: Espiral</p>
                <p>13) Papel/Gramatura : Cartão Sólido 350g</p>
                <p>
                  15) Obervação : Troca de chapa 4 cores na frente (AL e PF) e no verso troca o preto. Com CD Peg PF: 2000.51885 e
                  Peg AL: 2000.51880, colado na 3ª capa.
                </p>
              </div>
              <div class="col">
                <p>02) Número de Paginas: 4</p>
                <p>04) Formato Fechado (mm): 275 x 205</p>
                <p>06) Espessura (mm):</p>
                <p>08) Alvura (%):</p>
                <p>10) Cores: 4x1 (preto)</p>
                <p>12) Medidas da lombada (mm):</p>
                <p>14) Acabamento : Plastificação Brilho</p>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <p>01) Componente: Capa</p>
                <p>03) Formato Aberto (mm): 550 x 205</p>
                <p>05) Orientação: Horizontal</p>
                <p>07) Peso (g):</p>
                <p>09) Opacidade:</p>
                <p>11) Lombada: Espiral</p>
                <p>13) Papel/Gramatura : Cartão Sólido 350g</p>
                <p>
                  15) Obervação : Troca de chapa 4 cores na frente (AL e PF) e no verso troca o preto. Com CD Peg PF: 2000.51885 e
                  Peg AL: 2000.51880, colado na 3ª capa.
                </p>
              </div>
              <div class="col">
                <p>02) Número de Paginas: 4</p>
                <p>04) Formato Fechado (mm): 275 x 205</p>
                <p>06) Espessura (mm):</p>
                <p>08) Alvura (%):</p>
                <p>10) Cores: 4x1 (preto)</p>
                <p>12) Medidas da lombada (mm):</p>
                <p>14) Acabamento : Plastificação Brilho</p>
              </div>
            </div>
            <div class="modal-row">
              <h6>
                <b>Livro do professor</b>
              </h6>
              <div class="row">
                <div class="col">
                  <p>01) Componente: Capa</p>
                  <p>03) Formato Aberto (mm): 550 x 205</p>
                  <p>05) Orientação: Horizontal</p>
                  <p>07) Peso (g):</p>
                  <p>09) Opacidade:</p>
                  <p>11) Lombada: Espiral</p>
                  <p>13) Papel/Gramatura : Cartão Sólido 350g</p>
                  <p>
                    15) Obervação : Troca de chapa 4 cores na frente (AL e PF) e no verso troca o preto. Com CD Peg PF: 2000.51885 e
                    Peg AL: 2000.51880, colado na 3ª capa.
                  </p>
                </div>
              </div>
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
export default {
  data() {
    return {
      id: "modal-visualizar-produto"
    };
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