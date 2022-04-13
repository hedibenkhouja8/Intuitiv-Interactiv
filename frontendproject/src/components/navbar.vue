<template>

<header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <h3>
              Joson
            </h3>
            <span> college</span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
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
            <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
              <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
            </form>
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