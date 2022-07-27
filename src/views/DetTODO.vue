<template>
    <h1 class="mt-5">TO DO LIST DETAIL</h1>

    <!-- isi card -->
    <div class="card bg-light mt-5 middle" style="width: 1000px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Judul</th>
                    <th scope="col">Selesai</th>
                    <th scope="col">Waktu Selesai</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody v-for="data in tdls" :key="data.id">
                <tr>
                    <td>{{ data.judul }}</td>
                    <td>{{ data.completed == 1 ? "selesai" : " Belum Selesai" }}</td>
                    <td>{{ data.completed_at }}</td>
                    <td>
                        <form>
                            <button class="fa fa-check check bg-transparent" @click="updateTDL(data.id)" id="selesai"></button>
                            <button class="fa fa-times times bg-transparent"  @click="update2TDL(data.id)" id="bselesai"></button>
                            <button class="fa fa-trash-o trash bg-transparent" @click="deleteTDL(data.id)" id="hapus" ></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
//mengimport axios untuk update dan delete data
import axios from 'axios'

export default {
    //menyimpan data complete
    data: function () {
        return {
            TDL: {
                iscompleted: null
            },
        }
    },

    //pasing data app to dettodo
    props: ['tdls'],

    methods: {
        //edit to do list menjadi selesai
        updateTDL(dataSid) {
            //merubah data complete menjadi true
            this.TDL.iscompleted = true;

            //membuat validasi button
            const $validate = confirm('apakah kamu yakin mengubahnya menjadi selesai?')
            if ($validate) {
                axios.put('http://127.0.0.1:8000/api/todo/' + dataSid, { TDL: this.TDL })
                    .catch(error => console.log(error));
            }
        },

        //edit to do list menjadi selesai
        update2TDL(dataSid) {
            //membuat validasi button
            const $validate = confirm('apakah kamu yakin mengubahnya menjadi belum selesai?')
            if ($validate) {
                this.TDL.iscompleted = false;
                console.log(this.TDL.iscompleted);
                axios.put('http://127.0.0.1:8000/api/todo/' + dataSid, { TDL: this.TDL })
                    .catch(error => console.log(error));
            }
        },

        //menghapus data to do list
        deleteTDL(dataSid) {
            //membuat validasi button
            const $validate = confirm('apakah kamu yakin mengubahnya menjadi belum selesai?')
            if ($validate) {
                axios.delete('http://127.0.0.1:8000/api/todo/' + dataSid)
                    .catch(error => console.log(error));
            }
        },

    },

}
</script>

<style scoped>

h1{
    text-align: center;
}
.middle {
    margin: auto;
    text-align: center;
    width: 50%;
    border: 3px solid #bababa;
    padding: 10px;
}

.trash {
    border: none;
    color: #FF0000;
}

.check {
    border: none;
    color: green;
    margin-right: 40px;
}

.times {
    border: none;
    color: blue;
    margin-right: 40px;
}

.dpn {
    display: none;
}

.dpb {
    display: block;
}
</style>