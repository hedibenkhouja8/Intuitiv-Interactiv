<template>
  <div>
    <navbar-component />
    <div class="wrapper d-flex align-items-stretch">
      <sidebar-component />
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="row">
          <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
              <div class="full graph_head">
                <div class="heading1 margin_0">
                  <h2>Mes notifications</h2>
                  <br />
                  <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" @click="all()">All</a>
                      </li>

                      <li class="page-item">
                        <a class="page-link" @click="notview()"
                          >Not viewed
                          <span v-if="nb > 0" style="color: black">{{
                            nb
                          }}</span></a
                        >
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="table_section padding_infor_info" v-if="etat == 'all' ">
                <ul>
                   <li
        v-bind:key="item.id"
        v-for="item in info2"
        style="width: 800px; border-bottom: 0.05px solid; background-color: #E6E6FA;"
      >
        <a class="dropdown-item" @click="redirect(item.titre, item.id)">
          <h4>
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            {{ item.titre }}
          </h4>
          <h8 style="width: 50px">{{ item.content }}</h8>
        </a>
      </li>
                  <li
                    v-bind:key="item.id"
                    v-for="item in info"
                    style="width: 800px; border-bottom: 0.05px solid"
                  >
                    <a
                      class="dropdown-item"
                      @click="redirect(item.titre, item.id)"
                    >
                      <h4>
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        {{ item.titre }}
                      </h4>
                      <h8 style="width: 50px">{{ item.content }}</h8>
                    </a>
                  </li>
                </ul>
              </div>
              <notviewed-component v-if="etat == 'notviewed' "/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NavbarComponent from "@/components/navbar.vue";
import sidebarComponent from "@/components/sidebar.vue";
import notviewedComponent from "@/components/notviewednotif.vue";

import axios from "axios";
export default {
  name: "mesnotifComponent",
  components: {
    NavbarComponent,
    sidebarComponent,
    notviewedComponent,
  },
  data() {
    return {
      username: localStorage.getItem("name"),
      info: null,
      info2: null,
      nb: null,
      id: localStorage.getItem("id"),
      etat: "all",
      prenom: localStorage.getItem("prenom"),
    };
  },
  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/Notificationnotviewed/" + this.id)
      .then((response) => (this.nb = response.data));
  axios
      .get("http://127.0.0.1:8000/api/Notificationnotviewedlist/" + this.id)
      .then((response) => (this.info2 = response.data));
    axios
      .get("http://127.0.0.1:8000/api/Notification/Userall/" + this.id)
      .then((response) => (this.info = response.data));
  },
  methods: {
    redirect(titre, id) {
      axios.post("http://127.0.0.1:8000/api/Notificationviewed/" + id);
      if (titre == "Demande depot") {
        this.$router.push("/mesdemandes");
      }
      if (titre == "Demande emprunt") {
        this.$router.push("/mesemprunts");
      }
      if (titre == "Demande emprunt") {
        this.$router.push("/historyprofile");
      }
    },
    all() {
      this.etat = "all";
    },
    notview() {
      this.etat = "notviewed";
    },
  },
};
</script>

<style>
</style>