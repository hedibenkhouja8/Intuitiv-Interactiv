<template><div >
<sidebar-component/><topbar-component/><br><br><br>
<div class="full_container" style="width:80%; margin-left: 21%;  ">    <div class="inner_container">
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
                  <h2>Memoires</h2>
                </div>
              </div>
            </div>
            <!-- row -->
          <br><div class="form-row"><div class="col-md-4">
	  <input type="text" class="form-control" placeholder="Memoire Ex'Big Data research'" height="222px" v-model="q"></div>
	<div class="col-md-4" >   <select  v-model="domaine"   class="form-control"  
                          > <option disabled value="">Séléctionnez Un Domaine</option>
                            <option
                              v-bind:key="domaine.id"
                              v-for="domaine in domaines"
                              :value="domaine.nom"
                            >
                              {{ domaine.nom }}
                            </option></select></div>
						<div class="col-md-3">	  <select v-model="etablisement"  class="form-control"  
                          > <option disabled value="">Séléctionnez Un Etablissement</option>
                            <option
                              v-bind:key="etablisement.id"
                              v-for="etablisement in etablisements"
                              :value="etablisement.nom"
                            >
                              {{ etablisement.nom }}
                            </option></select></div>
        </div><br> <div class="alert alert-secondary" v-if="(this.q || this.domaine || this.etablisement) && getfilteredmemoires.length >1">{{getfilteredmemoires.length}} mémoires trouvées</div>
  <div class="alert alert-danger" v-if="(this.q || this.domaine || this.etablisement) && getfilteredmemoires.length === 0">{{getfilteredmemoires.length}} Aucune mémoire touvée</div>
  <div class="alert alert-secondary" v-if="(this.q || this.domaine || this.etablisement) && getfilteredmemoires.length === 1">{{getfilteredmemoires.length}} Une seule mémoire touvée</div>
  <div class="loader" v-if="loading "></div>
             <div class="row column1"> 
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Memoires disponible</h2>
                                 </div>
                                
                                    <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Archive&nbsp;<router-link to="archive"><i class="fa fa-archive color-red"></i></router-link></h2>
                              </div>   <div class="full gallery_section_inner padding_infor_info">
                                 <div class="row"><div style="margin-left:450px"  v-if="(this.q || this.domaine || this.etablisement) && getfilteredmemoires.length === 0">
            <img  style="height:300px;width:300px" src="../../assets/images/abc.jpg" alt="">
          </div>
                                    <div v-bind:key="info.id" v-for="info in getfilteredmemoires" class="col-sm-4 col-md-3 margin_bottom_30">
                                       <div class="column2">
                                          <a  @click="details(info.id,info.demande_depot.user_id)" ><img  v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+info.demande_depot.coverimage"  alt="#" /></a>
                                       </div>
                                       <div class="heading_section">
                                          <h4>{{info.demande_depot.titre}}</h4>
                                       </div>
                                    </div>
                                  
                                   
                                 </div>
                              </div>
                          
                           </div>
                        </div>
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
      </div></div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import sidebarComponent from "@/components/Admin/sidebaradmin.vue";
import topbarComponent from "@/components/Admin/topbar.vue";
export default {
  name: "memoireadminComponent",
  components: {
    sidebarComponent,
    topbarComponent,
  },
  data() {
    return {
      infos: [],
	  q:'',domaine:'',critere:'',domaines:[],criteres:[],etablisements:[],etablisement:'',loading:true,
    };
  },
  mounted() {
    
      this.getmemoires(); axios
      .get("http://127.0.0.1:8000/api/Domaine")
      .then((response) => (this.domaines = response.data));
	  axios
      .get("http://127.0.0.1:8000/api/Etablisement")
      .then((response) => (this.etablisements = response.data));
   
      
  },
  methods: {
    details(id,c) {
      this.$router.push({
        name: "memoireadmindetail",
        params: { id: id ,c:c},
      });
    },
     accepter(id) {
     axios.post('http://127.0.0.1:8000/api/DemandeDepotaccept/'+id);
     window.location.reload();
    },
    refuser(id) {
     axios.post('http://127.0.0.1:8000/api/DemandeDepotrefuse/'+id);
     window.location.reload();
    },
   
getmemoires(){
 axios
      .get('http://127.0.0.1:8000/api/Memoire')
      .then(response => {this.infos = response.data;this.loading=false;})
} ,
 filterProductsByDomaine: function(infos){
                return infos.filter(info => !info.demande_depot.domaine.nom.indexOf(this.domaine))
            }, filterProductsByEtablisement: function(infos){
                return infos.filter(info => !info.demande_depot.etablisement.nom.indexOf(this.etablisement))
            }, filterProductsByName: function(infos) {
                return infos.filter(info=>info.demande_depot.titre.toLowerCase().includes(this.q.toLowerCase()));
            },
  },computed:{
	 /* getfilteredmemoires(){
		  return this.infos.filter(info =>{
			  return info.demande_depot.titre.toLowerCase().includes(this.q.toLowerCase());
		  })
	  }*/ getfilteredmemoires: function(){ 
                return this.filterProductsByDomaine(this.filterProductsByName(this.filterProductsByEtablisement(this.infos)))
            }
  }
};
</script>

<style>
</style>