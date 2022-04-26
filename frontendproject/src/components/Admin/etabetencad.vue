<template><div >
  <sidebar-component/><topbar-component/><br><br><br>
<div class="full_container" style="width:80%; margin-left: 21%;  ">
         <div class="inner_container">
            <!-- Sidebar  -->
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <!-- end topbar -->
            <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Etablissements et Encadreurs </h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <!-- table section -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Etablissements <button class="btn btn-warning" type="button"  data-toggle="modal" data-target="#exampleModal2">Ajouter</button></h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr  >
                                             <th>Nom</th>
                                             <th>Ville</th>
                                             <th>Adresse</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr v-bind:key="item.id" v-for="item in info">
                                             <td>{{item.nom}}</td>
                                             <td>{{item.ville}}</td>
                                             <td>{{item.adresse}}</td>
                                          </tr>
                                         
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Encadreurs <button class="btn btn-warning" type="button"  data-toggle="modal" data-target="#exampleModal">Ajouter</button></h2>
                                 </div>
                              </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un Encadreur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form @submit.prevent="onCreate">
      <div class="form-group">
      <h6 for="disabledTextInput">Nom </h6> 
   
      <div class="input-group mb-3 input-group-lg">

  <input v-model="nom"  type="text" class="form-control" aria-label="Sizing example input" placeholder="Nom" aria-describedby="inputGroup-sizing-default">
</div>
      <h6 for="disabledTextInput">Prénom </h6>  <div class="input-group mb-3 input-group-lg">
 
  <input  v-model="prenom" type="text" placeholder="Prénom" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
      <h6 for="validationCustom03">Etablissement</h6>
      <div class="input-group mb-3 input-group-lg">
                <select
                  class="form-select"
                  aria-label="Default select example"
                  v-model="selectedEtablisement"
                >
                  <option
                    v-bind:key="etablisement.id"
                    v-bind:value="etablisement.id"
                    v-for="etablisement in info"
                  >
                    {{ etablisement.nom }}
                  </option>
                </select>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" class="btn btn-primary" data-bs-dismiss="modal" >Confirmer La demande</button>
        
      </div></form>
      </div>
    
    </div>
  </div>
</div>

                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                   <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Nom</th>
                                             <th>Prénom</th>
                                             <th>Etablissement</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr v-bind:key="item.id" v-for="item in info2">
                                             <td>{{item.nom}}</td>
                                             <td>{{item.prenom}}</td>
                                             <td>{{item.etablisement.nom}}</td>
                                          </tr>
                                       
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                       
                       
                     </div>
                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
                     </div>
                  </div>
               </div>


            </div>
         </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un Encadreur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form @submit.prevent="onCreate2">
      <div class="form-group">
      <h6 for="disabledTextInput">Nom </h6> 
   
      <div class="input-group mb-3 input-group-lg">

  <input v-model="nom2"  type="text" class="form-control" aria-label="Sizing example input" placeholder="Nom" aria-describedby="inputGroup-sizing-default">
</div>
      <h6 for="disabledTextInput">Ville </h6>  <div class="input-group mb-3 input-group-lg">
 
  <input  v-model="ville" type="text" placeholder="Ville" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
      <h6 for="validationCustom03">Adresse</h6>
     <div class="input-group mb-3 input-group-lg">
 
  <input  v-model="adresse" type="text" placeholder="Adresse" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" class="btn btn-primary" data-bs-dismiss="modal" >Confirmer La demande</button>
        
      </div></form>
      </div>
    
    </div>
  </div>
</div>
      </div></div>
</template>

<script>
import axios from 'axios'
import sidebarComponent from '@/components/Admin/sidebaradmin.vue'
import topbarComponent from '@/components/Admin/topbar.vue'
export default {
name: 'etabetencadComponent',
components: {
  sidebarComponent,
  topbarComponent
  }, data () {
    return {
      info: null,info2:null,nom:'',prenom:'',selectedEtablisement:0 ,nom2:'',ville:'',adresse:''   }
  },
  mounted () {
      axios
      .get('http://127.0.0.1:8000/api/Etablisement')
      .then(response => (this.info = response.data))
       axios
      .get('http://127.0.0.1:8000/api/Encadreur')
      .then(response => (this.info2 = response.data))
  },methods: {
       onCreate(){
      axios
      .post('http://127.0.0.1:8000/api/Encadreur',
     {nom:this.nom,prenom:this.prenom,etablisement_id:this.selectedEtablisement} )
     .then((response)=>{if(response.status === 201) {
            
  window.location.reload();    
 
            }
            })
    },  onCreate2(){
      axios
      .post('http://127.0.0.1:8000/api/Etablisement',
     {nom:this.nom2,ville:this.ville,adresse:this.adresse} )
     .then((response)=>{if(response.status === 201) {
            
  window.location.reload();    
 
            }
            })
    },
  }
}
</script>

<style>

</style>