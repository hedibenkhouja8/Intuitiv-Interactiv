<template><div>
  <navbar-component/>
  <section class="teacher_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Nos Encadreurs
        </h2>
      </div>
      <div class="row">
       
        <div class="col-sm-6 col-lg-3"  v-bind:key="item.id" v-for="item in info">
          <div class="box">
            <div class="img-box">
              <img src="../assets/images/t4.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5 style="color:white">
              <a  @click="edit(item.id)"> {{item.nom}}</a>
              </h5>
              <h6 style="color:white">
           {{item.etablisement.nom}}
              </h6>
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
  <footer-component/>
          </div>
</template>

<script>
import NavbarComponent from '@/components/navbar.vue'
import FooterComponent from '@/components/footer.vue'
import axios from'axios'
export default {
name: 'encadreursComponent',
  components: {
    NavbarComponent,
    FooterComponent
  },
   data () {
    return {
      info: null
    }
  },  mounted () {
    
    axios
      .get('http://127.0.0.1:8000/api/Encadreur')
      .then(response => (this.info = response.data))
      
  },
  
 methods :{edit(id){
this.$router.push({
    name:"DetailEncadreur",
    params : {id:id}
})},
  }

}
</script>

<style>

</style>