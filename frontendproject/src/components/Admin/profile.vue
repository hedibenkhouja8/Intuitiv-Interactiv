<template>
  <div>
    <sidebar-component /><topbar-component /><br /><br /><br />
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
                    <h2>Profil</h2>
                  </div>
                </div>
              </div>
              <!-- row -->
              <div class="row column1">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                      <div class="heading1 margin_0">
                        <h2>Profil de l'utilisateur</h2>
                      </div>
                    </div>
                    <div
                      v-bind:key="item.id"
                      v-for="item in info"
                      class="full price_table padding_infor_info"
                    >
                      <div class="row">
                        <!-- user profile section -->
                        <!-- profile image -->
                        <div class="col-lg-12">
                          <div class="full dis_flex center_text">
                            <div class="profile_img">
                              <img
                                width="180"
                                class="rounded-circle"
                                v-bind:src="
                                  'http://localhost:8000/storage/files/register/profilepic/' +
                                  item.profilepic
                                "
                                alt="#"
                              />
                            </div>
                            <div class="profile_contant">
                              <div class="contact_inner">
                                <h3>
                                  {{ item.name }} {{ item.prenom }}&nbsp;<button
                                    v-if="item.etatdecompte === 'active'"
                                    @click="restreindre(item.id)"
                                    class="btn btn-warning"
                                  >
                                    Restreindre l'acces</button
                                  ><button
                                    @click="derestreindre(item.id)"
                                    class="btn btn-success"
                                    v-if="item.etatdecompte === 'restreint'"
                                  >
                                    Renouveler accés
                                  </button>
                                </h3>
                                <p>
                                  <strong>Etablissement: </strong
                                  >{{ item.etablisement.nom }}
                                </p>
                                <ul class="list-unstyled">
                                  <li>
                                    <i class="fa fa-envelope-o"></i> :
                                    {{ item.email }}
                                  </li>
                                  <li>
                                    <i class="fa fa-phone"></i> {{ item.tel }}
                                  </li>
                                </ul>
                                <p>
                                  <strong
                                    >Nombre de demandes d'emprunts: </strong
                                  >{{ nb }}
                                </p>
                              </div>
                              <div class="user_progress_bar">
                                <div class="progress_bar">
                                  <!-- Skill Bars -->
                                  <span class="skill" style="width: 85%"
                                    >Emprunts accepté<span class="info_valume"
                                      >{{
                                        ((accepte * 100) / nb).toFixed(2)
                                      }}%</span
                                    ></span
                                  >
                                  <div class="progress skill-bar">
                                    <div
                                      class="
                                        progress-bar
                                        progress-bar-animated
                                        progress-bar-striped
                                      "
                                      role="progressbar"
                                      aria-valuenow="85"
                                      aria-valuemin="0"
                                      aria-valuemax="100"
                                      :style="{
                                        width: (accepte * 100) / nb + '%',
                                      }"
                                    ></div>
                                  </div>
                                  <span class="skill" style="width: 78%"
                                    >Emprunt en Attente<span class="info_valume"
                                      >{{
                                        (
                                          ((nb - (accepte + refus)) * 100) /
                                          nb
                                        ).toFixed(2)
                                      }}%</span
                                    ></span
                                  >
                                  <div class="progress skill-bar">
                                    <div
                                      class="
                                        progress-baratt
                                        progress-bar-animated
                                        progress-bar-striped
                                      "
                                      role="progressbar"
                                      aria-valuenow="78"
                                      aria-valuemin="0"
                                      aria-valuemax="100"
                                      :style="{
                                        width:
                                          ((nb - (accepte + refus)) * 100) /
                                            nb +
                                          '%',
                                      }"
                                    ></div>
                                  </div>
                                  <span class="skill" style="width: 47%"
                                    >Emprunt Refusé
                                    <span class="info_valume"
                                      >{{
                                        ((refus * 100) / nb).toFixed(2)
                                      }}%</span
                                    ></span
                                  >
                                  <div class="progress skill-bar">
                                    <div
                                      class="
                                        progress-barref
                                        progress-bar-animated
                                        progress-bar-striped
                                      "
                                      role="progressbar"
                                      aria-valuenow="54"
                                      aria-valuemin="0"
                                      aria-valuemax="100"
                                      :style="{
                                        width: (refus * 100) / nb + '%',
                                      }"
                                    ></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- profile contant section -->
                          <div class="full inner_elements margin_top_30">
                            <div class="tab_style2">
                              <div class="tabbar">
                                <nav>
                                  <div
                                    class="nav nav-tabs"
                                    id="nav-tab"
                                    role="tablist"
                                  >
                                    <a
                                      class="nav-item nav-link active"
                                      id="nav-home-tab"
                                      data-toggle="tab"
                                      href="#recent_activity"
                                      role="tab"
                                      aria-selected="true"
                                    >
                                      Emprunts</a
                                    >
                                    <a
                                      class="nav-item nav-link"
                                      id="nav-profile-tab"
                                      data-toggle="tab"
                                      href="#project_worked"
                                      role="tab"
                                      aria-selected="false"
                                      >Demandes de depot</a
                                    >
                                    <a
                                      class="nav-item nav-link"
                                      id="nav-contact-tab"
                                      data-toggle="tab"
                                      href="#profile_section"
                                      role="tab"
                                      aria-selected="false"
                                      >Memoires</a
                                    >
                                  </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                  <div
                                    class="tab-pane fade show active"
                                    id="recent_activity"
                                    role="tabpanel"
                                    aria-labelledby="nav-home-tab"
                                  >
                                    <div class="msg_list_main">
                                      <ul class="msg_list">
                                        <li
                                          v-bind:key="item.id"
                                          v-for="item in emprunts"
                                        >
                                          <span>
                                            <span class="name_user">{{
                                              item.memoire.demande_depot.titre
                                            }}</span
                                            ><br />
                                            <span class="msg_user">{{
                                              item.description
                                            }}</span>
                                            <span class="time_ago"
                                              >{{ item.status }}
                                              <button
                                                type="button"
                                                class="btn"
                                                @click="
                                                  details(item.id, item.user_id)
                                                "
                                              >
                                                <i
                                                  class="
                                                    fa fa-share
                                                    green_color
                                                  "
                                                >
                                                </i></button
                                            ></span>
                                          </span>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                  <div
                                    class="tab-pane fade"
                                    id="project_worked"
                                    role="tabpanel"
                                    aria-labelledby="nav-profile-tab"
                                  >
                                    <div class="msg_list_main">
                                      <ul class="msg_list">
                                        <li
                                          v-bind:key="item.id"
                                          v-for="item in demandedepots"
                                        >
                                          <span>
                                            <span class="name_user">{{
                                              item.titre
                                            }}</span>
                                            <span class="msg_user">{{
                                              item.description
                                            }}</span>
                                            <span class="time_ago"
                                              >{{ item.status }}
                                              <button
                                                type="button"
                                                class="btn"
                                                @click="edit(item.id)"
                                              >
                                                <i
                                                  class="
                                                    fa fa-share
                                                    green_color
                                                  "
                                                >
                                                </i></button
                                              ><br
                                            /></span>
                                          </span>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                  <div
                                    class="tab-pane fade"
                                    id="profile_section"
                                    role="tabpanel"
                                    aria-labelledby="nav-contact-tab"
                                  >
                                    <div class="msg_list_main">
                                      <ul class="msg_list">
                                        <li
                                          v-bind:key="item.id"
                                          v-for="item in acceptedemandedepots"
                                        >
                                          <div
                                            class="card mb-3"
                                            style="max-width: 8000px"
                                          >
                                            <div class="row g-0">
                                              <div class="col-md-4">
                                                <img
                                                  v-bind:src="
                                                    'http://localhost:8000/storage/files/demandes/cover/' +
                                                    item.coverimage
                                                  "
                                                  width="100"
                                                  height="200"
                                                  class="
                                                    img-fluid
                                                    rounded-start
                                                  "
                                                  alt="..."
                                                />
                                              </div>
                                              <div class="col-md-8">
                                                <div class="card-body">
                                                  <h5 class="card-title">
                                                    {{ item.titre }}
                                                    <button
                                                      type="button"
                                                      class="btn"
                                                      @click="
                                                        detailsmemoires(
                                                          item.memoire.id,
                                                          item.user_id
                                                        )
                                                      "
                                                    >
                                                      <i
                                                        class="
                                                          fa fa-share
                                                          green_color
                                                        "
                                                      >
                                                      </i>
                                                    </button>
                                                  </h5>
                                                  <p class="card-text">
                                                    {{ item.description }}
                                                  </p>
                                                  <p class="card-text">
                                                    <small class="text-muted"
                                                      >Deposé le :{{
                                                        formatDate(
                                                          item.created_at
                                                        )
                                                      }}</small
                                                    >
                                                  </p>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- end user profile section -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2"></div>
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
import sidebarComponent from "@/components/Admin/sidebaradmin.vue";
import topbarComponent from "@/components/Admin/topbar.vue";
import swal from 'sweetalert';

import axios from "axios";
export default {
  name: "profileComponent",
  components: {
    sidebarComponent,
    topbarComponent,
  },
  data() {
    return {
      info: null,
      emprunts: null,
      demandedepots: null,
      acceptedemandedepots: null,
      nb: null,
      refus: null,
      accepte: null,
    };
  },
  async mounted() {
    axios
      .get("http://127.0.0.1:8000/api/User/" + this.$route.params.id)
      .then((response) => (this.info = response.data));
    axios
      .get(
        "http://127.0.0.1:8000/api/User/" +
          this.$route.params.id +
          "/DemandeEmprunt"
      )
      .then((response) => (this.emprunts = response.data));
    axios
      .get(
        "http://127.0.0.1:8000/api/User/" +
          this.$route.params.id +
          "/DemandeDepot"
      )
      .then((response) => (this.demandedepots = response.data));
    axios
      .get(
        "http://127.0.0.1:8000/api/User/" +
          this.$route.params.id +
          "/AccepteDemandeDepot"
      )
      .then((response) => (this.acceptedemandedepots = response.data));
    axios
      .get(
        "http://127.0.0.1:8000/api/MemoireDeMemeDomaine/" + this.$route.params.c
      )
      .then((response) => (this.dom = response.data));
    axios
      .get(
        "http://127.0.0.1:8000/api/User/" +
          this.$route.params.id +
          "/DemandeEmprunt"
      )
      .then((response) => (this.nb = response.data.length));
    axios
      .get(
        "http://127.0.0.1:8000/api/User/" +
          this.$route.params.id +
          "/nbEmpruntparUserRefuse"
      )
      .then((response) => (this.refus = response.data.length));

    axios
      .get(
        "http://127.0.0.1:8000/api/User/" +
          this.$route.params.id +
          "/nbEmpruntparUserAccepte"
      )
      .then((response) => (this.accepte = response.data.length));
  },
  methods: {
    restreindre(id) {
               swal({
  title: "Are you sure?",
  text: " restreindre l'acces de cet etudiant ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      axios.post("http://127.0.0.1:8000/api/restreindre/" + id);
      swal(" l'acces restreindre ", {
      icon: "success",
    });
    window.location.reload();
  } else {
    swal("l'acces non restreindre");
  }
});
     
    },
    derestreindre(id) {
                 swal({
  title: "Are you sure?",
  text: " Renouveler accés ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      axios.post("http://127.0.0.1:8000/api/derestrindre/" + id);
      swal(" Done", {
      icon: "success",
    });
    window.location.reload();
  } else {
    swal("not done");
  }
});
     
    },
    details(id, c) {
      this.$router.push({
        name: "Demandeempruntdetails",
        params: { id: id, c: c },
      });
    },
    detailsmemoires(id, c) {
      this.$router.push({
        name: "memoireadmindetail",
        params: { id: id, c: c },
      });
    },
    edit(id) {
      this.$router.push({
        name: "Demandedepotdetails",
        params: { id: id },
      });
    },
    formatDate(dateString) {
      const date = new Date(dateString);
      // Then specify how you want your dates to be formatted
      return new Intl.DateTimeFormat("default", { dateStyle: "long" }).format(
        date
      );
    },
  },
};
</script>

<style>
</style>