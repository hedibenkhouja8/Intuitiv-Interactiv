<template><div>
  <navbar-component/>
    <!-- about section -->
  <section class="about_section layout_padding ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="../assets/images/about-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
               Qui nous sommes
              </h2>
            </div>
            <p>
           
            On vous présente notre bibliothèque universitaire en ligne où vous pouvez partagez vos mémoires ou empruntez d'autres librement en toutes sécurité </p><p>N'hesitez pas a nous joindre</p>
            <router-link   to="/memoire">
     <strong>   Nos mémoires</strong>
         </router-link>
          
          </div>
        </div>
      </div>
    </div>
  </section>

<footer-component/>
          </div>
</template>

<script>
import NavbarComponent from '@/components/navbar.vue'
import FooterComponent from '@/components/footer.vue'
export default {
name: 'AboutPage',
components: {
    NavbarComponent,
    FooterComponent
  }

}
</script>

<style>

</style>