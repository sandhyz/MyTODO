<template>
    <h1 class="mt-5">TO DO LIST</h1>


    <div class="d-flex flex-row mb-3">

        <div class="mid">
            <div v-for="dataS in filters" :key="dataS.id">
                <div class="card bg-light mt-5 middle" style="width: 550px;">
                    <div class="container-sm">
                        <h3>TO-DO</h3>
                        <P class="text-uppercase fw-bold">{{ dataS.judul }}</P>
                        <p style="text-align: left;">{{ dataS.isi }}</p>

                        <form>
                            <button class=" bg-success text-white btn"
                                @click="updateTDL(dataS.id)" id="selesai"><a class="fa fa-check check"></a> Tandai sebagai Selesai</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="card bg-light mt-5 middle" style="width: 550px;">
            <AddTODO />
        </div>
    </div>



</template>

<script>
// import component child
import AddTODO from '@/components/AddTODO.vue'
//mengimport axios untuk update dan delete data
import axios from 'axios'

export default {
    props: ['tdls'],

    //menyimpan data completed yang nantinya di push ke database
    data: function () {
        return {
            TDL: {
                iscompleted: true
            }
        }
    },

    //menampilkan component
    components: {
        AddTODO
    },

    methods: {
        //edit to do list menjadi selesai atau tidak selesai
        updateTDL(dataSid) {
            //membuat validasi apakah yakin dengan ubah menjadi selesai
            const $validate = confirm('apakah kamu yakin mengubahnya menjadi selesai?')
            if ($validate == true) {
                axios.put('http://127.0.0.1:8000/api/todo/' + dataSid, { TDL: this.TDL })
                    .catch(error => console.log(error));
            }
            // location.reload()
        },

        //menghapus data to do list
        deleteTDL(dataSid) {
            axios.delete('http://127.0.0.1:8000/api/todo/' + dataSid)
                .catch(error => console.log(error));
        },
    },


    computed: {
        filters() {
            return this.tdls.filter(TDL => TDL.completed == '0')
        }
    }

}
</script>

<style scoped>
h1 {
    text-align: center;
}

h3 {
    text-align: center;
}

.middle {
    margin: auto;
    width: 50%;
    border: 3px solid #bababa;
    padding: 10px;
}

.mid {
    width: 50%;

}

.check{
    color: white;
}


</style>