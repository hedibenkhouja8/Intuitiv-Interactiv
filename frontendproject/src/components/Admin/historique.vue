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
                  <h2>Demandes</h2>
                </div>
              </div>
            </div>
            <!-- row -->
            <div class="row column1">
               <div class="full padding_infor_info">
                                 <div class="table_row">
                                    <div class="table-responsive">
                                       <table class="table table-striped">
                                          <thead>
                                             <tr>
                                                <th>Memoire</th>
                                                <th>Etudiant</th>
                                                
                                                <th>Date de demande</th>
                                                <th>Date Debut</th>
                                                <th>Date fin</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr v-bind:key="item.id" v-for="item in info">
                                                <td><a cursor: pointer  @click="details(item.memoire.id,item.memoire.demande_depot.user_id)">{{ item.memoire.demande_depot.titre }}</a></td>
                                                
                                                <td><a @click="details2(item.user_id)">{{ item.user.name }}</a> </td>
                                                  <td>{{ formatDate(item.created_at) }}</td>
                                                <td>{{ item.date_debut }}</td>
                                                <td>{{ item.date_fin }}</td>
                                             </tr>
                                            
                                          </tbody>
                                       </table>
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
  </div></div>
</template>

<script>
import axios from "axios";
import sidebarComponent from "@/components/Admin/sidebaradmin.vue";
import topbarComponent from "@/components/Admin/topbar.vue";
export default {
  name: "historiqueempruntComponent",
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
      .get("http://127.0.0.1:8000/api/DemandeEmpruntAccepted")
      .then((response) => (this.info = response.data));
  },
  methods: {
    details(id,c) {
      this.$router.push({
        name: "memoireadmindetail",
        params: { id: id ,c:c},
      });
    },  details2(id) {
      this.$router.push({
        name: "profile",
        params: { id: id },
      });
    }
 , formatDate(dateString) {
            const date = new Date(dateString);
                // Then specify how you want your dates to be formatted
            return new Intl.DateTimeFormat('default', {dateStyle: 'long'}).format(date);
        },
   accepter(id) {
     axios.post('http://127.0.0.1:8000/api/DemandeEmpruntaccept/'+id);
     window.location.reload();
    },
    refuser(id) {
     axios.post('http://127.0.0.1:8000/api/DemandeEmpruntrefuse/'+id);
     window.location.reload();
    },
  },
 
};
</script>

<style>
</style>