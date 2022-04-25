<template>
  <navbar-component/>
<div class="wrapper d-flex align-items-stretch">
<sidebar-component/>
 <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Sidebar #09</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>

</div>
 
</template>

<script>
import NavbarComponent from '@/components/navbar.vue'
import sidebarComponent from '@/components/sidebar.vue'

export default {
name: 'myprofileComponent',
components: {
    NavbarComponent,
    sidebarComponent
  },
  data() {
    return {
      username: localStorage.getItem("name"),

      prenom: localStorage.getItem("prenom"),
      id: localStorage.getItem("id")
    };
  }
}


</script>

<style>
#content {
  width:320%;
  padding: 0;
  min-height: 100vh;
  -webkit-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s; }
  .p-4 {
  padding: 1.5rem !important; }
    .p-md-5 {
    padding: 3rem !important; }
</style>