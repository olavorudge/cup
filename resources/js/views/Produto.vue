<template>
  <div class="tab">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a
          class="nav-link active"
          id="home-tab"
          data-toggle="tab"
          href="#home"
          role="tab"
          aria-controls="home"
          aria-selected="true"
        >Cadastro geral e autoria</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link nav-disab"
          id="especificacoes-tab"
          data-toggle="tab"
          href="#especificacoes"
          role="tab"
          aria-controls="especificacoes"
          aria-selected="false"
        >Especificações técnicas</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link nav-disab"
          id="contact-tab"
          data-toggle="tab"
          href="#contact"
          role="tab"
          aria-controls="contact"
          aria-selected="false"
        >Estrutura</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link nav-disab"
          id="observacoes-tab"
          data-toggle="tab"
          href="#observacoes"
          role="tab"
          aria-controls="observacoes"
          aria-selected="false"
        >Observações</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <produto-form-geral></produto-form-geral>
      </div>
      <div
        class="tab-pane fade nav-inner"
        id="especificacoes"
        role="tabpanel"
        aria-labelledby="especificacoes-tab"
      >
        <produto-form-especificacoes></produto-form-especificacoes>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <produto-form-estrutura></produto-form-estrutura>
      </div>
      <div class="tab-pane fade" id="observacoes" role="tabpanel" aria-labelledby="observacoes-tab">
        <produto-form-observacoes></produto-form-observacoes>
      </div>
    </div>
    <div
      style="background-color: #ddd; padding: 10px;"
    >Criado em: 01/10/2019. Atualizado em: 02/10/2019. Atualizado por: Alexandre Grocholski.</div>
  </div>
  <!-- @include( 'modals.adicionar-descricao' ) -->
</template>

<script>
import ProdutoFormGeral from "@/js/components/ProdutoFormGeral";
import ProdutoFormEspecificacoes from "@/js/components/ProdutoFormEspecificacoes";
import ProdutoFormEstrutura from "@/js/components/ProdutoFormEstrutura";
import ProdutoFormObservacoes from "@/js/components/ProdutoFormObservacoes";

export default {
  components: {
    ProdutoFormGeral,
    ProdutoFormEspecificacoes,
    ProdutoFormEstrutura,
    ProdutoFormObservacoes
  },
  mounted() {
    if(!this.$route.params.id){
      var navLink = document.getElementsByClassName('nav-disab');
      for(var i=0; i < navLink.length; i++) {
        navLink[i].classList.add("disabled");
      }
    }
  }
};
</script>

<style>
</style>
