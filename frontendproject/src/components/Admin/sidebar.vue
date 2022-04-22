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
                        <div class="user_img"><img class="img-responsive" src="../../assets/images/layout_img/user_img.jpg" alt="#" /></div>
                        <div class="user_info">
                           <h6>John David</h6>
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
                     <li><router-link  class="nav-link" to="/activity"><i class="fa fa-clock-o orange_color"></i> <span>activity</span> </router-link></li>
                     <li><router-link  class="nav-link" to="/demandesdepot"><i class="fa fa-cloud -upload green_color"></i> <span>Demandes de depot </span></router-link></li>
  <li><router-link  class="nav-link" to="/demandesemprunt"><i class="fa fa-cloud -upload blue_color"></i> <span>Demandes d'emprunts </span></router-link></li>

                     <li><router-link  class="nav-link" to="/table"><i class="fa fa-table purple_color2"></i> <span>Tables</span></router-link></li>

                     <li><router-link  class="nav-link" to="/email"><i class="fa fa-envelope-o yellow_color"></i> <span>Email</span></router-link></li>

                     <li>
                        <router-link  class="nav-link" to="/etudiants">
                        <i class="fa fa-users red_color"></i> <span>etudiants</span></router-link>
                     </li>
                   
                     <li><router-link  class="nav-link" to="/charts"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></router-link></li>
                     <li><router-link  class="nav-link" to="/settings"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></router-link></li>
                  </ul>
               </div>
            </nav>
</template>

<script>
export default {
name: 'sidebarComponent'
}
</script>

<style>

</style>