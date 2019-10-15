<template>
  <div>
    <ul class="nav nav-pills nav-fill" role="tablist">
      <li class="nav-item" @click="() => filterComponentsBy = 0">
        <a
          class="nav-link active"
          id="livro-todos-tab"
          data-toggle="tab"
          href="#livro-todos"
          role="tab"
          aria-controls="livro-todos"
          aria-selected="true"
        >Livros e Suplementos</a>
      </li>
      <li class="nav-item" @click="() => filterComponentsBy = 1">
        <a
          class="nav-link"
          id="livro-aluno-tab"
          data-toggle="tab"
          href="#livro-aluno"
          role="tab"
          aria-controls="livro-aluno"
          aria-selected="true"
        >Livro do aluno</a>
      </li>
      <li class="nav-item" @click="() => filterComponentsBy = 2">
        <a
          class="nav-link"
          id="livro-professor-tab"
          data-toggle="tab"
          href="#livro-professor"
          role="tab"
          aria-controls="livro-professor"
          aria-selected="false"
        >Livro do professor</a>
      </li>
      <li class="nav-item" @click="() => filterComponentsBy = 3">
        <a
          class="nav-link"
          id="suplementos-tab"
          data-toggle="tab"
          href="#suplementos"
          role="tab"
          aria-controls="suplementos"
          aria-selected="false"
        >Suplementos</a>
      </li>
    </ul>

    <div class="tab-content">
      <!-- <div
        class="tab-pane fade show active"
        id="livro-todos"
        role="tabpanel"
        aria-labelledby="livro-todos-tab"
      >
      </div>
      <div class="tab-pane fade" id="livro-aluno" role="tabpanel" aria-labelledby="livro-aluno-tab">
      </div>
      <div
        class="tab-pane fade"
        id="livro-professor"
        role="tabpanel"
        aria-labelledby="livro-professor-tab"
      >
      </div>
      <div class="tab-pane fade" id="suplementos" role="tabpanel" aria-labelledby="suplementos-tab">
      </div> -->
    </div>

    <tabela-componentes :filter-by="filterComponentsBy"></tabela-componentes>
  </div>
</template>

<script>
import TabelaComponentes from "@/js/components/TabelaComponentes";

export default {
  components: { TabelaComponentes },
  data() {
    return {
      filterComponentsBy: 0
    };
  }
};
</script>

<style>
</style>