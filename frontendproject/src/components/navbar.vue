<template>
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container navbar-light">
        <a class="navbar-brand" href="index.html">
          <span> Natone </span>
        </a>

        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div
            class="d-flex mx-auto flex-column flex-lg-row align-items-center"
          >
            <ul class="navbar-nav">
              <li class="nav-item active">
                <router-link class="nav-link" to="/">
                  home <span class="sr-only">(current)</span></router-link
                >
              </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/about"> about </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/encadreurs"> Encadreurs </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/memoire">
                  Memoire
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/contactus">
                  Contact us
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  v-if="username === null"
                  class="nav-link"
                  to="/login"
                >
                  login
                </router-link>
              </li>
             
              <li class="nav-item" v-if="username !== null">
                <div class="dropdown show">
                  <a
                    class="nav-link nav-item"
                    href="#"
                    role="button"
                    id="dropdownMenuLink"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    {{ username + "  " + prenom }}&nbsp;&nbsp;<i
                      class="fa fa-user"
                    ></i>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#"
                      ><i class="fa fa-home"></i>&nbsp;&nbsp; Acceuil</a
                    >
                     <router-link class="dropdown-item" :to="'/myprofile/' + id">
                      <i class="fa fa-user"></i>&nbsp;&nbsp; Profile
                    </router-link>
                    <router-link class="dropdown-item" to="/mesemprunts">
                      <i class="fa fa-history"></i>&nbsp;&nbsp; Mes Emprunts
                    </router-link>
                    <router-link class="dropdown-item" to="/mesemprunts">
                      <i class="fa fa-cloud-upload"></i>&nbsp;&nbsp; Mes
                      Demandes d'emprunt
                    </router-link>
                    <router-link class="dropdown-item" to="/mesemprunts">
                      <i class="fa fa-cloud-download"></i>&nbsp;&nbsp; Mes
                      Demandes de depot
                    </router-link>

                    <a class="dropdown-item" @click="logout()"
                      ><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log Out</a
                    >
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
</template>

<script>
import axios from "axios";
import swal from 'sweetalert';

export default {
  name: "NavbarComponent",
  data() {
    return {
      username: localStorage.getItem("name"),

      prenom: localStorage.getItem("prenom"),
    };
  },
  mounted() {
    console.log(localStorage.getItem("name"));
  },
  methods: {
    logout() {
      swal({
  title: "Are you sure?",
  text: " you will Logout!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    localStorage.clear();
      axios.post("http://127.0.0.1:8000/api/logout");
      
    swal("you are loged out!", {
      icon: "success",
    });
    this.$router.push("/login");
  } else {
    swal("You are not loged out");
  }
});
      
    },
  },
};
</script>

<style>
</style>