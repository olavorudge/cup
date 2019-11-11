<template>
  <nav id="sidebar" class="sidebar">
  <div class="sidebar-content">
    <a class="sidebar-brand" href="/">
      <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="feather feather-box align-middle">
      <path
      d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
    </path>
    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
    <line x1="12" y1="22.08" x2="12" y2="12"></line>
  </svg>-->
  <span class="align-middle">Cadastro Único de Produtos</span>
</a>

<ul class="sidebar-nav">
  <sidebar-items-collection nome="Consultar" :rotas="rotas.itens" sidebar-id="produtos"></sidebar-items-collection>

  <sidebar-items-collection nome="Pendências" :rotas="rotas.pendencias" sidebar-id="pendencias"></sidebar-items-collection>

  <sidebar-item link="/usuarios" nome="Usuários"></sidebar-item>

  <sidebar-item link="/modelos" nome="Modelos"></sidebar-item>
</ul>
</div>
</nav>
</template>

<script>
import SidebarItem from "@/js/components/SidebarItem";
import SidebarItemsCollection from "@/js/components/SidebarItemsCollection";

export default {
  components: { SidebarItem, SidebarItemsCollection },
  data() {
    return {
      rotas: {
        itens: [
          { id: 1, nome: 'Todos', link: '/itens' },
          { id: 2, nome: 'Produtos', link: '/itens/produtos' },
          { id: 3, nome: 'Estruturas', link: '/itens/estruturas' }
        ],
        pendencias: [
          { id: 1, nome: 'Todas', link: '/pendencias' },
          { id: 2, nome: 'Cadastro geral', link: '/pendencias/gerais' },
          { id: 3, nome: 'Especificações técnicas', link: '/pendencias/especificacoes' }
        ]
      }
    }
  }
};
</script>

<style>
</style>
