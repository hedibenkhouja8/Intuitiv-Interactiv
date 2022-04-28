<template><div>
  <navbar-component/>
<div class="wrapper d-flex align-items-stretch">
<sidebar-component/>
 <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Ajouter votre propre Memoire</h2>
         <div class="row" >
        <div class="col-md-20">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h4>Veuillez Remplir la formulaire attentivement avec tous les fichiers nécessaires <small style="font-size:15px">(*) champ obligatoire</small> </h4>
                                 </div>
                              </div>
   
  
                              <div class="table_section padding_infor_info">
        <div class="col-md-12">
          <div class="row ">
            <form action="" @submit.prevent="onCreate"><div class="row">
  <div class="col-md-8">
              <label for="basic-url" class="form-label">Titre du memoire *</label> 
              <input class="form-control"
                  type="text"
                  placeholder="Titre "
                  v-model="titre"
                />
  </div>
  <div class="col-md-4">
              <label for="basic-url" class="form-label">Entreprise d'acceuil *</label><select
                  class="form-select"
                  aria-label="Default select example"
                  v-model="selectedEntreprise"  placeholder="entreprise"
                >
                  <option selected >Entreprise d'acceuil</option>
                  <option
                    v-bind:key="entreprise.id"
                    v-bind:value="entreprise.id"
                    v-for="entreprise in entreprises"
                  >
                    {{ entreprise.nom }}
                  </option>
                </select>
  </div>
</div><div class="row">
  <div class="col-md-8">
              <label for="basic-url" class="form-label">Domaine de la memoire *</label>    <select
                  class="form-select"
                  aria-label="Default select example"
                  v-model="selectedDomaine"
                  v-on:change="getCriteres(selectedDomaine.id)"
                >
                  <option selected>Domaine</option>
                  <option
                    v-bind:key="domaine.id"
                    v-for="domaine in domaines"
                    :value="domaine"
                  >
                    {{ domaine.nom }}
                  </option>
                </select>
  </div>
  <div class="col-md-4">
              <label for="basic-url" class="form-label">Critere de la memoire *</label>  <select
                  class="form-select"
                  aria-label="Default select example"
                  v-model="selectedCritere"
                >
                  <option selected>critere</option>
                  <option v-bind:key="critere.id" v-bind:value="critere.id" v-for="critere in criteres">
                    {{ critere.nom }}
                  </option>
                </select>
  </div>
</div><div class="row">
  <div class="col-md-8">
              <label for="basic-url" class="form-label">Etablissement *</label>  <select
                  class="form-select"
                  aria-label="Default select example"
                  v-model="selectedEtablisement"
                  v-on:change="getEncadreurs(selectedEtablisement.id)"
                >
                  <option selected>Etablissement</option>
                  <option
                    v-bind:key="etablisement.id"
                    v-for="etablisement in etablisements"
                    :value="etablisement"
                  >
                    {{ etablisement.nom }}
                  </option>
                </select>
  </div>
  <div class="col-md-4">
              <label for="basic-url" class="form-label">Encadreur *</label>
                <select
                  class="form-select"
                  aria-label="Default select example"
                  v-model="selectedEncadreur"
                >
                  <option selected>encadreur</option>
                  <option
                    v-bind:key="encadreur.id"
                    v-bind:value="encadreur.id"
                    v-for="encadreur in encadreurs"
                  >
                    {{ encadreur.nom }}
                  </option>
                </select>
                             
  </div>
</div><div class="row">
  <div class="col-md-8">
              <label for="basic-url" class="form-label">Fichier initial de la memoire *</label>
                <input class="form-control" type="file" @change="onchange" />
  </div>
  <div class="col-md-4">
              <label for="basic-url" class="form-label">Fichier de la demande *</label>
                <input class="form-control" type="file" @change="onchange1" />
  </div>
</div><div class="row">
  <div class="col-md-8">
              <label for="basic-url" class="form-label">Photo de Couverture *</label>
                <input class="form-control" type="file" @change="onchange2" />
  </div>
  <div class="col-md-4">
              <label for="basic-url" class="form-label">Fichier du brevet</label>
                <input class="form-control" type="file" @change="onchange3" />
  </div>
</div><div class="row">
  <div class="col-md-8">
              <label for="basic-url" class="form-label">Fichier du recherche</label>
                <input class="form-control" type="file" @change="onchange4" />
  </div>
  <div class="col-md-4">
              <label for="basic-url" class="form-label">Nombre de pages</label> <input
                  class="form-control"
                  type="number"
                  placeholder="nombre de page"
                  v-model="nbpages" min="0"
                />
  </div>
</div><div class="row">
  <div class="col-md-12">
              <label for="basic-url" class="form-label">Description</label>
                <textarea  style="height: 200px" class="form-control "
                  type="text"
                  placeholder="Description"
                  v-model="description"
                ></textarea>
  </div>
</div><br>
              <div class="input-group mb-3">
                <button onclick="return confirm('Vous confirmez le dépot de cette memoire?');" type="submit" class=" btn btn-dark " style="background-color:#0e3746">Déposer ma demande</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
                           </div>
                        </div>
      </div>  </div>

</div>
</template>
<script>
import NavbarComponent from '@/components/navbar.vue'
import sidebarComponent from '@/components/sidebar.vue'
import axios from "axios";
export default {
  name: "AddDemandeDepotComponent",
  components: {
    NavbarComponent,
    sidebarComponent
  },
  data() {
    return {
      entreprises: null,
      domaines: null,
      selectedDomaine: 0,
      selectedEtablisement: 0,
      selectedCritere: "",
      selectedEntreprise: "",
      selectedEncadreur:"",
      criteres: null,
      etablisements: null,
      encadreurs: null,
      encadreur: "",
      titre: "",
      nbpages: 0,
      description: "",
      user_id: 1,
      file: null,
      file1: null,
      file2: null,
      file3: null,
      file4: null,
      userid: localStorage.getItem('id')
    };
  },
  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/Entreprise")
      .then((response) => (this.entreprises = response.data));

    axios
      .get("http://127.0.0.1:8000/api/Domaine")
      .then((response) => (this.domaines = response.data));
    axios
      .get("http://127.0.0.1:8000/api/Etablisement")
      .then((response) => (this.etablisements = response.data));
  },
  methods: {
    getCriteres(DomaineId) {
      axios
        .get("http://127.0.0.1:8000/api/Domaine/" + DomaineId + "/Critere")
        .then((response) => (this.criteres = response.data));
    },
    getEncadreurs(EncadreurId) {
      axios
        .get(
          "http://127.0.0.1:8000/api/Etablisement/" + EncadreurId + "/Encadreur"
        )
        .then((response) => (this.encadreurs = response.data));
    },
     getEntreprise(Entreprise) {
      axios
        .get(
          "http://127.0.0.1:8000/api/Entreprise/search/" + Entreprise
        )
        .then((response) => (this.selectedEntreprise = response.data));
    },
      onchange(e){
       
this.file=e.target.files[0];
  },
    onchange1(e){
      
this.file1=e.target.files[0];
  },
    onchange2(e){
      
this.file2=e.target.files[0];
  },
    onchange3(e){
      
this.file3=e.target.files[0];
  },
    onchange4(e){
      
this.file4=e.target.files[0];
  },
    onCreate() {
      let data = new FormData();
      data.append('titre',this.titre);
      data.append('user_id',this.userid);
      data.append('encadreur_id',this.selectedEncadreur);
      data.append('domaine_id',this.selectedDomaine.id);
      data.append('critere_id',this.selectedCritere);
      data.append('description',this.description);
      data.append('fichierpdf',this.file);
      data.append('fichierdemande',this.file1);
      data.append('etablisement_id',this.selectedEtablisement.id);
      data.append('nbpages',this.nbpages);
      data.append('entreprise_id',this.selectedEntreprise);
      data.append('coverimage',this.file2);
      data.append('fichierbrevet',this.file3);
      data.append('fichierrecherche',this.file4);
      axios({
        headers: { 'Content-Type': 'multipart/form-data' },
        method: 'post',
        url: 'http://127.0.0.1:8000/api/DemandeDepot',
        data: data
     })
        .then(response=> {
          console.log("response",response.data)
        }).catch(err=>console.log(err))

    },
  
  },
  
};
</script>