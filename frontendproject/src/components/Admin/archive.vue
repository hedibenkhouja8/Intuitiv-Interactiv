<template>
<sidebar-component/><topbar-component/>
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
          
             <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Archive</h2>
                                 </div>
                              </div>   <div class="full gallery_section_inner padding_infor_info">
                                 <div class="row">
                                    <div v-bind:key="item.id" v-for="item in info" class="col-sm-4 col-md-3 margin_bottom_30">
                                       <div class="column2">
                                          <a  @click="details(item.id,item.demande_depot.user_id)" ><img  v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.demande_depot.coverimage"  alt="#" /></a>
                                       </div>
                                       <div class="heading_section">
                                          <h4>{{item.demande_depot.titre}}</h4>
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
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import sidebarComponent from "@/components/Admin/sidebaradmin.vue";
import topbarComponent from "@/components/Admin/topbar.vue";
export default {
  name: "archiveComponent",
  components: {
    sidebarComponent,
    topbarComponent,
  },
  data() {
    return {
      info: null,
      user: "test",
    };
  },
  mounted() {
    
    axios
      .get("http://127.0.0.1:8000/api/Archive")
      .then((response) => (this.info = response.data));
      
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
    //http://127.0.0.1:8000/api/User/5
    //http://127.0.0.1:8000/api/Encadreurs/1
  },
};
</script>

<style>
</style>