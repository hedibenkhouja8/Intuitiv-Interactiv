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
                     <div class="row column1">
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
Diagramme circulaire<p>(Nombre d'utilisateur par établissement)</p></h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                       <canvas id="myChart2" width="10" height="10"></canvas>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Radar Chart</h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                 <canvas id="radar_chart"></canvas>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Pie Chart</h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                 <canvas id="pie_chart"></canvas>
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
     const ax =a.data.map((x) =>x.total ) 
      const bx =b.data.map((x) =>x.nom )
         const nometablisement = await axios.get("http://127.0.0.1:8000/api/EtablisementX");
  const ne =nometablisement.data.map((x) =>x.nom )
   const users = await axios.get("http://127.0.0.1:8000/api/UserZ");
  const ne2 =users.data.map((x) =>x.total )
   console.log(ne2)
     const ctx = document.getElementById('myChart');
     const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: bx,
        datasets: [{
            label: "Nombre de demande d'emprunt par domaine",
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
});   
     const ctx2 = document.getElementById('myChart2');
     const myChart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels:ne,
        datasets: [{
     
            data: ne2,
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
         
        }
    }
}); myChart;myChart2;
  }
}
</script>

<style>

</style>