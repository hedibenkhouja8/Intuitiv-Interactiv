<template>
  <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
           <sidebar-component/>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <topbar-component/>
               <!-- end topbar -->
            <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Tables</h2>
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
                                    <h2>Etablissements</h2>
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
                                    <h2>Encadreurs</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                   <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Firstname</th>
                                             <th>Lastname</th>
                                             <th>Email</th>
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
      </div>
</template>

<script>
import axios from 'axios'
import sidebarComponent from '@/components/Admin/sidebar.vue'
import topbarComponent from '@/components/Admin/topbar.vue'
export default {
name: 'etabetencadComponent',
components: {
  sidebarComponent,
  topbarComponent
  }, data () {
    return {
      info: null,info2:null,    }
  },
  mounted () {
      axios
      .get('http://127.0.0.1:8000/api/Etablisement')
      .then(response => (this.info = response.data))
       axios
      .get('http://127.0.0.1:8000/api/Encadreur')
      .then(response => (this.info2 = response.data))
  },
}
</script>

<style>

</style>