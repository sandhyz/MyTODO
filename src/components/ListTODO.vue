<template>
    <h3>TO-DO</h3>

    <!-- looping tdls menjadi datas -->
    <div class="item" v-for="dataS in filters" :key="dataS.id">
        <div>
             <form>
            <input type="checkbox"  @change="updateTDL(dataS.id)" :value="dataS.completed" v-model="TDL.iscompleted"
                id="check" >
            <!-- <input type="checkbox" @change="updateTDL(dataS.id)" v-model="TDL.iscompleted"> -->
            <span :class="[dataS.completed ? 'completed' : '', 'itemText']">{{ dataS.judul }}</span>
            <button class="fa fa-trash-o trash bg-light " @click="deleteTDL(dataS.id)"></button>
        </form>
        </div>
       <!-- {{ dataS }} -->
    </div>
</template>

<script>
//mengimport axios untuk update dan delete data
import axios from 'axios'

//menyimpan data completed yang nantinya di push ke database
export default {
    data: function () {
        return {
            TDL: {
                iscompleted: false
            }
        }
    },

    //mengambil data dari parent component
    props: ['dataS'],

    methods: {
        //edit to do list menjadi selesai atau tidak selesai
        updateTDL(dataSid) {

            // mengubah iscompleted menjadi
            

            //membuat validasi apakah yakin dengan ubah menjadi selesai
            const $validate = confirm('apakah kamu yakin mengubahnya menjadi selesai?')
            if ($validate == true) {
                this.TDL.iscompleted = true;
                axios.put('http://127.0.0.1:8000/api/todo/' + dataSid, { TDL: this.TDL })
                    .catch(error => console.log(error));
            } else {
                this.TDL.iscompleted = false;
            }
            // location.reload()
        },

        //menghapus data to do list
        deleteTDL(dataSid) {
            axios.delete('http://127.0.0.1:8000/api/todo/' + dataSid)
                .catch(error => console.log(error));
        },
    },

}

</script>

<style scoped>

.completed {
    text-decoration: line-through;
    color: #999999;

}

.itemText {
    width: 100%;
    margin-left: 20px;
}

.item {
    display: flex;
    justify-content: center;
    align-items: center;
}

.trash {
    border: none;
    color: #FF0000;
}

.width {
    width: 400px;
}
</style>
