<template><div>
  <navbar-component/>
<div class="wrapper d-flex align-items-stretch">
<sidebar-component/>
 <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Memoire Disponible</h2>
         <div class="row" >
    
      <embed controlslist="nodownload" v-bind:src="'http://localhost:8000/storage/files/demandes/pdf/'+fichier" toolbar=0 width="500" height="1300" 
 type="application/pdf">
      </div>  </div>

</div>
          </div>
</template>

<script>
import NavbarComponent from '@/components/navbar.vue'
import sidebarComponent from '@/components/sidebar.vue'
import axios from 'axios'
export default {
name: 'fichierComponent',
components: {
    NavbarComponent,
    sidebarComponent
  },
  data() {
    return {
      info: null,
      fichier:this.$route.params.fichierpdf,
      username: localStorage.getItem("name"),

      prenom: localStorage.getItem("prenom"),
      id: localStorage.getItem("id")
    };
  },mounted () { axios
      .get('http://127.0.0.1:8000/api/AcceptedByUser/'+localStorage.getItem("id"))
      .then(response => (this.info = response.data))
 }
}


</script>

<style>
#content {
  width:320%;
  padding: 0;
  min-height: 100vh;
  -webkit-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s; }
  .p-4 {
  padding: 1.5rem !important; }
    .p-md-5 {
    padding: 3rem !important; }
</style>