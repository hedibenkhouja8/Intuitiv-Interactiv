<template>
  <div class="wrapper1 d-flex1 align-items-stretch1">
			<nav id="sidebar1">
			
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(../assets/images/bg_1.jpg);">
	  			<div class="user-logo">
	  				<div class="img"><img width="100" class="rounded-circle" v-bind:src="'http://localhost:8000/storage/files/register/profilepic/'+profilepic" alt="#" /></div>
	  				<h3>{{username + "  " + prenom}} </h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active"> 
          </li>  <li><router-link  class="nav-link" :to="'/myprofile/'+ id"><i class="fa fa-book"></i> <span>Mes Emprunts</span></router-link></li>
                 <li><router-link  class="nav-link" to="/historyprofile"><i class="fa fa-history"></i> <span> Historique d'emprunt</span></router-link></li>
                 <li><router-link  class="nav-link" to="/mesdemandes"><i class="fa fa-cloud"></i> <span> Mes demandes de depot</span></router-link></li>
                 <li><router-link  class="nav-link" to="/adddemandedepot"><i class="fa fa-download"></i> <span> Deposer une memoire</span></router-link></li>
                 <li><router-link  class="nav-link" to="/historyprofile"><i class="fa fa-cog"></i> <span>Parametres</span></router-link></li>
                 
          
        
          <li>
            <a href="#"  @click="logout()"><span class="fa fa-sign-out "></span> Deconnecter </a>
           
          </li>
        </ul>

    	</nav>

        
     
		</div>
</template>

<script>
import axios from "axios";

export default {
name: 'sidebarComponent',
data() {
    return {
      username: localStorage.getItem("name"),

      prenom: localStorage.getItem("prenom"),
      id: localStorage.getItem("id"),
      profilepic: localStorage.getItem("profilepic")
    };
  },
   methods: {
    logout() {
      localStorage.clear();
      axios.post("http://127.0.0.1:8000/api/logout");
      this.$router.push("/login");
    },
  },
}

</script>

<style>
.rounded-circle {
  border-radius: 50% !important; }
#sidebar1 {
  min-width: 300px;
  max-width: 300px;
  background: #32373d;
  color: #fff;
  -webkit-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s;
  position: relative; }
  #sidebar1 .h6 {
    color: #fff; }
  #sidebar1.active {
    margin-left: -300px; }
    #sidebar1.active .custom-menu {
      margin-right: -50px; }
    #sidebar1.active .btn.btn-primary:before {
      content: "\f053";
      font-family: "FontAwesome";
      right: 2px !important; }
    #sidebar1.active .btn.btn-primary:after {
      display: none; }
  #sidebar1 h1 {
    margin-bottom: 20px;
    font-weight: 700;
    font-size: 20px; }
    #sidebar1 h1 .logo {
      color: #fff;
      display: block;
      padding: 10px 30px;
      background: #2f89fc; }
  #sidebar1 ul.components {
    padding: 0; }
  #sidebar1 ul li {
    font-size: 16px; }
    #sidebar1 ul li > ul {
      margin-left: 10px; }
      #sidebar1 ul li > ul li {
        font-size: 14px; }
    #sidebar1 ul li a {
      padding: 15px 30px;
      display: block;
      color: rgba(255, 255, 255, 0.6);
      border-bottom: 1px solid rgba(255, 255, 255, 0.05); }
      #sidebar1 ul li a span.notif {
        position: relative; }
        #sidebar1 ul li a span.notif small {
          position: absolute;
          top: -3px;
          bottom: 0;
          right: -3px;
          width: 12px;
          height: 12px;
          content: '';
          background: red;
          border-radius: 50%;
          font-family: "Poppins", Arial, sans-serif;
          font-size: 8px; }
          .list-unstyled {
  padding-left: 0;
  list-style: none; }
      #sidebar1 ul li a:hover {
        color: #fff;
        background: #2f89fc;
        border-bottom: 1px solid #2f89fc; }
    #sidebar1 ul li.active > a {
      background: transparent;
      color: #fff; }
      #sidebar1 ul li.active > a:hover {
        background: #2f89fc;
        border-bottom: 1px solid #2f89fc; }
  @media (max-width: 991.98px) {
    #sidebar1 {
      margin-left: -300px; }
      #sidebar1.active {
        margin-left: 0; }
      #sidebar1 .custom-menu {
        margin-right: -60px !important;
        top: 10px !important; } }
  #sidebar1 .custom-menu {
    display: inline-block;
    position: absolute;
    top: 20px;
    right: 0;
    margin-right: -35px;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s; }
    @media (prefers-reduced-motion: reduce) {
      #sidebar1 .custom-menu {
        -webkit-transition: none;
        -o-transition: none;
        transition: none; } }
    #sidebar1 .custom-menu .btn.btn-primary {
      background: #2f89fc;
      border-color: transparent;
      position: relative;
      color: #000;
      width: 30px;
      height: 30px; }
      #sidebar1 .custom-menu .btn.btn-primary:after, #sidebar1 .custom-menu .btn.btn-primary:before {
        position: absolute;
        top: 2px;
        left: 0;
        right: 0;
        bottom: 0;
        font-family: "FontAwesome";
        color: #fff; }
      #sidebar1 .custom-menu .btn.btn-primary:after {
        content: "\f054";
        left: 2px; }
.wrapper1 {
  width: 100%; }
  .d-flex1 {
  display: -webkit-box !important;
  display: -ms-flexbox !important;
  display: flex !important; }
  
.align-items-stretch1 {
  -webkit-box-align: stretch !important;
  -ms-flex-align: stretch !important;
  align-items: stretch !important; }

.img {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center; }
  
.img-fluid {
  max-width: 100%;
  height: auto; }

.img-thumbnail {
  padding: 0.25rem;
  background-color: #fff;
  border: 1px solid #dee2e6;
  border-radius: 0.25rem;
  max-width: 100%;
  height: auto; }
.py-4 {
  padding-top: 1.5rem !important; }
  .py-4 {
  padding-bottom: 1.5rem !important; }
.bg-wrap {
  width: 100%;
  position: relative;
  z-index: 0; }
  .bg-wrap:after {
    z-index: -1;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    content: '';
    background: #000;
    opacity: .3; }
  .bg-wrap .user-logo .img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 0 auto;
    margin-bottom: 10px; }
  .bg-wrap .user-logo h3 {
    color: #fff;
    font-size: 18px; }
.nav-link {
  display: block;
  padding: 0.5rem 1rem; }
  .nav-link:hover, .nav-link:focus {
    text-decoration: none; }
  .nav-link.disabled {
    color: #6c757d;
    pointer-events: none;
    cursor: default; }
</style>