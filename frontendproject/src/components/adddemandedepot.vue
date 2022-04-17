<template>
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>Contact Us</h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="" @submit.prevent="onCreate">
              <div>
                <input
                  type="text"
                  placeholder="Titre du memoire"
                  v-model="titre"
                />
              </div>
              <div>
                <select
                  class="form-select"
                  aria-label="Default select example"
                  v-model="selectedEntreprise"
                >
                  <option selected>Entreprise d'acceuil</option>
                  <option
                    v-bind:key="entreprise.id"
                    v-for="entreprise in entreprises"
                  >
                    {{ entreprise.nom }}
                  </option>
                </select>
              </div>
              <div>
                <select
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
              <div>
                <select
                  class="form-select"
                  aria-label="Default select example"
                  v-model="selectedCritere"
                >
                  <option></option>
                  <option v-bind:key="critere.id" v-for="critere in criteres">
                    {{ critere.nom }}
                  </option>
                </select>
              </div>

              <div>
                <select
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
              <div>
                <select
                  class="form-select"
                  aria-label="Default select example"
                  v-model="selectedEtablisement"
                >
                  <option></option>
                  <option
                    v-bind:key="encadreur.id"
                    v-for="encadreur in encadreurs"
                  >
                    {{ encadreur.nom }}
                  </option>
                </select>
              </div>

              <div>
                <input class="form-control" type="file" @change="onchange" />
              </div>
              <div>
                <input class="form-control" type="file" @change="onchange1" />
              </div>
              <div>
                <input class="form-control" type="file" @change="onchange2" />
              </div>
              <div>
                <input class="form-control" type="file" @change="onchange3" />
              </div>
              <div>
                <input class="form-control" type="file"  @change="onchange4"/>
              </div>
              <div>
                <input
                  class="form-control"
                  type="number"
                  placeholder="nombre de page"
                  v-model="nbpages"
                />
              </div>
              <div>
                <input
                  type="text"
                  class="message-box"
                  placeholder="Description"
                  v-model="description"
                />
              </div>
              <div class="btn_box">
                <button type="submit">SEND</button>
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
  </section>
</template>
<script>
import axios from "axios";
export default {
  name: "AddDemandeDepotComponent",
  data() {
    return {
      entreprises: null,
      domaines: null,
      selectedDomaine: 0,
      selectedEtablisement: 0,
      selectedCritere: "",
      selectedEntreprise: "",
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
      data.append('titre','hellooussama');
      data.append('user_id',1);
      data.append('encadreur_id',1);
      data.append('domaine_id',1);
      data.append('critere_id',1);
      data.append('memoire_id',1);
      data.append('description','fff');
      data.append('status','ff');
      data.append('fichierpdf',this.file);
      data.append('fichierdemande',this.file1);
      data.append('etablisement_id',1);
      data.append('nbpages',5);
      data.append('entreprise_id',1);
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