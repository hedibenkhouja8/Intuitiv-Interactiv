<template><div>
  <navbar-component/>
<div class="wrapper d-flex align-items-stretch">
<sidebar-component/>
 <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Historique d'emprunt</h2>  <div class="row" >  <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Emprunts En Attente d'acceptation </h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table ">
                                       <thead class="thead-warning">
                                          <tr  >
                                             <th>Titre</th>
                                             <th>Auteur</th>
                                             <th>Domaine</th>
                                             
                                             <th>Critere</th>
                                             <th>Date Debut</th>
                                             
                                             <th>Date Fin</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr v-bind:key="item.id" v-for="item in info">
                                             <td>{{item.memoire.demande_depot.titre}}</td>
                                             <td>{{item.memoire.demande_depot.user.name}}</td>
                                             <td>{{item.memoire.demande_depot.domaine.nom}}</td>
                                             <td>{{item.memoire.demande_depot.critere.nom}}</td>
                                             
                                             <td>{{item.date_debut}}</td>
                                             <td>{{item.date_fin}}</td>
                                          </tr>
                                         
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
     
      
      </div>  
         <div class="row" >  <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Emprunts effectué </h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table ">
                                       <thead class="thead-success">
                                          <tr  >
                                             <th>Titre</th>
                                             <th>Auteur</th>
                                             <th>Domaine</th>
                                             
                                             <th>Critere</th>
                                             <th>Date Debut</th>
                                             
                                             <th>Date Fin</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr v-bind:key="item.id" v-for="item in info1">
                                             <td>{{item.memoire.demande_depot.titre}}</td>
                                             <td>{{item.memoire.demande_depot.user.name}}</td>
                                             <td>{{item.memoire.demande_depot.domaine.nom}}</td>
                                             <td>{{item.memoire.demande_depot.critere.nom}}</td>
                                             
                                             <td>{{item.date_debut}}</td>
                                             <td>{{item.date_fin}}</td>
                                          </tr>
                                         
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
     
      
      </div>     <div class="row" >  <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Emprunts refusé </h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table ">
                                       <thead class="thead-danger">
                                          <tr  >
                                             <th>Titre</th>
                                             <th>Auteur</th>
                                             <th>Domaine</th>
                                             
                                             <th>Critere</th>
                                             <th>Date Debut</th>
                                             
                                             <th>Date Fin</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr v-bind:key="item.id" v-for="item in info2">
                                             <td>{{item.memoire.demande_depot.titre}}</td>
                                             <td>{{item.memoire.demande_depot.user.name}}</td>
                                             <td>{{item.memoire.demande_depot.domaine.nom}}</td>
                                             <td>{{item.memoire.demande_depot.critere.nom}}</td>
                                             
                                             <td>{{item.date_debut}}</td>
                                             <td>{{item.date_fin}}</td>
                                          </tr>
                                         
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
     
      
      </div>  </div>

</div>
          </div>
</template>

<script>
import NavbarComponent from '@/components/navbar.vue'
import sidebarComponent from '@/components/sidebar.vue'
import axios from 'axios'
export default {
name: 'historyprofileComponent',
components: {
    NavbarComponent,
    sidebarComponent
  },
  data() {
    return {
      info: null,
      info1: null,
      info2: null,
      username: localStorage.getItem("name"),

      prenom: localStorage.getItem("prenom"),
      id: localStorage.getItem("id")
    };
  },mounted () {
      axios
      .get('http://127.0.0.1:8000/api/enattentebyUser/'+localStorage.getItem("id"))
      .then(response => (this.info = response.data))
       axios
      .get('http://127.0.0.1:8000/api/AcceptedByUserAndDone/'+localStorage.getItem("id"))
      .then(response => (this.info1 = response.data))
      axios
      .get('http://127.0.0.1:8000/api/refusedanddonebyUser/'+localStorage.getItem("id"))
      .then(response => (this.info2 = response.data))
 },methods: {edit(fichierpdf){
this.$router.push({
    name:"fichier",
    params : {fichierpdf:fichierpdf}
})
}}
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