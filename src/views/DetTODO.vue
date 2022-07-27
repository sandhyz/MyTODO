<template>
    <h1 class="mt-5">TO DO LIST DETAIL</h1>
     <div class="card bg-light mt-5 middle" style="width: 500px;">
        <div v-for="(tdl, index) in 'tdls'" :key="index">            
        </div>
        <ListTODO :tdls="tdls"/>
        <AddTODO />
    </div>
    {{ tdls }}
</template>

<script>
export default{

 props: ['tdls'],
}
</script>

<style>
</style>