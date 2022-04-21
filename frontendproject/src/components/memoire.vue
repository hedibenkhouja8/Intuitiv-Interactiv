<template><div>
  <navbar-component/>
    <section class="teacher_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Memoires
        </h2>
         <div class="btn-box">
        <router-link   to="/adddemandedepot">
          faire une Demande depot 
         </router-link>
      </div>
      </div>
      <div class="row">
       
     
      
         <div class="col-sm-6 col-lg-3" v-bind:key="item.id" v-for="item in info">
          <div class="box">
            <div class="img-box">
              <img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.demande_depot.coverimage" width=" 50" height="350" alt="">
             
            </div>
            <div class="detail-box">
              <h5>
                {{ item.demande_depot.titre}}
              </h5>
              <h6>
                {{ item.demande_depot.user.name}}
              </h6>
              <button @click="edit(item.id,item.demande_depot.domaine_id)">View Details</button>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          View All
        </a>
      </div>
    </div>
  </section>

























<footer-component/></div>

</template>

<script>

import axios from 'axios';
import NavbarComponent from '@/components/navbar.vue'
import FooterComponent from '@/components/footer.vue'
export default {
name: 'MemoireComponent',
components: {
    NavbarComponent,
    FooterComponent
  },
  data () {
    return {
      info: null
    }
  },
  mounted () {
    axios
      .get('http://127.0.0.1:8000/api/Memoire')
      .then(response => (this.info = response.data))
  },
 methods :{edit(id,c){
this.$router.push({
    name:"DetailMemoire",
    params : {id:id,c:c}
})
},/* <embed controlslist="nodownload" v-bind:src="'http://localhost:8000/storage/files/demandes/pdf/'+item.demande_depot.fichierpdf" toolbar=0 width="500" height="375" 
 type="application/pdf">*/
  }
}

</script>

<style>

</style>