<template><div >
<sidebaradmin-component/>
<topbar-component/><br><br><br>
<div class="full_container" style="width:80%; margin-left: 21%;  ">
   
         <div class="inner_container">
            <!-- Sidebar  -->
           
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               
               <!-- end topbar -->
               <!-- dashboard inner -->
             <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-book yellow_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{info}}</p>
                                    <p class="head_couter">Memoire Disponible</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-cloud-upload blue1_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{emprunt}}</p>
                                    <p class="head_couter">Emprunt Effetué</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user green_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{user}}</p>
                                    <p class="head_couter">Etudiants</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-file red_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{demande}}</p>
                                    <p class="head_couter">Demande de depots en attente</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     <!-- graph -->
                     <div class="row column2 graph margin_bottom_30">
                        <div class="col-md-l2 col-lg-12">
                           <div class="white_shd full">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Statistique Générale</h2>
                                 </div>
                              </div>
                              <div class="full graph_revenue">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="content">
                                          <div class="area_chart">
                                              <canvas id="myChart3"></canvas>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end graph -->
                     <div class="row column3">
                        <!-- testimonial -->
                        <div class="col-md-6">
                           <div class="dark_bg full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Etudiants Ajoutée recennements</h2>
                                 </div>
                              </div>
                              <div class="full graph_revenue">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="content testimonial">
                                          <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                                             <!-- Wrapper for carousel items -->
                                             <div class="carousel-inner">
                                                <div class="item carousel-item active">
                                                   <div class="img-box"><img src="../../assets/images/layout_img/user_img.jpg" alt=""></div>
                                                   <p class="testimonial">Mohamed Hedi Ben Khouja</p>
                                                   <p class="overview"><b>Iset Bizerte</b>Voir Profil</p>
                                                </div>
                                                <div v-bind:key="item.id" v-for="item in users" class="item carousel-item">
                                                   <div class="img-box"><img src="../../assets/images/layout_img/user_img.jpg" alt=""></div>
                                                   <p class="testimonial">{{item.name}}</p>
                                                   <p class="overview"><b>{{item.etablisement.nom}}</b>Voir Profil</p>
                                                </div>
                                              
                                             </div>
                                             <!-- Carousel controls -->
                                             <a class="carousel-control left carousel-control-prev" href="#testimonial_slider" data-slide="prev">
                                             <i class="fa fa-angle-left"></i>
                                             </a>
                                             <a class="carousel-control right carousel-control-next" href="#testimonial_slider" data-slide="next">
                                             <i class="fa fa-angle-right"></i>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end testimonial -->
                        <!-- progress bar -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Proportion des memoires par domaine</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="progress_bar">
                                          <!-- Skill Bars -->
                                          <span class="skill" style="width:73%;">Informatique <span class="info_valume">{{(i*100/info).toFixed(2)}}%</span></span>                  
                                          <div class="progress skill-bar ">
                                             <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100"  :style="{'width':i*100/info+'%'}">
                                             </div>
                                          </div>
                                          <span class="skill" style="width:62%;">Physique <span class="info_valume">{{(p*100/info).toFixed(2)}}%</span></span>   
                                          <div class="progress skill-bar">
                                             <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"  :style="{'width':p*100/info+'%'}">
                                             </div>
                                          </div>
                                          <span class="skill" style="width:54%;">Chimie <span class="info_valume">{{(c*100/info).toFixed(2)}}%</span></span>
                                          <div class="progress skill-bar">
                                             <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"  :style="{'width':c*100/info+'%'}">
                                             </div>
                                          </div>
                                          <span class="skill" style="width:44%;"> Mathémathique <span class="info_valume">{{(m*100/info).toFixed(2)}}%</span></span>
                                          <div class="progress skill-bar">
                                             <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100" :style="{'width':m*100/info+'%'}">
                                             </div>
                                          </div>
                                          <span class="skill" style="width:48%;">Autre <span class="info_valume">{{(a*100/info).toFixed(2)}}%</span></span>
                                          <div class="progress skill-bar">
                                             <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"  :style="{'width':a*100/info+'%'}">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end progress bar -->
                     </div>
                     <div class="row column4 graph">
                        <div class="col-md-6">
                           <div class="dash_blog">
                              <div class="dash_blog_inner">
                                 <div class="dash_head">
                                    <h3><span><i class="fa fa-cloud-upload"></i> Demandes d'emprunt </span><span class="plus_green_bt"><a href="#">+</a></span></h3>
                                 </div>
                                 <div class="list_cont">
                                    <p>Les recentes demande d'emprunt</p>
                                 </div>
                                      
                                 <div class="msg_list_main">
                                    <ul class="msg_list">
                                       <li v-bind:key="item.id" v-for="item in rec">
                                          <span><img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.memoire.demande_depot.coverimage" id="z" alt="#" /></span>
                                          <span>
                                          <span class="name_user">{{item.memoire.demande_depot.titre}}</span>
                                          <span class="msg_user">{{item.user.name}}</span>
                                          <span class="time_ago">
        {{ formatDate(item.created_at) }} </span>
                                          </span>
                                       </li>
                                    
                                    </ul>
                                 </div>
                                 <div class="read_more">
                                    <div class="center"><router-link  class="nav-link" to="/demandesemprunt"><span class="main_bt read_bt" >Voir plus</span></router-link></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="dash_blog">
                              <div class="dash_blog_inner">
                                 <div class="dash_head">
                                    <h3><span><i class="fa fa-cloud-download"></i> Demande de depots</span><span class="plus_green_bt"><a href="#">+</a></span></h3>
                                 </div>
                                 <div class="list_cont">
                                    <p>Les recentes demande de depot</p>
                                 </div>
                                 <div class="msg_list_main">
                                    <ul class="msg_list">
                                       <li v-bind:key="item.id" v-for="item in rec2">
                                          <span><img v-bind:src="'http://localhost:8000/storage/files/register/profilepic/'+item.user.profilepic" class="img-responsive" alt="#" /></span>
                                          <span>
                                          <span class="name_user">{{item.user.name}}</span>
                                          <span class="msg_user">{{item.titre}}</span>
                                          <span class="time_ago"> {{ formatDate(item.created_at) }} </span>
                                          </span>
                                       </li>
                                       
                                    </ul>
                                 </div>
                                 <div class="read_more">
                                    <div class="center"><router-link  class="nav-link" to="/demandesdepot"><span class="main_bt read_bt" >Voir plus</span></router-link></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- footer -->
                 
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>

</div>
</template>

<script>
import axios from 'axios';
import sidebaradminComponent from '@/components/Admin/sidebaradmin.vue'
import topbarComponent from '@/components/Admin/topbar.vue'

import Chart from 'chart.js/auto'

export default {
name: 'AdminComponent',
components: {
  sidebaradminComponent,
  topbarComponent
  },
  data () {
    return {
      info: null,
      emprunt: null,
      user:null,
      demande:null,
      a:null,      p:null,   m:null,   c:null,
      users:null,i:null,rec:null,rec2:null
    }
  }, methods: {
      formatDate(dateString) {
            const date = new Date(dateString);
                // Then specify how you want your dates to be formatted
            return new Intl.DateTimeFormat('default', {dateStyle: 'long'}).format(date);
        }
    },
 async  mounted () {
this.a=7,
    axios
      .get('http://127.0.0.1:8000/api/MemoireAccepted')
      .then(response => (this.info = response.data.length))
      axios
      .get('http://127.0.0.1:8000/api/physique')
      .then(response => (this.p = response.data.length)) 
       axios
      .get('http://127.0.0.1:8000/api/informatique')
      .then(response => (this.i = response.data.length))
       axios
      .get('http://127.0.0.1:8000/api/chimie')
      .then(response => (this.c = response.data.length))
       axios
      .get('http://127.0.0.1:8000/api/math')
      .then(response => (this.m = response.data.length))
       axios
      .get('http://127.0.0.1:8000/api/autre')
      .then(response => (this.a = response.data.length))
       axios
      .get('http://127.0.0.1:8000/api/DemandeEmpruntAccepted')
      .then(response => (this.emprunt = response.data.length))
       axios
      .get('http://127.0.0.1:8000/api/recentDemandeEmprunts')
      .then(response => (this.rec = response.data))
         axios
      .get('http://127.0.0.1:8000/api/recentDemandeDepots')
      .then(response => (this.rec2 = response.data))
       axios
      .get('http://127.0.0.1:8000/api/User')
      .then(response => (this.user = response.data.length))
          axios
      .get('http://127.0.0.1:8000/api/User/Recents')
      .then(response => (this.users = response.data))
       axios
      .get('http://127.0.0.1:8000/api/DemandeNonAccepte')
      .then(response => (this.demande = response.data.length))
       const months = await axios.get("http://127.0.0.1:8000/api/EmpruntMois");
      const months2 = await axios.get("http://127.0.0.1:8000/api/DepotMois");
      const months3 = await axios.get("http://127.0.0.1:8000/api/UserMois");
     const amois =months.data.map((x) =>x.total_emprunts ) 
     const bmois =months2.data.map((x) =>x.total_depots ) 
     const cmois =months3.data.map((x) =>x.total_users ) 
  const ctx3 = document.getElementById('myChart3');

     const myChart3 = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','September','Octobre','November','December'],
        datasets: [{
            label: "Nombre de demande d'emprunt par Mois",fill: true,
            data: amois,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
              
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
             
            ],  order:2,
            borderWidth: 5,tension: 0.2,
        },{
            label: "Nombre de demande de dépot par Mois",
            data: bmois,
               type: 'bar',  order:3,
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                
               
            ],
            borderColor: [
              
                'rgba(54, 162, 235, 1)',
              
               
            ],
            borderWidth: 5,tension: 0.2,
        },{
            label: "Nombre de d'etudiants ajoutés par Mois",
            data: cmois,  order:1,
               type: 'line',fill: true,
            backgroundColor: [
                  'rgba(255, 206, 86, 0.5)',
              
               
            ],
            borderColor: [
              
                 'rgba(255, 206, 86, 1)',
              
               
            ],
            borderWidth: 5,tension: 0.2,
        }]
    }, options: {
    scales: {
      y: {
        beginAtZero: false
      }
    }
  },
  
});   myChart3
  },
  

}
</script>


<style>

</style>