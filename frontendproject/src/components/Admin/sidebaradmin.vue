<template>
 <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="../../assets/images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" v-bind:src="'http://localhost:8000/storage/files/register/profilepic/'+profilepic" alt="#" /></div>
                        <div class="user_info">
                           <h6> {{prenom}} {{username}} </h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                   <li><router-link  class="nav-link" to="/Admin">dashboard  </router-link></li> 

                        </ul>
                     </li>
                     <li><router-link  class="nav-link" to="/memoireadmin"><i class="fa fa-book  red_color"></i> <span>Mémoires </span></router-link></li>
                     <li><router-link  class="nav-link" to="/demandesdepot"><i class="fa fa-cloud -upload green_color"></i> <span>Demandes de dépôt </span></router-link></li>
  <li><router-link  class="nav-link" to="/demandesemprunt"><i class="fa fa-cloud -upload blue_color"></i> <span>Demandes d'emprunts </span></router-link></li>
 <li>
                        <router-link  class="nav-link" to="/etudiants">
                        <i class="fa fa-users red_color"></i> <span>Etudiants</span></router-link>
                     </li>
                     <li><router-link  class="nav-link" to="/etabetencad"><i class="fa fa-table purple_color2"></i> <span>Etablissement et Encadreur</span></router-link></li>
                     <li><router-link  class="nav-link" to="/domainecritere"><i class="fa fa-table purple_color2"></i> <span>Domaines et Criteres</span></router-link></li>

                     <li><router-link  class="nav-link" to="/Notificationsadmin"><i class="fa fa-bell"></i> <span>Notifications</span></router-link></li>
 <li><router-link  class="nav-link" to="/etudiantsenattente"><i class="fa fa-user-o yellow_color"></i> <span>Etudiants en attente</span></router-link></li>

                     <li><router-link  class="nav-link" to="/historiquesemprunt"><i class="fa fa-clock-o orange_color"></i> <span>Historique D'emprunt</span> </router-link></li>
                    
                   
                     <li><router-link  class="nav-link" to="/charts"><i class="fa fa-bar-chart-o green_color"></i> <span>Diagrammes</span></router-link></li>
                    </ul>
               </div>
            </nav>
</template>

<script>
export default {
name: 'sidebaradminComponent', data() {
    return {
      username: localStorage.getItem("name"),
      profilepic: localStorage.getItem("profilepic"),

      prenom: localStorage.getItem("prenom"),
    };
  },
}
</script>

<style>

</style>