<template>
  <navbar-component/>
  <router-view />
<footer-component/>
  
</template>

<script>
import NavbarComponent from '@/components/navbar.vue'
import FooterComponent from '@/components/footer.vue'
export default {
  name: 'App',
  components: {
    NavbarComponent,
    FooterComponent
  }

}
</script>

<style>

</style>
