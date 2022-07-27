<template>
    <h1>TO DO LIST</h1>

    <DataTODO />
    <AddTODO />

</template>

<script>
import AddTODO from '@/components/AddTODO.vue'
import DataTODO from '@/components/DataTODO.vue'
export default{
    mounted() {
    },

    components: {
        AddTODO, DataTODO
    }
        
    

}
</script>