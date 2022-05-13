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
                    <h2>Notifications Page</h2>
                  </div>
                </div>
              </div>
              <!-- row -->
              <div class="row">
                <!-- table section -->
                <div class="col-md-12">
                  <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                      <div class="heading1 margin_0">
                        <h2>Notifications Box</h2>
                        <br />
                        <nav aria-label="...">
                          <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" @click="all()">All</a>
                            </li>

                            <li class="page-item">
                              <a class="page-link" @click="notview()"
                                >Not viewed
                                <span
                                  v-if="nb > 0"
                                 
                                  style="color: black"
                                  >{{ nb }}</span
                                ></a
                              >
                            </li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                    <div class="full inbox_inner_section">
                      <div class="row"  v-if="etat == 'all' ">
                        
                        <div class="col-md-12">
                          <div class="full padding_infor_info">
                            <div class="mail-box">
                              <h6>all notifications</h6>
                              <br>
                              <ul>
                                <li v-bind:key="item.id" v-for="item in info">
                                  <a
                                    class="content"
                                    @click="redirect(item.titre, item.id ,item.demande_id ,item.user_id)"
                                  >
                                    <div class="notification-item">
                                      <h4 class="item-title">
                                        <i
                                          class="fa fa-info-circle"
                                          aria-hidden="true"
                                        ></i
                                        >{{ item.titre }}
                                      </h4>
                                      <p class="item-info">
                                        {{ item.content }}
                                      </p>
                                    </div>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <notviewednotif-component v-if="etat == 'notviewed' " />
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
    </div>
  </div>
</template>

<script>
import sidebarComponent from "@/components/Admin/sidebaradmin.vue";
import topbarComponent from "@/components/Admin/topbar.vue";
import notviewednotifComponent from "@/components/Admin/notviewednotif.vue";

import axios from "axios";
export default {
  name: "notifComponent",

  components: {
    sidebarComponent,
    topbarComponent,
    notviewednotifComponent
  },
  data() {
    return {
      info: null,
      nb: null,
      etat:"all",
    };
  },
  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/Notificationnotviewedadmin")
      .then((response) => (this.nb = response.data));
    axios
      .get("http://127.0.0.1:8000/api/Notification/allAdmin")
      .then((response) => (this.info = response.data));
  },
  methods: {
    redirect(titre, id , demande_id ,user_id) {
      axios.post("http://127.0.0.1:8000/api/Notificationviewed/" + id);
      if (titre == "Compte") {
        this.$router.push("/etudiantsenattente");
      }
      if (titre == "Demande depot") {
        this.$router.push({
        name: "Demandedepotdetails",
        params: { id: demande_id },
      });
        
      }
      if (titre == "Demande emprunt") {
        this.$router.push({
        name: "Demandeempruntdetails",
        params: { id: demande_id ,c:user_id},
      });
      }
    },
     all() {
     this.etat="all";
    },
    notview() {
     this.etat="notviewed";
    },
  },
};
</script>

<style>
</style>