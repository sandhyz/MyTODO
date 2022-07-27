<template>
    <div>
        <h1 class="mb-5">Tambah TO-DO</h1>

        <center>
            <div class="container-fluid">
                <div class="card bg-light mt-lg-3" style="width: 500px;">
                    <form>
                        <div class="mb-3 mr-3 ml-3">
                            <label class="form-label">Masukan Judul</label>
                            <input type="text" class="form-control" v-model="TDL.judul">
                        </div>
                        <button type="submit" class="btn btn-primary" @click="addTDL()">Submit</button>
                    </form>
                </div>
            </div>
        </center>
    </div>
</template>

<script>
    import axios from 'axios'

export default {

    data: function (){
        return{
            TDL: {
            judul: ""
        }
        }
       
    },
    methods: {
        addTDL(){
            if(this.TDL.judul == ''){
                return;
            }

            axios.post('http://127.0.0.1:8000/api/todo/store', {TDL: this.TDL});
        }
    },
}
</script>