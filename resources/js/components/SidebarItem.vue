<template>
    <li class="sidebar-item">
        <router-link class="sidebar-link" :to="link">{{ nome }}</router-link>
    </li>        
</template>

<script>
export default {
    props: ["link", "nome"]
}
</script>

<style>

</style>