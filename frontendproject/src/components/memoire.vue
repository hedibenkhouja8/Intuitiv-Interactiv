<template>

    <section class="teacher_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Memoires
        </h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="../assets/images/t1.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Alice Stark
              </h5>
              <h6>
                Teacher
              </h6>
            </div>
          </div>
        </div>
     
      
         <div class="col-sm-6 col-lg-3" v-bind:key="item.id" v-for="item in info">
          <div class="box">
            <div class="img-box">
              <img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.demande_depot.coverimage" alt="">
              <embed controlslist="nodownload" v-bind:src="'http://localhost:8000/storage/files/demandes/pdf/'+item.demande_depot.fichierpdf" toolbar=0 width="500" height="375" 
 type="application/pdf">
            </div>
            <div class="detail-box">
              <h5>
                {{ item.date_acceptation}}
              </h5>
              <h6>
                {{ item.demande_depot.titre}}
              </h6>
              <button @click="edit(item.id)">edit</button>
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


























</template>

<script>

import axios from 'axios';
export default {
name: 'MemoireComponent',
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
 methods :{edit(id){
this.$router.push({
    name:"DetailMemoire",
    params : {id:id}
})
},
  }
}

</script>

<style>

</style>