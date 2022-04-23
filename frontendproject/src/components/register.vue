<template>
  <navbar-component />
  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h3>GET ONLINE COURSES FOR FREE</h3>
            <p>
              Create your free account now and get immediate access to 100s of
              online courses
            </p>
            <router-link to="/login"> LOGIN NOW</router-link>
          </div>
        </div>
        <div class="col-md-6">
          <div class="login_form">
            <h5>REGISTER NOW</h5>
            <form action="" @submit.prevent="onCreate">
              <input type="text" placeholder="Nom" v-model="nom" />
              <input type="text" placeholder="Prenom" v-model="prenom" />
              <input type="email" placeholder="Email" v-model="email" />
              <input
                type="password"
                class="message-box"
                placeholder="password"
                v-model="password"
              />
              <input
                type="password"
                class="message-box"
                placeholder="confirm password"
                v-model="password_confirmation"
              />
              <input
                type="text"
                class="message-box"
                placeholder="phone +216"
                v-model="phone"
              />
              <div>
                <label for=""> Etablisement </label>
                <select
                  class="form-select"
                  aria-label="Default select example"
                  v-model="selectedEtablisement"
                >
                  <option
                    v-bind:key="etablisement.id"
                    v-bind:value="etablisement.id"
                    v-for="etablisement in etablisements"
                  >
                    {{ etablisement.nom }}
                  </option>
                </select>
               
              </div>
              <label for=""> profile pic</label>
              <input class="form-control" type="file" @change="onchange" />
              <label for=""> fichier demande</label>
              <input class="form-control" type="file" @change="onchange1" />

              <button type="submit">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer-component />
</template>

<script>
import axios from "axios";
import NavbarComponent from "@/components/navbar.vue";
import FooterComponent from "@/components/footer.vue";
export default {
  name: "registerComponent",
  components: {
    NavbarComponent,
    FooterComponent,
  },
  data() {
    return {
      selectedEtablisement: 0,
      etablisements: null,
      phone: "",
      password_confirmation: "",
      nom: "",
      prenom: "",
      email: "",
      password: "",
      file: null,
      file1: null,
      responsevalue:""
    };
  },
  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/Etablisement")
      .then((response) => (this.etablisements = response.data));
  },
  methods: {
    onchange(e) {
      this.file = e.target.files[0];
    },
    onchange1(e) {
      this.file1 = e.target.files[0];
    },

    onCreate() {
      let data = new FormData();
      data.append("name", this.nom);
      data.append("prenom",this.prenom);
      data.append("email", this.email);
      data.append("password", this.password);
      data.append("password_confirmation", this.password_confirmation);
      data.append("tel", this.phone);
      data.append("profilepic", this.file);
      data.append("fichierdemande", this.file1);
      data.append("etablisement_id", this.selectedEtablisement);

      axios({
        headers: { "Content-Type": "multipart/form-data" },
        method: "post",
        url: "http://127.0.0.1:8000/api/register",
        data: data,
      })
        .then((response) => {
          console.log("response", response.data);
          
        })
        .catch((err) => console.log(err));
          this.$router.push('/login');
    },
  },
};
</script>

<style>
</style>