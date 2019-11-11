<template>
  <div class id="app">
    <navbar></navbar>
    <sidebar></sidebar>

    <div class="main">
      <!-- @include('partials.header') -->

      <main class="content container-fluid">
        <h4 class="content-title">{{ title }}</h4>
        <router-view :key="$route.path"></router-view>
      </main>

      <!-- @include('partials.footer') -->
    </div>
  </div>
</template>

<script>
import Sidebar from "@/js/components/Sidebar";
import Navbar from "@/js/components/Navbar";

export default {
  components: { Sidebar, Navbar },
  data() {
    return {
      title: this.$route.meta.title
    };
  },
  watch: {
    $route(newValue) {
      this.title = newValue.meta.title
    }
  }
};
</script>

<style>
</style>
