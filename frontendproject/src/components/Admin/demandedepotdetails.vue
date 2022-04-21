<template>

  <div class="full_container">
    <div class="inner_container">
      <!-- Sidebar  -->
      <sidebar-component />
      <!-- end sidebar -->
      <!-- right content -->
      <div id="content">
        <!-- topbar -->
        <topbar-component />
        <!-- end topbar -->
        <div class="midde_cont">
          <div class="container-fluid">
            <div class="row column_title">
              <div class="col-md-12">
                <div class="page_title">
                  <h2>Demandes</h2>
                </div>
              </div>
            </div>
             <!-- row -->
            <div class="row column1"   >
            <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{values.titre}}</h3>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center"><img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+values.coverimage" class="img-responsive"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5"> Description</h4>
                    <p>{{values.description}}</p>
                    <h4 class="box-title mt-5"> User</h4>
                    <p>{{values.user_id}}</p>
                     <h4 class="box-title mt-5"> Domaine</h4>
                    <p>{{values.domaine_id}}</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">pdf file</button>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="box-title mt-5">General Info</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-product">
                            <tbody>
                                <tr>
                                    <td width="390">Entreprise</td>
                                    <td>{{values.entreprise_id}}</td>
                                </tr>
                                <tr>
                                    <td>Etablisement</td>
                                    <td>{{values.etablisement_id}}</td>
                                </tr>
                                <tr>
                                    <td>nombres des pages</td>
                                    <td>{{values.nbpages}}</td>
                                </tr>
                                <tr>
                                    <td>criteres</td>
                                    <td>{{values.critere_id}}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
              <!-- end row -->
            </div>
            <!-- footer -->
            <div class="container-fluid">
              <div class="row">
                <div class="footer">
                  <p>
                    Copyright © 2018 Designed by html.design. All rights
                    reserved.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- end dashboard inner -->
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="ExternalFiles">
        <iframe src="../../assets/cover/test.pdf" frameborder="0"></iframe>

        </div>
    </div>
  </div>
</div>
</template>

<script>
import axios from "axios";
import sidebarComponent from "@/components/Admin/sidebar.vue";
import topbarComponent from "@/components/Admin/topbar.vue";
export default {
  props: ["id"],
  name: "demandedepotdetailsComponent",
  components: {
    sidebarComponent,
    topbarComponent,
  },
  data () {
    return {
     info: null,
     dmande_id:this.$route.params.id,
    test:'',
     values :{
      id:this.$route.params.id,
      }
     
     
    }
  },
 async mounted () {
      
const res =axios.get('http://127.0.0.1:8000/api/DemandeDepot/'+this.$route.params.id)
this.values=(await res).data
         axios
      .get('http://127.0.0.1:8000/api/DemandeDepot/'+this.$route.params.id)
      .then(response => (this.info = response.data))
this.test=this.info

  }
};
</script>

<style>
</style>