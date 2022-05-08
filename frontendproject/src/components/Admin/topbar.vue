<template>
  <div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="full">
        <button type="button" id="sidebarCollapse" class="sidebar_toggle">
          <i class="fa fa-bars"></i>
        </button>
        <div class="logo_section">
          <router-link class="nav-link" to="/Admin">
            <img
              class="img-responsive"
              src="../../assets/images/logo/logo.png"
              alt="#"
            />
          </router-link>
        </div>
        <div class="right_topbar">
          <div class="icon_info">
            <ul class="user_profile_dd">
              <li>
                <a class="dropdown-toggle" data-toggle="dropdown"
                  ><span class="name_user"
                    >notifications <i class="fa fa-bell"></i></span
                ></a>
                <div class="dropdown-menu">
                  <div
                    class="dropdown-item"
                    
                    v-bind:key="item.id"
                    v-for="item in info"
                  >
                  <button
                                    type="button"
                                    class="btn btn-success"
                                    @click="redirect(item.titre)"
                                  >
                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <h6>
                       
                      {{ item.titre }}
                    </h6>
                    <h6>{{ item.content }}</h6>
                                  </button>
                   

                   
                  </div>
                </div>
              </li>
            </ul>
            <ul class="user_profile_dd">
              <li>
                <a class="dropdown-toggle" data-toggle="dropdown"
                  ><img
                    class="img-responsive rounded-circle"
                    v-bind:src="
                      'http://localhost:8000/storage/files/register/profilepic/' +
                      profilepic
                    "
                    alt="#"
                  /><span class="name_user"
                    >{{ prenom }} {{ username }}</span
                  ></a
                >
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="profile.html">My Profile</a>
                  <a class="dropdown-item" href="settings.html">Settings</a>
                  <a class="dropdown-item" href="help.html">Help</a>
                  <a class="dropdown-item" @click="logout()"
                    ><span>Log Out</span> <i class="fa fa-sign-out"></i
                  ></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
import axios from "axios";
import swal from "sweetalert";

export default {
  name: "topbarComponent",
  data() {
    return {
      username: localStorage.getItem("name"),
         info: null,
      profilepic: localStorage.getItem("profilepic"),

      prenom: localStorage.getItem("prenom"),
    };
  },
  mounted() {
    console.log(localStorage.getItem("name"));

    axios
      .get("http://127.0.0.1:8000/api/Notification/Admin" )
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
     redirect(titre) {
       if(titre == "Compte"){
this.$router.push("/etudiantsenattente");
       }
       if(titre == "Demande depot"){
this.$router.push("/demandesdepot");
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
