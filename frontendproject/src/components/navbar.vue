<template> 


      <header class="header_section ">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Natone
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
            <li class="nav-item active">
               <router-link class="nav-link" to="/"> home  <span class="sr-only">(current)</span></router-link>
              </li>
              <li class="nav-item">
               <router-link  class="nav-link" to="/about"> about </router-link>
              </li>
              <li class="nav-item">
                 <router-link class="nav-link" to="/users"> users </router-link>
            </li>
            <li class="nav-item">
                 <router-link class="nav-link" to="/memoire"> Memoire </router-link>
              </li>
              <li class="nav-item">
            <router-link class="nav-link" to="/contactus"> Contact us </router-link>

              </li>
              <li class="nav-item">
                 <router-link class="nav-link" to="/login"> login </router-link>
              </li>

              </ul>
            </div>
           
          </div>
        </nav>
      </div>
    </header>


</template>

<script>
export default {
name: 'NavbarComponent'
}
</script>

<style>

</style>