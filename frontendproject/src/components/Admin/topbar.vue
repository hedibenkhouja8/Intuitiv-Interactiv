<template>
  <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                          <router-link  class="nav-link" to="/Admin">  <img class="img-responsive" src="../../assets/images/logo/logo.png" alt="#" /> </router-link>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" v-bind:src="'http://localhost:8000/storage/files/register/profilepic/'+profilepic" alt="#" /><span class="name_user">{{prenom}} {{username}}</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.html">My Profile</a>
                                       <a class="dropdown-item" href="settings.html">Settings</a>
                                       <a class="dropdown-item" href="help.html">Help</a>
                                       <a class="dropdown-item"  @click="logout()"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
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
import axios from 'axios'
import swal from 'sweetalert';

export default {
name: 'topbarComponent', data() {
    return {
      username: localStorage.getItem("name"),
      profilepic: localStorage.getItem("profilepic"),

      prenom: localStorage.getItem("prenom"),
    };
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
}

</script>

<style>

</style>
