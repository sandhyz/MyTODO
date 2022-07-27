<template>
    <!-- <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table> -->

    <center>
        <div class="card bg-light mt-lg-3" style="width: 500px;">
            <li v-for="dataS in dataTDL" :key="dataS.id">
                {{ dataS.judul }}
                <a class="fa fa-trash-o" @click="deleteTDL()"></a>
            </li>
        </div>
    </center>



</template>

<script>
import axios from 'axios';
export default {

    data: function () {
        return {
            dataTDL: null
        };
    },

    mounted() {
        axios.get('http://127.0.0.1:8000/api/todo').then(response => (this.dataTDL = response.data));
    },

    methods: {
        deleteTDL() {
            if (this.TDL.judul == '') {
                return;
            }

            axios.delete('http://127.0.0.1:8000/api/todo/' + this.dataTDL.id);
        }
    },
    

}

</script>