<template><div >
<sidebar-component/><topbar-component/><br><br><br>
<div class="full_container" style="width:80%; margin-left: 21%;  ">
         <div class="inner_container">
            <!-- Sidebar  -->
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <!-- end topbar -->
         <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Diagrammes</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">  <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Graphique Lineaire <p>nombre de demandes d'emprunt par domaine selon l'année </p></h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                               <canvas id="myChart5" width="10" height="10"></canvas>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Diagramme à bandes<p>nombre de demandes d'emprunt par domaine</p></h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                               <canvas id="myChart" width="10" height="10"></canvas>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>
Diagramme circulaire<p>Nombre d'étudiants par établissement</p></h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                       <canvas id="myChart2" width="5" height="5"></canvas>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Graphique Linéaire<p>Comparaison entre le nombre des demandes de dépôt et les demandes d'emprunts</p></h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                     <canvas id="myChart3" width="5" height="5"></canvas>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Carte de la Zone Polaire <p>Nombre d'etudiants par ville</p></h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                 <canvas id="myChart4"></canvas>
                              </div> 
                           </div> 
                        </div> 
                     </div>
                     <!-- end row -->
                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
                     </div>
                  </div>
               </div>


            </div>
         </div></div>
      </div>
</template>

<script>
import sidebarComponent from '@/components/Admin/sidebaradmin.vue'
import topbarComponent from '@/components/Admin/topbar.vue'
import Chart from 'chart.js/auto'
import axios from "axios";
export default {
name: 'chartsComponent',
components: {
  sidebarComponent,
  topbarComponent
  }, data() {
    return {
      info: null,
      info2: null,
      
    };
  },async mounted(){ 
      const a = await axios.get("http://127.0.0.1:8000/api/UserEmpruntX");
      const b = await axios.get("http://127.0.0.1:8000/api/DomaineX");
      const c = await axios.get("http://127.0.0.1:8000/api/UserVille");
      const annee = await axios.get("http://127.0.0.1:8000/api/Annee");
      const d = await axios.get("http://127.0.0.1:8000/api/Ville");
      const months = await axios.get("http://127.0.0.1:8000/api/EmpruntMois");
      const months2 = await axios.get("http://127.0.0.1:8000/api/DepotMois");
      
      const xinfo = await axios.get("http://127.0.0.1:8000/api/EmpruntAnnee");
      const xcomptabilite = await axios.get("http://127.0.0.1:8000/api/EmpruntAnnee2");
      const xbusiness = await axios.get("http://127.0.0.1:8000/api/EmpruntAnnee3");
      const xchimie = await axios.get("http://127.0.0.1:8000/api/EmpruntAnnee4");
      const xmath = await axios.get("http://127.0.0.1:8000/api/EmpruntAnnee5");
      const xmedecine = await axios.get("http://127.0.0.1:8000/api/EmpruntAnnee6");
      const xart = await axios.get("http://127.0.0.1:8000/api/EmpruntAnnee7");
      const xlangue = await axios.get("http://127.0.0.1:8000/api/EmpruntAnnee8");
      const xautre = await axios.get("http://127.0.0.1:8000/api/EmpruntAnnee9");
     const info =xinfo.data.map((x) =>x.total_emprunts ) 
     const comptabilite =xcomptabilite.data.map((x) =>x.total_emprunts ) 
     const business =xbusiness.data.map((x) =>x.total_emprunts ) 
     const chimie =xchimie.data.map((x) =>x.total_emprunts ) 
     const math =xmath.data.map((x) =>x.total_emprunts ) 
     const medecine =xmedecine.data.map((x) =>x.total_emprunts ) 
     const art =xart.data.map((x) =>x.total_emprunts ) 
     const langue =xlangue.data.map((x) =>x.total_emprunts ) 
     const autre =xautre.data.map((x) =>x.total_emprunts ) 
     const amois =months.data.map((x) =>x.total_emprunts ) 
     const xannee =annee.data.map((x) =>x.year ) 
     const bmois =months2.data.map((x) =>x.total_depots ) 
      const ax =a.data.map((x) =>x.total ) 
      const bx =b.data.map((x) =>x.nom )
      const cx =c.data.map((x) =>x.total_users ) 
      const dx =d.data.map((x) =>x.ville )
      console.log(dx.length)
         const nometablisement = await axios.get("http://127.0.0.1:8000/api/EtablisementX");
  const ne =nometablisement.data.map((x) =>x.nom )
   const users = await axios.get("http://127.0.0.1:8000/api/UserZ");
  const ne2 =users.data.map((x) =>x.total )
   
     const ctx = document.getElementById('myChart');
     const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: bx,
        datasets: [{
            label: "Nombre de demande d'emprunt ",
            data: ax,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});    const ctx3 = document.getElementById('myChart3');

     const myChart3 = new Chart(ctx3, {
    type: 'line',
    data: {
        labels: ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','September','Octobre','November','December'],
        datasets: [{
            label: "Nombre de demande d'emprunt par Mois",fill: true,
            data: amois,
            backgroundColor: [
                'rgba(255,99,132,0.2)',
              
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
             
            ],
            borderWidth: 5,tension: 0.2,
        },{
            label: "Nombre de demande de dépot par Mois",
            data: bmois,
            backgroundColor: [
               'rgba(54,162, 235, 1)',
                
               
            ],
            borderColor: [
              
                'rgba(54, 162, 235, 1)',
              
               
            ],
            borderWidth: 5,tension: 0.2,
        }]
    },
    options: {
    animations: {
      radius: {
        duration: 400,
        easing: 'linear',
        loop: (context) => context.active
      }
    },
    hoverRadius: 12,
    hoverBackgroundColor: 'yellow',
    interaction: {
      mode: 'nearest',
      intersect: false,
      axis: 'x'
    },  plugins: {
      tooltip: {
        enabled: false
      }
    }
  },
});   function rand(frm, to) {
    return ~~(Math.random() * (to - frm)) + frm;
}
//var z=`rgba(${rand(0, 255)}, ${rand(0, 255)}, ${rand(0, 255)},0.5)`;
var COLORS = [];var colors2 = [];
while (COLORS.length < 100) {
    COLORS.push(`rgba(${rand(0, 255)}, ${rand(0, 255)}, ${rand(0, 255)},0.5)`);
}
var COLORS1 = [];
while (COLORS1.length < 100) {
    COLORS1.push(`rgba(${rand(0, 255)}, ${rand(0, 255)}, ${rand(0, 255)},0.5)`);
}while (colors2.length < 20) {
    colors2.push(`rgba(${rand(0, 255)}, ${rand(0, 255)}, ${rand(0, 255)},1)`);
}

     const ctx2 = document.getElementById('myChart2');
     const myChart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels:ne,
        datasets: [{
     
            data: ne2,
            backgroundColor: COLORS,
            borderColor: COLORS,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
         
        }
    }
}); const ctx4 = document.getElementById('myChart4');
var colors = [];
while (colors.length < dx.length) {
    do {
        var color = Math.floor((Math.random()*1053900)+1);
    } while (colors.indexOf(color) >= 0);
    colors.push("#" + ("123860" + color.toString(16)).slice(-6));
}
     const myChart4 = new Chart(ctx4, {
    type: 'polarArea',
    data: {
        labels: dx,
        datasets: [{
            label: "Nombre de d'etudiants par ville",
            data: cx,
            backgroundColor: COLORS1,
            borderColor:COLORS1,
            borderWidth: 1
        }]
    }
});












 const ctx5 = document.getElementById('myChart5');

     const myChart5 = new Chart(ctx5, {
    type: 'line',
    data: {
        labels:xannee,
        datasets: [{
            label: "Informatique",
            data: info,
            borderColor:  'rgba(255, 99, 132, 1)',backgroundColor:  'rgba(255, 99, 132, 1)',
            borderWidth: 5,tension: 0.2,
        },{
            label: "Comptabilité",
            data: comptabilite,
            borderColor: 'rgba(54, 162, 235, 1)',backgroundColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 5,tension: 0.2,
        },{
            label: "Business",
            data: business,backgroundColor: 'rgba(255, 206, 86, 1)',
             borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 5,tension: 0.2,
        },{
            label: "Chimie",
            data: chimie,backgroundColor: 'rgba(75, 192, 192, 1)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 5,tension: 0.2,
        },{
            label: "Math",
            data: math,
           borderColor:  'rgba(153, 102, 255, 1)',backgroundColor:  'rgba(153, 102, 255, 1)',
            borderWidth: 5,tension: 0.2,
        },{
            label: "Medecine",
            data: medecine, borderColor: 'rgba(255, 159, 64, 1)',backgroundColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 5,tension: 0.2,
        },{
            label: "Art",
            data: art,
            borderColor: 'rgba(100, 159, 64, 1)',backgroundColor: 'rgba(100, 159, 64, 1)',
            borderWidth: 5,
        },{
            label: "Languees",
            data: langue,
             borderColor: 'rgba(255, 20, 64, 1)',
            borderWidth: 5,tension: 0.2,backgroundColor: 'rgba(255, 20, 64, 1)',
        },{
            label: "Autre",
            data: autre,
            borderColor: 'rgba(255, 159, 255, 1)',
            borderWidth: 5,tension: 0.2,backgroundColor: 'rgba(255, 159, 255, 1)',
        }]
    },
  
});












myChart;myChart2;myChart3;myChart4;myChart5;
  }
}
</script>

<style>

</style>