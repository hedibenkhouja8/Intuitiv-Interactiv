<template>
<sidebar-component/><topbar-component/>
<div class="full_container" style="width:80%; margin-left: 21%;  ">         <div class="inner_container">
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
                              <h2>Etudiants</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Etudiants Active</h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <!-- column contact --> 
                                    <div  v-bind:key="item.id" v-for="item in info" class="col-lg-4 col-md-6 col-sm-6 col-xs-12 profile_details margin_bottom_30">
                                       <div class="contact_blog">
                                          <h4 class="brief"></h4>
                                          <div class="contact_inner">
                                             <div class="left">
                                                <h3>{{item.name}}</h3>
                                                <p><strong>Etablissement: </strong>{{item.etablisement.nom}}</p>
                                                <ul class="list-unstyled">
                                                   <li><i class="fa fa-envelope-o"></i> {{item.email}}</li>
                                                   <li><i class="fa fa-phone"></i> {{item.tel}}</li>
                                                </ul>
                                             </div>
                                             <div class="right">
                                                <div class="profile_contacts">
                                                   <img class="img-responsive" v-bind:src="'http://localhost:8000/storage/files/register/profilepic/'+item.profilepic" alt="#" />
                                                </div>
                                             </div>
                                             <div class="bottom_list">
                                                <div class="left_rating">
                                                   <p class="ratings">
                                                      <a href="#"><span class="fa fa-star"></span></a>
                                                      <a href="#"><span class="fa fa-star"></span></a>
                                                      <a href="#"><span class="fa fa-star"></span></a>
                                                      <a href="#"><span class="fa fa-star"></span></a>
                                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                                   </p>
                                                </div>
                                                <div class="right_button">
                                                   <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                   </i> <i class="fa fa-comments-o"></i> 
                                                   </button>
                                                   <button type="button" @click="edit(item.id)" class="btn btn-primary btn-xs">
                                                   <i class="fa fa-user"> </i> View Profile
                                                   </button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end column contact blog -->
                                 </div></div>   <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Etudiants avec accés retreint</h2>
                                 </div> <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <!-- column contact --> 
                                    <div  v-bind:key="item.id" v-for="item in info2" class="col-lg-4 col-md-6 col-sm-6 col-xs-12 profile_details margin_bottom_30">
                                       <div class="contact_blog">
                                          <h4 class="brief"></h4>
                                          <div class="contact_inner">
                                             <div class="left">
                                                <h3>{{item.name}}</h3>
                                                <p><strong>Etablissement: </strong>{{item.etablisement.nom}}</p>
                                                <ul class="list-unstyled">
                                                   <li><i class="fa fa-envelope-o"></i> {{item.email}}</li>
                                                   <li><i class="fa fa-phone"></i> {{item.tel}}</li>
                                                </ul>
                                             </div>
                                             <div class="right">
                                                <div class="profile_contacts">
                                                   <img class="img-responsive" v-bind:src="'http://localhost:8000/storage/files/register/profilepic/'+item.profilepic" alt="#" />
                                                </div>
                                             </div>
                                             <div class="bottom_list">
                                                <div class="left_rating">
                                                   <p class="ratings">
                                                      <a href="#"><span class="fa fa-star"></span></a>
                                                      <a href="#"><span class="fa fa-star"></span></a>
                                                      <a href="#"><span class="fa fa-star"></span></a>
                                                      <a href="#"><span class="fa fa-star"></span></a>
                                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                                   </p>
                                                </div>
                                                <div class="right_button">
                                                   <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                   </i> <i class="fa fa-comments-o"></i> 
                                                   </button>
                                                   <button type="button" @click="edit(item.id)" class="btn btn-primary btn-xs">
                                                   <i class="fa fa-user"> </i> View Profile
                                                   </button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end column contact blog -->
                                 </div></div>
                              </div></div>
                        </div>
                        <!-- end row -->
                     </div>
                     <!-- footer -->
                     <div class="container-fluid">
                        <div class="row">
                           <div class="footer">
                              <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end dashboard inner -->
               </div>


            </div>
         </div>
      </div>
</template>

<script>
import sidebarComponent from '@/components/Admin/sidebaradmin.vue'
import topbarComponent from '@/components/Admin/topbar.vue'
import axios from 'axios'
export default {
name: 'usersComponent',
components: {
  sidebarComponent,
  topbarComponent
  } , data () {
    return {
      info: null,   info2: null
    }
  },
  mounted () {
    axios
      .get('http://127.0.0.1:8000/api/User')
      .then(response => (this.info = response.data))
      
    axios
      .get('http://127.0.0.1:8000/api/UserX')
      .then(response => (this.info2 = response.data))
  },
   methods :{edit(id){
this.$router.push({
    name:"profile",
    params : {id:id}
})
},
  }/* <embed controlslist="nodownload" v-bind:src="'http://localhost:8000/storage/files/demandes/pdf/'+item.demande_depot.fichierpdf" toolbar=0 width="500" height="375" 
 type="application/pdf">*/
}
</script>

<style>

</style>