<template><div >
  <sidebar-component /><topbar-component /><br><br><br>
  <div class="full_container" style="width: 80%; margin-left: 21%">
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
                  <h2>Etablissements et Encadreurs</h2>
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
                      <h2>Domaines</h2>
                    </div>
                  </div>
                  <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Nom</th>
                            <th>Criteres</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-bind:key="item.id" v-for="item in info">
                            <td>{{ item.nom }}</td>
                            <td>
                              <span
                                class="y"
                                v-bind:key="item2.id"
                                v-for="item2 in item.criteres"
                                >{{ item2.nom }}&nbsp;&nbsp;&nbsp;</span
                              >
                            </td>
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
                      <h2>Ajout des domaines et des criteres</h2>
                    </div>
                  </div>

                  <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                      <form @submit.prevent="onCreate">
                        <div class="form-group">
                          <h6 for="disabledTextInput">
                            Ajouter un nouveau domaine
                          </h6>

                          <div class="input-group mb-3 input-group-lg">
                            <input
                              v-model="nom"
                              type="text"
                              class="form-control"
                              aria-label="Sizing example input"
                              placeholder="Nom de domaine"
                              aria-describedby="inputGroup-sizing-default"
                            />
                            <button type="submit" class="btn btn-warning">
                              Ajouter
                            </button>
                          </div>
                        </div>
                      </form>
                      <br /><br />
                      <form @submit.prevent="onCreate2">
                        <div class="form-group">
                          <h5>Ajouter un nouveau critere a un domaine</h5>

                          <div class="input-group mb-3 input-group-lg">
                            <input
                              v-model="nom2"
                              type="text"
                              class="form-control"
                              aria-label="Sizing example input"
                              placeholder="Nom de Critere"
                              aria-describedby="inputGroup-sizing-default"
                            />
                          </div>

                          <h6 for="validationCustom03">Domaine</h6>
                          <div class="input-group mb-3 input-group-lg">
                            <select
                              class="form-select"
                              aria-label="Default select example"
                              v-model="selectedDomaine"
                            >
                              <option
                                v-bind:key="domaine.id"
                                v-bind:value="domaine.id"
                                v-for="domaine in info"
                              >
                                {{ domaine.nom }}
                              </option>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-warning">
                            Ajouter
                          </button>
                        </div>
                      </form>
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
              <p>
                Copyright © 2018 Designed by html.design. All rights reserved.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
  </div></div>
</template>

<script>
import axios from "axios";
import sidebarComponent from "@/components/Admin/sidebaradmin.vue";
import topbarComponent from "@/components/Admin/topbar.vue";
export default {
  name: "domainecritereComponent",
  components: {
    sidebarComponent,
    topbarComponent,
  },
  data() {
    return {
      info: null,
      info2: null,
      nom: "",
      prenom: "",
      selectedDomaine: 0,
      nom2: "",
      ville: "",
      adresse: "",
    };
  },
  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/Domaine")
      .then((response) => (this.info = response.data));
    axios
      .get("http://127.0.0.1:8000/api/Critere")
      .then((response) => (this.info2 = response.data));
  },
  methods: {
    onCreate() {
      axios
        .post("http://127.0.0.1:8000/api/Domaine", { nom: this.nom })
        .then((response) => {
          if (response.status === 201) {
            window.location.reload();
          }
        });
    },
    onCreate2() {
      axios
        .post("http://127.0.0.1:8000/api/Critere", {
          nom: this.nom2,
          domaine_id: this.selectedDomaine,
        })
        .then((response) => {
          if (response.status === 201) {
            window.location.reload();
          }
        });
    },
  },
};
</script>

<style>
</style>