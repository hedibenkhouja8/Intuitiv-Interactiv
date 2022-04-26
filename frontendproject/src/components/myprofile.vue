<template><div>
  <navbar-component/>
<div class="wrapper d-flex align-items-stretch">
<sidebar-component/>
 <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Memoire Disponible</h2>
         <div class="row" >
       <div class="col-md-6 "  v-bind:key="item.id" v-for="item in info">
     <div class="course" >
						
						<img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.memoire.demande_depot.coverimage" width="250" height="380" class="p"  alt="...">
 
						<div class="desc">
							<h3> {{ item.memoire.demande_depot.titre}}</h3>
              <h4>{{ item.memoire.demande_depot.user.name}}</h4>
							<p>{{ item.memoire.demande_depot.description}}</p>
							<span><button class="btn btn-primary btn-sm btn-course"  @click="edit(item.memoire.demande_depot.fichierpdf)" >Visulaiser</button></span>
						</div>
					</div>
       </div>
      
      </div>  </div>

</div>
          </div>
</template>

<script>
import NavbarComponent from '@/components/navbar.vue'
import sidebarComponent from '@/components/sidebar.vue'
import axios from 'axios'
export default {
name: 'myprofileComponent',
components: {
    NavbarComponent,
    sidebarComponent
  },
  data() {
    return {
      info: null,
      username: localStorage.getItem("name"),

      prenom: localStorage.getItem("prenom"),
      id: localStorage.getItem("id")
    };
  },mounted () { axios
      .get('http://127.0.0.1:8000/api/AcceptedByUser/'+localStorage.getItem("id"))
      .then(response => (this.info = response.data))
 },methods: {edit(fichierpdf){
this.$router.push({
    name:"fichier",
    params : {fichierpdf:fichierpdf}
})
}}
}


</script>

<style>

</style>