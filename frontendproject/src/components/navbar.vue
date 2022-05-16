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
                <router-link class="nav-link" to="/encadreurs">
                  Encadreurs
                </router-link>
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

              <li class="zz" v-if="username !== null">
              <div class="dropdown show">
                  <a
                    class="zz nav-item"
                    href="#"
                    role="button"
                    id="dropdownMenuLink"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >notifications
                    <i class="fa fa-bell"></i>
                    <span v-if="nb >0" class="badge" style="color:black;">{{nb}}</span>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                   
                    
                  <div class="dropdown-item" v-bind:key="item.id" style="width:600px;border-bottom:0.05px solid;" v-for="item in info"> 
                    <a class="dropdown-item" @click="redirect(item.titre,item.id)">
                      <h6><i class="fa fa-info-circle" aria-hidden="true"></i> {{item.titre}} </h6>  <h8 style="width:50px;">{{item.content}}</h8> 
                    </a> 
                  

                  </div>
                  <div class="notification-footer" style="height:35px">
                <router-link class="nav-link" to="/mesnotif">
                  <h7 style="color:red">
                    View all
                    <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                  </h7>
                </router-link>
              </div>
                  </div>
                </div>
              </li>
              <li class=" zz nav-item" v-if="username !== null">
                <div class="dropdown show">
                  <a
                    class="zz nav-item"
                    href="#"
                    role="button"
                    id="dropdownMenuLink"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    {{ prenom + "  " + username }}&nbsp;&nbsp;<i
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
import swal from "sweetalert";

export default {
  name: "NavbarComponent",
  data() {
    return {
      username: localStorage.getItem("name"),
      info: null,
      nb: null,
      id:localStorage.getItem("id"),
      prenom: localStorage.getItem("prenom"),
    };
  },
  mounted() {
    console.log(localStorage.getItem("name"));
 axios
      .get("http://127.0.0.1:8000/api/Notificationnotviewed/"+this.id )
      .then((response) => (this.nb = response.data));

    axios
      .get("http://127.0.0.1:8000/api/Notification/User/"+this.id )
      .then((response) => (this.info = response.data));
  },
  methods: {
    logout() {
      swal({
        title: "Are you sure?",
        text: " you will Logout!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
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
    redirect(titre,id) {
      axios.post('http://127.0.0.1:8000/api/Notificationviewed/'+id);
       if(titre == "Demande depot"){
this.$router.push("/mesdemandes");
       }
        if(titre == "Demande emprunt"){
this.$router.push("/mesemprunts");
       }
        if(titre == "Demande emprunt"){
this.$router.push("/historyprofile");
       }
    
     
    },
  },
};
</script>

<style>
</style>