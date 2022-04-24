<template>

<div>
  <navbar-component/>

    
  










<footer-component/></div>

</template>

<script>

import axios from 'axios';
import NavbarComponent from '@/components/navbar.vue'
import FooterComponent from '@/components/footer.vue'
export default {
name: 'mesempruntsComponent',
components: {
    NavbarComponent,
    FooterComponent
  },
  data () {
    return {
      info: null
    }
  },
  mounted () {
    
    axios
      .get('http://127.0.0.1:8000/api/Memoire')
      .then(response => (this.info = response.data))
      
  },
 methods :{edit(id,c){
this.$router.push({
    name:"DetailMemoire",
    params : {id:id,c:c}
})
},/* <embed controlslist="nodownload" v-bind:src="'http://localhost:8000/storage/files/demandes/pdf/'+item.demande_depot.fichierpdf" toolbar=0 width="500" height="375" 
 type="application/pdf">*/
  }
}

</script>

<style>

</style>