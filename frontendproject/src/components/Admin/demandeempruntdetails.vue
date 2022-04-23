<template>
<div>
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
                  <h2>Demande D'emprunt</h2>
                </div>
              </div>
            </div>
             <!-- row -->
            <div class="row column1"   >
            <div class="card">
        <div v-bind:key="item.id" v-for="item in info" class="card-body">
            <h3 class="card-title">{{item.memoire.demande_depot.titre}}</h3>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center"><img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.coverimage" class="img-responsive"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">  <h4 class="box-title mt-5"> Etudiant</h4>
                    <p>{{item.user.name}}  <button
                                    type="button"
                                    class="btn "
                                     @click="edit(item.user.id)"
                                  >
                                    <i class="fa fa-share green_color"> </i>
                                  </button></p>
                    <h4 class="box-title mt-5"> Prouquoi je veux emprunter cette memoire</h4>
                    <p>{{item.description}}</p>
                  
                     <h4 class="box-title mt-5"> Date Debut souhaité</h4>
                    <p>{{item.date_debut}}</p><h4 class="box-title mt-5"> Date fin d'emprunt</h4>
                    <p>{{item.date_fin}}</p>
                    <h4 class="box-title mt-5"> Historique d'Emprunts</h4>
                        <h6 style="color:red;">{{refus}} refus <h7 style="color:green;">{{accepte}} accepté</h7></h6>
                    <div class="text-center">
                        <h3 class="box-title mt-5">Status</h3>
                        <h4>{{ item.status }}</h4>
                         <button 
                                    type="button"
                                    class="btn btn-success btn-xs"
                                    @click="accepter(item.id)"
                                    style="margin: 10px"
                                  >
                                    Accepter
                                  </button>
                                  <button  
                                    type="button"
                                    class="btn btn-danger btn-xs"
                                    @click="refuser(item.id)"
                                  >
                                    Refuser
                                  </button>
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
</div></div>
</template>

<script>
import axios from "axios";
import sidebarComponent from "@/components/Admin/sidebar.vue";
import topbarComponent from "@/components/Admin/topbar.vue";
export default {
  props: ["id"],
  name: "demandeempruntdetailsComponent",
  components: {
    sidebarComponent,
    topbarComponent,
  },
  data () {
    return {
     info: null,accepte:null,refus:null,
     dmande_id:this.$route.params.id,nb:null,c:this.$route.params.c,
    test:'',
     values :{
      id:this.$route.params.id,
      }
     
     
    }
  },methods: {
      accepter(id) {
     axios.post('http://127.0.0.1:8000/api/DemandeEmpruntaccept/'+id);
     window.location.reload();
    },
    refuser(id) {
     axios.post('http://127.0.0.1:8000/api/DemandeEmpruntrefuse/'+id);
     window.location.reload();
    },
      formatDate(dateString) {
            const date = new Date(dateString);
                // Then specify how you want your dates to be formatted
            return new Intl.DateTimeFormat('default', {dateStyle: 'long'}).format(date);
        },edit(id){
this.$router.push({
    name:"profile",
    params : {id:id}
})
},
    },
 async mounted () {
      
         axios
      .get('http://127.0.0.1:8000/api/DemandeEmpruntDetails/'+this.$route.params.id)
      .then(response => (this.info = response.data))
        axios
      .get('http://127.0.0.1:8000/api/User/'+this.$route.params.c+'/DemandeEmprunt')
      .then(response => (this.nb = response.data.length))
        axios
      .get('http://127.0.0.1:8000/api/User/'+this.$route.params.c+'/nbEmpruntparUserRefuse')
      .then(response => (this.refus = response.data.length))
      
        axios
      .get('http://127.0.0.1:8000/api/User/'+this.$route.params.c+'/nbEmpruntparUserAccepte')
      .then(response => (this.accepte = response.data.length))
this.test=this.info

  }
};
</script>

<style>
</style>