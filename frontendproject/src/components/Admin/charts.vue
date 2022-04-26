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
                              <h2>Chart</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Line Chart</h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                 <canvas id="line_chart"></canvas>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Line Chart</h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                 <canvas id="bar_chart"></canvas>
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
export default {
name: 'chartsComponent',
components: {
  sidebarComponent,
  topbarComponent
  }
}
</script>

<style>

</style>