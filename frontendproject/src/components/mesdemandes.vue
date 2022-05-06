<template><div>
  <navbar-component/>
<div class="wrapper d-flex align-items-stretch">
<sidebar-component/>
 <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Mes Demandes de depot</h2>  <div class="row" >  <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Demandes de depot </h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div v-bind:key="item.id" v-for="item in info" class="card mb-3 border-3 border-success" style="max-width: 840px; " >
  <div class="row g-15  ">
    <div class="col-md-4">
      <img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.coverimage" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title">Titre:{{item.titre}}</h2>
        <p class="card-text"><strong>Description :</strong> &nbsp;{{item.description}}</p>
        <p class="card-text"><strong>Encadreur :</strong> &nbsp;{{item.encadreur.nom}}</p>
        <p class="card-text"><strong>Etablissement : </strong>&nbsp;{{item.etablisement.nom}}</p>
        <p class="card-text"><strong>Entreprise d'acceuil :</strong> &nbsp;{{item.entreprise.nom}}</p>
        <p class="card-text"><small class="text-muted">Déposé le :{{formatDate(item.created_at) }}</small></p>
        <span style="padding-left:230px"><strong style="color:green;">Accepté</strong></span>
      </div></div>
    </div>
  </div>       <div v-bind:key="item.id" v-for="item in info1" class="card mb-3 border-3 border-warning" style="max-width: 840px; " >
  <div class="row g-15  ">
    <div class="col-md-4">
      <img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.coverimage" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title">Titre:{{item.titre}}</h2>
        <p class="card-text"><strong>Description :</strong> : &nbsp;{{item.description}}</p>
        <p class="card-text"><strong>Encadreur :</strong> &nbsp;{{item.encadreur.nom}}</p>
        <p class="card-text"><strong>Etablissement : </strong>&nbsp;{{item.etablisement.nom}}</p>
        <p class="card-text"><strong>Entreprise d'acceuil : </strong>&nbsp;{{item.entreprise.nom}}</p>
        <p class="card-text"><small class="text-muted">Déposé le :{{formatDate(item.created_at) }}</small></p>
        <span style="padding-left:230px"><strong style="color:yellow;">En Attente</strong></span>
      </div></div>
    </div>
  </div>       <div v-bind:key="item.id" v-for="item in info2" class="card mb-3 border-danger border-3" style="max-width: 840px; " >
  <div class="row g-15  ">
    <div class="col-md-4">
      <img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.coverimage" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title">Titre:{{item.titre}}</h2>
        <p class="card-text"><strong>Description</strong> : &nbsp;{{item.description}}</p>
        <p class="card-text"><strong>Encadreur :</strong> &nbsp;{{item.encadreur.nom}}</p>
        <p class="card-text"><strong>Etablissement : </strong> &nbsp;{{item.etablisement.nom}}</p>
        <p class="card-text"><strong>Entreprise d'acceuil :</strong> &nbsp;{{item.entreprise.nom}}</p>
        <p class="card-text"><small class="text-muted">Déposé le :{{formatDate(item.created_at) }}</small></p>
        <span style="padding-left:230px"><strong style="color:red;">Refusé</strong></span>
      </div></div>
    </div>
  </div>
</div>
                              </div>
                           </div>
     
      
      </div>  
      </div>

</div>
          </div>
</template>

<script>
import NavbarComponent from '@/components/navbar.vue'
import sidebarComponent from '@/components/sidebar.vue'
import axios from 'axios'
export default {
name: 'mesdemandesComponent',
components: {
    NavbarComponent,
    sidebarComponent
  },
  data() {
    return {
      info: null,
      info1: null,
      info2: null,
      username: localStorage.getItem("name"),
      demandedepotSuccessful: localStorage.getItem("demandedepotSuccessful"),

      prenom: localStorage.getItem("prenom"),
      id: localStorage.getItem("id")
    };
  },mounted () {
      axios
      .get('http://127.0.0.1:8000/api/DemandeDepotByUserA/'+localStorage.getItem("id"))
      .then(response => (this.info = response.data))
       axios
      .get('http://127.0.0.1:8000/api/DemandeDepotByUser/'+localStorage.getItem("id"))
      .then(response => (this.info1 = response.data))
      axios
      .get('http://127.0.0.1:8000/api/DemandeDepotByUserR/'+localStorage.getItem("id"))
      .then(response => (this.info2 = response.data))
 },methods: {edit(fichierpdf){
this.$router.push({
    name:"fichier",
    params : {fichierpdf:fichierpdf}
})
},  formatDate(dateString) {
            const date = new Date(dateString);
                // Then specify how you want your dates to be formatted
            return new Intl.DateTimeFormat('default', {dateStyle: 'long'}).format(date);
        }}
}


</script>

<style>

</style>