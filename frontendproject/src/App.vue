<template>
<div>
<nav>
<router-link to="/"> home </router-link>
<router-link to="/users"> users </router-link>
<router-link to="/about"> about </router-link>


</nav>
  


  <router-view />
 <nav>
</nav></div>
</template>

<script>
export default {
  name: 'App',
  components: {
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
