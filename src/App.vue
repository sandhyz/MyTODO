<template>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-warning" href="/">MyTODO</a>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <router-link class="nav-link text-white" to="/">To Do</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link text-white" to="/detail">Detail</router-link>
        </li>
      </ul>
    </div>
  </nav>

  <!-- mengirim data ke route -->
  <router-view :tdls="tdls" />

</template>
<script>
//import axios untuk get data
import axios from 'axios';

export default {
  // menyimpan json ke data tdls yang nantinya dikirim ke component lain
  data: function () {
    return {
      tdls: []
    }
  },

  // mengambil data TDL dari database
  methods: {
    getTDL() {
      axios.get('http://127.0.0.1:8000/api/todo')
        .then(response => (this.tdls = response.data)
        );
    }
  },

  // membuat fungsi agar otomatis dibuat
  created() {
    this.getTDL();
  },

}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}

</style>
