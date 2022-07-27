<template>

  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-warning" href="#">MyTODO</a>
    </div>
  </nav>

  <router-view />

</template>

<script>
import AddTODO from '@/components/AddTODO.vue'
import DataTOTO from '@/components/DataTODO.vue'
export default {
  mounted() {
  },

  components: [
    AddTODO, DataTOTO
  ],

}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
