<template>
  <div>
    <div
      v-for="(productLine, index) in productLines"
      :key="productLine.id"
      class="card product-line-card"
    >
      <template v-if="productLine.childs.length == 0">
        <router-link
          :to="{ name: 'itens', params: { id: productLine.id } }"
          class="card-header list-group-item-action"
        >{{ productLine.nome }}</router-link>
      </template>
      <template v-else>
        <div class="card-header" data-toggle="collapse" :data-target="'#card-items-' + index">
          {{ productLine.nome }}
          <span data-toggle="tooltip" class="material-icons">chevron_right</span>
        </div>
        <div class="list-group list-group-flush collapse" :id="'card-items-' + index">
          <router-link
            v-for="child in productLine.childs"
            :key="child.id"
            :to="{ name: 'itens', params: { id: child.id } }"
            class="list-group-item list-group-item-action"
          >{{ child.nome }}</router-link>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      productLines: [
        {
          id: 1,
          nome: "ABR - Aprende Brasil",
          childs: [
            {
              id: 2,
              nome: "ABR.EF - Ensino Fundamental"
            },
            {
              id: 3,
              nome: "ABR.EI - Ensino Infantil"
            },
            {
              id: 4,
              nome: "ABR.EM - Ensino Médio"
            }
          ]
        },
        {
          id: 5,
          nome: "DIC - Dicionário",
          childs: []
        }
      ]
    };
  }
};
</script>

<style>
</style>