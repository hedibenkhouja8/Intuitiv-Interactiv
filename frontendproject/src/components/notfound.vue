<template>
  <div>
    <section class="notfound_section layout_padding">
      <div class="container" style="height: 350px;">
        <div class="row" >
          <div class="col-md-6">
            <div class="detail-box">
              
              
            </div>
          </div>
          <div class="col-md-6">
            <br><br><br><br><br><br>
            <h1 style="color:black">Page Not Found !</h1>
           <router-link  class="btn btn-dark btn-lg" to="/"><i class="fa fa-home"></i> Home</router-link>
          </div>
        </div>
      </div>
    </section>
    <footer-component />
  </div>
</template>

<script>
import FooterComponent from '@/components/footer.vue'
export default {
name: 'notfoundPage',


  components: {
    FooterComponent
  },
}
</script>

<style>
.notfound_section {
  background-image: url(../assets/images/404.jpg);
  color: #ffffff;
   background-repeat: no-repeat;
  background-size: auto;
}
</style>