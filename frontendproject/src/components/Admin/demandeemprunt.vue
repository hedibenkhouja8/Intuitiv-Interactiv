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
            <div class="row column1">
              <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                  <div class="full graph_head">
                    <div class="heading1 margin_0">
                      <h2>Demandes Depot</h2>
                    </div>
                  </div>
                  <div class="full price_table padding_infor_info">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="table-responsive-sm">
                          <table
                            class="table table-striped projects text-center"
                          >
                            <thead class="thead-dark">
                              <tr>
                                <th >Titre</th>
                                <th>Etudiant</th>
                                
                                <th>Effectué le</th>
                                <th>Date Debut</th>
                                <th>Date retour</th>
                                <th>Status</th>
                                <th>actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-bind:key="item.id" v-for="item in info">
                             
                                <td>
                                  <a>{{ item.memoire.demande_depot.titre }}</a>
                                </td>

                                <td>
                                  {{ item.user.name}}
                                </td>
                                <td class="project_progress">
                                  {{ formatDate(item.created_at) }}
                                </td> <td>
                                  <a>{{ item.date_debut }}</a>
                                </td> <td>
                                  <a>{{ item.date_fin }}</a>
                                </td>
                                <td>
                                  {{ item.status }}
                                </td>
                                <td>
                                  <button
                                    type="button"
                                    class="btn btn-info btn-xs"
                                    @click="details(item.id,item.user.id)"
                                  >
                                    Details
                                  </button>
                                     <button
                                    type="button"
                                    class="btn btn-success btn-xs"
                                    @click="accepter(item.id)"
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
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
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
</template>

<script>
import axios from "axios";
import sidebarComponent from "@/components/Admin/sidebar.vue";
import topbarComponent from "@/components/Admin/topbar.vue";
export default {
  name: "demandeempruntComponent",
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
      .get("http://127.0.0.1:8000/api/DemandeEmprunt")
      .then((response) => (this.info = response.data));
  },
  methods: {
    details(id,c) {
      this.$router.push({
        name: "Demandeempruntdetails",
        params: { id: id ,c:c},
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