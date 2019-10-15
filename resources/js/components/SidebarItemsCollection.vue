<template>
  <li class="sidebar-item">
    <a
      :href="hashSidebarId"
      data-toggle="collapse"
      class="sidebar-link collapsed"
      aria-expanded="false"
    >
      <!-- <i class="fas fa-chart-line"></i> -->
      <span class="align-middle">{{ nome }}</span>
    </a>
    <ul :id="sidebarId" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
      <sidebar-item
        v-for="rota in rotas"
        :key="rota.id"
        :link="rota.link"
        :nome="rota.nome"
      ></sidebar-item>
    </ul>
  </li>
</template>

<script>
import SidebarItem from "@/js/components/SidebarItem";
export default {
  components: { SidebarItem },
  props: ["rotas","nome","sidebarId"],
  computed: {
    //tem outro jeito de fazer isso?
    hashSidebarId() {
      return "#" + this.sidebarId
    }
  }
};
</script>

<style>
</style>