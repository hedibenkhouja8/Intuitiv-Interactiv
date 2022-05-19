<template><div>
  
  <router-view :key="$route.path" />
  </div>
</template>

<script>
//import axios from 'axios'

export default {
  name: 'App',
 


}
//axios.defaults.headers.common['Authorization']='Bearer ' + localStorage.getItem('token')
</script>

<style>

</style>
