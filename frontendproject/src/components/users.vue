<template>
  <navbar-component/>
  <section class="teacher_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Teachers
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
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="../assets/images/t2.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Martin Evans
              </h5>
              <h6>
                Teacher
              </h6>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="../assets/images/t3.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Jane Dunn
              </h5>
              <h6>
                Teacher
              </h6>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="../assets/images/t4.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Clara Mark
              </h5>
              <h6>
                Teacher
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

</template>

<script>
import NavbarComponent from '@/components/navbar.vue'
import FooterComponent from '@/components/footer.vue'
export default {
name: 'UsersPage',
  components: {
    NavbarComponent,
    FooterComponent
  },
props : ["detail"]

}
</script>

<style>

</style>