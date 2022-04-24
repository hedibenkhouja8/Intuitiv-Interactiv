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
              <div class="full padding_infor_info">
                <div class="table_row">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>&nbsp;</th>
                          <th>Nom</th>
                          <th>Prenom</th>

                          <th>Email</th>
                          <th>Etablissement</th>
                          <th>Fichier</th>

                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-bind:key="item.id" v-for="item in info">
                          <td>
                            <img
                              v-bind:src="
                                'http://localhost:8000/storage/files/register/profilepic/' +
                                item.profilepic
                              "
                              class="xx"
                              alt="non disponible"
                            />
                          </td>
                          <td>{{ item.name }}</td>

                          <td>{{ item.prenom }}</td>
                          <td>{{ item.email }}</td>
                          <td>{{ item.etablisement.nom }}</td>
                          <td>        <div
                      class="modal fade"
                      id="modalCart"
                      tabindex="-1"
                      role="dialog"
                      aria-labelledby="exampleModalLabel"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                          <!--Header-->
                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">
                              pdf file {{item.fichierdemande }}
                            </h4>
                            <button
                              type="button"
                              class="close"
                              data-dismiss="modal"
                              aria-label="Close"
                            >
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <!--Body-->
                          <div class="modal-body">
                            <embed 
                              controlslist="nodownload"
                              v-bind:src="
                                'http://localhost:8000/storage/files/register/demande/' +
                                item.fichierdemande 
                              "
                              toolbar="0"
                              width="1100"
                              height="500"
                              type="application/pdf"
                            />
                          </div>
                          <!--Footer-->
                          <div class="modal-footer">
                            <button
                              type="button"
                              class="btn btn-outline-primary"
                              data-dismiss="modal"
                            >
                              Close
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                            <button
                              type="button"
                              class="btn btn-primary"
                              data-toggle="modal"
                              data-target="#modalCart"
                            >
                              <i class="fa fa-file-pdf-o"> </i>
                              
                            </button>
                      
                          </td>

                          <td>
                            <button
                              class="btn btn-success"
                              @click="accepter(item.id)"
                            >
                              Accepter</button
                            >&nbsp;&nbsp;<button
                              class="btn btn-danger"
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
  name: "etudiantsenattenteComponent",
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
      .get("http://127.0.0.1:8000/api/UserEnAttente")
      .then((response) => (this.info = response.data));
  },
  methods: {
    details(id, c) {
      this.$router.push({
        name: "Demandeempruntdetails",
        params: { id: id, c: c },
      });
    },
    formatDate(dateString) {
      const date = new Date(dateString);
      // Then specify how you want your dates to be formatted
      return new Intl.DateTimeFormat("default", { dateStyle: "long" }).format(
        date
      );
    },
    accepter(id) {
      axios.post("http://127.0.0.1:8000/api/Acceptuser/" + id);
      window.location.reload();
    },
    refuser(id) {
      axios.post("http://127.0.0.1:8000/api/Refuseuser/" + id);
      window.location.reload();
    },
  },
};
</script>

<style>
</style>