<template>
    <h1 class="mt-5">TO DO LIST</h1>

    <div class="card bg-light mt-5 middle" style="width: 500px;">
        <ListTODO :tdls="tdls"/>
        <AddTODO />
    </div>
    
    
</template>

<script>
// import component child
import AddTODO from '@/components/AddTODO.vue'
import ListTODO from '@/components/ListTODO.vue'


export default {
    props: ['tdls'],

    //menampilkan component
    components: {
        AddTODO, ListTODO
    }

}
</script>

<style scoped>
.middle {
  margin: auto;
  width: 50%;
  border: 3px solid #bababa;
  padding: 10px;
}
</style>