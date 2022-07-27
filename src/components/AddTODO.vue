<template>
    <div class="mb-3">
        <h3>Tambah TO-DO</h3>

        <!-- form untuk menambahkan data todo -->
        <form>
            <div class="mb-3">
                <div class="mb-2">
                    <label class="form-label">Masukan Judul</label>
                    <input type="text" class="form-control" v-model="TDL.judul">
                </div>
                <div class="mb-2">
                    <label class="form-label">Masukan Isi Kegiatan</label>
                    <textarea class="form-control" v-model="TDL.isi"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" @click="addTDL()">Submit</button>
        </form>
    </div>
    <!-- </center> -->

</template>

<script>
// import axios untuk tambah data todo 
import axios from 'axios'

export default {
    //mengambil data dari form dan ditampung ke fungsi data
    data: function () {
        return {
            TDL: {
                judul: "",
                isi: ""
            }
        }

    },

    // menambah data to do 
    methods: {
        addTDL() {
            axios.post('http://127.0.0.1:8000/api/todo/store', { TDL: this.TDL })
                .catch(error => alert(error));
        }
    },
}
</script>

<style scoped>
h3{
    text-align: center;
}
</style>