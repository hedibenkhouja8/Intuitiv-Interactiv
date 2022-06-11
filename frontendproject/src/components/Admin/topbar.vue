<template>
  <div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="full">
        <button type="button" id="sidebarCollapse" class="sidebar_toggle">
          <i class="fa fa-bars"></i>
        </button>
        <div class="logo_section">
          <router-link class="nav-link" to="/Admin">
         
          </router-link>
        </div>

        <div class="right_topbar">
          <div class="icon_info">
            <ul class="noti">
              <li></li>
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
                 
                  <a class="dropdown-item" @click="logout()"
                    ><span>Déconnexion</span> <i class="fa fa-sign-out"></i
                  ></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="noti_section">
          <div class="dropdown">
            <a
              id="dLabel"
              style="color: white"
              role="button"
              data-toggle="dropdown"
              data-target="#"
              href="/page.html"
            >
              notifications
              <i class="fa fa-bell"></i>
              <span  v-if="nb > 0" class="badge" style="color: white">{{
                nb
              }}</span>
            </a>

            <ul
              class="dropdown-menu notifications"
              style="width: 430px; margin-left: -200px; margin-top: 15px"
              role="menu"
              aria-labelledby="dLabel"
            >
              <div class="notification-heading">
                <h4 class="menu-title">Notifications</h4>
              </div>
              <li class="divider"></li>
              <div
                class="notifications-wrapper"
                v-bind:key="item.id"
                v-for="item in info"
              >
                <a class="content" @click="redirect(item.titre, item.id ,item.demande_depot_id,item.demande_emprunt_id  ,item.user_id)">
                  <div class="notification-item">
                    <h4 class="item-title">
                      <i class="fa fa-info-circle" aria-hidden="true"></i
                      >{{ item.titre }}
                    </h4>
                    <p class="item-info">{{ item.content }}</p>
                  </div>
                </a>
              </div>
              <li class="divider"></li>
              <div class="notification-footer">
                <router-link class="nav-link" to="/Notificationsadmin">
                  <h4 class="menu-title">
                    View all<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                  </h4>
                </router-link>
              </div>
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
      nb: null,
      prenom: localStorage.getItem("prenom"),
    };
  },
  mounted() {
    console.log(localStorage.getItem("name"));
axios
      .get("http://127.0.0.1:8000/api/Notificationnotviewedadmin")
      .then((response) => (this.nb = response.data));
    axios
      .get("http://127.0.0.1:8000/api/Notificationnotviewedadminlist")
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
  redirect(titre, id , demande_depot_id ,demande_emprunt_id,user_id) {
      axios.post("http://127.0.0.1:8000/api/Notificationviewed/" + id);
      if (titre == "Compte") {
        this.$router.push("/etudiantsenattente");
      }
      if (titre == "Demande depot") {
        this.$router.push({
        name: "Demandedepotdetails",
        params: { id: demande_depot_id },
      });
        
      }
      if (titre == "Demande emprunt") {
        this.$router.push({
        name: "Demandeempruntdetails",
        params: { id: demande_emprunt_id ,c:user_id},
      });
      }
    },
  },
};
</script>

<style>
/* CSS used here will be applied after bootstrap.css */
/* CSS used here will be applied after bootstrap.css */

.dropdown {
  display: inline-block;
  margin-left: 20px;
  padding: 10px;
}

.glyphicon-bell {
  font-size: 1.5rem;
}

.notifications {
  min-width: 420px;
}

.notifications-wrapper {
  overflow: auto;
  max-height: 250px;
}

.menu-title {
  color: blue;
  font-size: 1.5rem;
  display: inline-block;
}

.glyphicon-circle-arrow-right {
  margin-left: 10px;
}

.notification-heading,
.notification-footer {
  padding: 2px 10px;
}

.dropdown-menu.divider {
  margin: 5px 0;
}

.item-title {
  font-size: 1.3rem;
  color: #000;
}

.notifications a.content {
  text-decoration: none;
  background: #ccc;
}

.notification-item {
  padding: 10px;
  margin: 5px;
  background: #ccc;
  border-radius: 4px;
}

.noti_section {
  padding: 0;
  width: auto;
  text-align: center;
  background: transparent;
  float: right;
  margin-top: 15px;
  margin-right: -100px;
}
</style>
