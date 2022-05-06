<template>
  <div>
 <sidebar-component/><topbar-component/><br><br><br>
<div class="full_container" style="width:80%; margin-left: 21%;  ">
      <div class="inner_container">
        <!-- Sidebar  -->
        <!-- end sidebar -->
        <!-- right content -->
        <div id="content">
          <!-- topbar -->
          <!-- end topbar -->
          <div class="midde_cont ">
            <div class="container-fluid">
              <div class="row column_title">
                <div class="col-md-12">
                  <div class="page_title">
                    <h2>Demande</h2>
                  </div>
                </div>
              </div>
              <!-- row -->
              <div class="row column1">
                <div class="card">
                  <div
                    v-bind:key="item.id"
                    v-for="item in info"
                    class="card-body"
                  >
                    <h3 class="card-title">{{ item.titre }}</h3>
                    <div class="row">
                      <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="white-box text-center">
                          <img
                            v-bind:src="
                              'http://localhost:8000/storage/files/demandes/cover/' +
                              item.coverimage
                            "
                            class="img-responsive" width="350" height="500"
                          />
                        </div>
                      </div>
                      <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5">Description</h4>
                        <p>{{ item.description }}</p>
                        <h4 class="box-title mt-5">Etudiant</h4>
                        <p>
                          {{ item.user.name }}
                          <button
                            type="button"
                            class="btn"
                            @click="edit(item.user.id)"
                          >
                            <i class="fa fa-share green_color"> </i>
                          </button>
                        </p>
                        <h4 class="box-title mt-5">Domaine</h4>
                        <p>{{ item.domaine.nom }}</p>
                        <button 
                          type="button"
                          class="btn btn-primary"
                          data-toggle="modal"
                          data-target="#modalCart"
                        >
                        <i class="fa fa-file-pdf-o"> </i>
                          PDF
                        </button>
                         <button
                         style="margin: 10px"
                          type="button"
                          class="btn btn-primary"
                          data-toggle="modal"
                          data-target="#modalCart1"
                        >
                        <i class="fa fa-file-pdf-o"> </i>
                           demande 
                        </button>
                         <button v-if="item.fichierbrevet!== null"
                          type="button"
                          
                          class="btn btn-primary"
                          data-toggle="modal"
                          data-target="#modalCart2"
                        >
                        <i class="fa fa-file-pdf-o"> </i>
                           brevet 
                        </button>

                         <button v-if="item.fichierrecherche!== null"
                          type="button"
                          style="margin: 10px"
                          class="btn btn-primary"
                          data-toggle="modal"
                          data-target="#modalCart3"
                        >
                        <i class="fa fa-file-pdf-o"  > </i>
                           recherche  
                        </button>
                      </div>

                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title mt-5">General Info</h3>
                        <div class="table-responsive">
                          <table class="table table-striped table-product">
                            <tbody>
                              <tr>
                                <td width="390">Entreprise</td>
                                <td>{{ item.entreprise.nom }}</td>
                              </tr>
                              <tr>
                                <td>Etablissement</td>
                                <td>{{ item.etablisement.nom }}</td>
                              </tr><tr>
                                <td>Encadreur</td>
                                <td>{{ item.encadreur.nom }}</td>
                              </tr>
                              <tr>
                                <td>Nombre des pages</td>
                                <td>{{ item.nbpages }}</td>
                              </tr>
                              <tr>
                                <td>Critere</td>
                                <td>{{ item.critere.nom }}</td>
                              </tr>
                              <tr>
                                <td>Date de demande</td>
                                <td>{{ formatDate(item.created_at) }}</td>
                              </tr>
                            </tbody>
                          </table>
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
                    <!-- modal1 -->
                    <div
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
                              pdf file
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
                                'http://localhost:8000/storage/files/demandes/pdf/' +
                                item.fichierpdf
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
                     <!-- modal2 -->
                    <div
                      class="modal fade"
                      id="modalCart1"
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
                              demande file
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
                                'http://localhost:8000/storage/files/demandes/demande/' +
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
                     <!-- modal3 -->
                    <div
                      class="modal fade"
                      id="modalCart2"
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
                              brevet file
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
                                'http://localhost:8000/storage/files/demandes/fichierbrevet/' +
                                item.fichierbrevet
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
                     <!-- modal4 -->
                    <div
                      class="modal fade"
                      id="modalCart3"
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
                              recherche file
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
                                'http://localhost:8000/storage/files/demandes/fichierrecherche/' +
                                item.fichierrecherche
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
  </div>
</template>

<script>
import axios from "axios";
import sidebarComponent from "@/components/Admin/sidebaradmin.vue";
import topbarComponent from "@/components/Admin/topbar.vue";
import swal from 'sweetalert';

export default {
  props: ["id"],
  name: "demandedepotdetailsComponent",
  components: {
    sidebarComponent,
    topbarComponent,
  },
  data() {
    return {
      info: null,
      dmande_id: this.$route.params.id,
      test: "",
      values: {
        id: this.$route.params.id,
      },
    };
  },
  methods: {
    formatDate(dateString) {
      const date = new Date(dateString);
      // Then specify how you want your dates to be formatted
      return new Intl.DateTimeFormat("default", { dateStyle: "long" }).format(
        date
      );
    },
    edit(id) {
      this.$router.push({
        name: "profile",
        params: { id: id },
      });
    },
         accepter(id) {
         swal({
  title: "Are you sure?",
  text: " accepter cette demande ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
 axios.post('http://127.0.0.1:8000/api/DemandeDepotaccept/'+id);
     
      
    swal("demande acceptée ", {
      icon: "success",
    });
    window.location.reload();
  } else {
    swal("demande non acceptée");
  }
});
     
    },
    refuser(id) {
          swal({
  title: "Are you sure?",
  text: " refuser cette demande ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
axios.post('http://127.0.0.1:8000/api/DemandeDepotrefuse/'+id);
     
     
      
    swal("demande refusée ", {
      icon: "success",
    });
    window.location.reload();
  } else {
    swal("demande non refusée");
  }
});
     
    },
  },
  async mounted() {
    const res = axios.get(
      "http://127.0.0.1:8000/api/DemandeDepotDetails/" + this.$route.params.id
    );
    this.values = (await res).data;
    axios
      .get(
        "http://127.0.0.1:8000/api/DemandeDepotDetails/" + this.$route.params.id
      )
      .then((response) => (this.info = response.data));
    this.test = this.info;
  },
};
</script>

<style>
</style>