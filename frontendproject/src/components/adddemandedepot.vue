<template> <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Contact Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" placeholder="Titre du memoire" />
              </div>
              <div>
                <input type="text" placeholder="Etablissement" />
              </div>
              <div><select class="form-select" aria-label="Default select example">
  <option selected>Entreprise d'acceuil</option>
  <option  v-bind:key="entreprise.id" v-for="entreprise in entreprises ">{{entreprise.nom}}</option>
</select></div>
              <div><select class="form-select" aria-label="Default select example" v-model="selectedDomaine" v-on:change="getCriteres(selectedDomaine.id)">
  <option selected>Domaine</option>
  <option  v-bind:key="domaine.id" v-for="domaine in domaines " :value="domaine">{{domaine.nom}}</option>
</select></div>
  <div><select class="form-select" aria-label="Default select example" >
  <option ></option>
  <option  v-bind:key="critere.id" v-for="critere in criteres ">{{critere.nom}}</option>
</select></div>



  <div><select class="form-select" aria-label="Default select example" v-model="selectedEtablisement" v-on:change="getEncadreurs(selectedEtablisement.id)">
  <option selected>Etablissement</option>
  <option  v-bind:key="etablisement.id" v-for="etablisement in etablisements " :value="etablisement">{{etablisement.nom}}</option>
</select></div>
  <div><select class="form-select" aria-label="Default select example" >
  <option ></option>
  <option  v-bind:key="encadreur.id" v-for="encadreur in encadreurs ">{{encadreur.nom}}</option>
</select></div>





              <div >
  <input class="form-control" type="file" placeholder="" >
</div>        <div >
  <input class="form-control" type="file" placeholder="" >
</div>        <div >
  <input class="form-control" type="file" placeholder="" >
</div>        <div >
  <input class="form-control" type="file" placeholder="" >
</div>
              <div>
                <input type="file" placeholder="Fichier de la memoire" />
              </div>
                      <div >
  <input class="form-control" type="number" placeholder="nombre de page" >
</div>
              <div>
                <input type="text" class="message-box" placeholder="Description" />
              </div>
              <div class="btn_box">
                <button>
                  SEND
                </button>
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

import axios from 'axios';
export default {
name: 'AddDemandeDepotComponent',
  data () {
    return {
      entreprises: null,
      domaines: null,
      selectedDomaine:0,
      selectedEtablisement:0,
      selectedCritere:'',
      criteres: null,
      etablisements: null,
      encadreurs: null
    }
  },
  mounted () {
    axios
      .get('http://127.0.0.1:8000/api/Entreprise')
      .then(response => (this.entreprises = response.data));
    
    axios
      .get('http://127.0.0.1:8000/api/Domaine')
      .then(response => (this.domaines = response.data));
    axios
      .get('http://127.0.0.1:8000/api/Etablisement')
      .then(response => (this.etablisements = response.data));
   
  },
  methods: {
  getCriteres(DomaineId){
     axios
      .get('http://127.0.0.1:8000/api/Domaine/'+DomaineId+'/Critere')
      .then(response =>( this.criteres = response.data));
  },
  getEncadreurs(EncadreurId){
     axios
      .get('http://127.0.0.1:8000/api/Etablisement/'+EncadreurId+'/Encadreur')
      .then(response =>(this.encadreurs = response.data));
  }
}, 

}

</script>