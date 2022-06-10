<template>
  <div class="table_section padding_infor_info">
    <span v-if="nb == 0" style="color: blue"
      >tous les notifications sont deja vus
    </span>
    <ul>
      <li
        v-bind:key="item.id"
        v-for="item in info"
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
    </ul>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "notviewedComponent",

  data() {
    return {
      username: localStorage.getItem("name"),
      info: null,
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