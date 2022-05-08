<template>
  <div>
    <navbar-component />
    <div class="wrapper d-flex align-items-stretch">
      <sidebar-component />
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Ajouter votre propre Memoire</h2>
   
        <div class="row">
          <div class="col-md-20">
            <div class="white_shd full margin_bottom_30">
              <div class="full graph_head">
                <div class="heading1 margin_0">
                  <h4>
                    Veuillez Remplir la formulaire attentivement avec tous les
                    fichiers nécessaires
                    <small style="font-size: 15px">(*) champ obligatoire</small>
                  </h4>
                </div>
              </div>

              <div class="table_section padding_infor_info">
                <div class="col-md-12">
                  <div class="row">
                    <Form action="" @submit="onCreate">
                      <div class="row">
                        <div class="col-md-8">
                          <label for="basic-url" class="form-label"
                            >Titre du memoire *</label
                          >
                          <Field
                            name="titre"
                            :rules="isRequired"
                            class="form-control"
                            type="text"
                            placeholder="Titre "
                            v-model="titre"
                            
                          />
                          <ErrorMessage style="color: red" name="titre" />
                        </div>
                        <div class="col-md-4">
                          <label for="basic-url" class="form-label"
                            >Entreprise d'acceuil *</label
                          ><Field
                            as="select"
                            name="entreprise"
                            :rules="isRequired"
                            class="form-select"
                            aria-label="Default select example"
                            v-model="selectedEntreprise"
                            placeholder="entreprise"
                          >
                            <option selected>Entreprise d'acceuil</option>
                            <option
                              v-bind:key="entreprise.id"
                              v-bind:value="entreprise.id"
                              v-for="entreprise in entreprises"
                            >
                              {{ entreprise.nom }}
                            </option>
                          </Field>
                          <ErrorMessage style="color: red" name="entreprise" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <label for="basic-url" class="form-label"
                            >Domaine de la memoire *</label
                          >
                          <Field
                            as="select"
                            name="Domaine"
                            :rules="isRequired"
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
                          </Field>
                          <ErrorMessage style="color: red" name="Domaine" />
                        </div>
                        <div class="col-md-4">
                          <label for="basic-url" class="form-label"
                            >Critere de la memoire *</label
                          >
                          <Field
                            as="select"
                            name="critere"
                            :rules="isRequired"
                            class="form-select"
                            aria-label="Default select example"
                            v-model="selectedCritere"
                          >
                            <option selected>critere</option>
                            <option
                              v-bind:key="critere.id"
                              v-bind:value="critere.id"
                              v-for="critere in criteres"
                            >
                              {{ critere.nom }}
                            </option>
                          </Field>
                          <ErrorMessage style="color: red" name="critere" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <label for="basic-url" class="form-label"
                            >Etablissement *</label
                          >
                          <Field
                            as="select"
                            name="Etablissement"
                            :rules="isRequired"
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
                          </Field>
                          <ErrorMessage style="color: red" name="Etablissement" />
                        </div>
                        <div class="col-md-4">
                          <label for="basic-url" class="form-label"
                            >Encadreur *</label
                          >
                          <Field
                            as="select"
                            :rules="isRequired"
                            name="encadreur"
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
                          </Field>
                          <ErrorMessage style="color: red" name="encadreur" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <label for="basic-url" class="form-label"
                            >Fichier initial de la memoire *</label
                          >
                          
                          <Field name="Fichier initial"  rules="required|ext:pdf"
                            class="form-control"
                            type="file"
                            @change="onchange"
                          />
                          <ErrorMessage style="color: red" name="Fichier initial" />
                          
                        </div>
                        <div class="col-md-4">
                          <label for="basic-url" class="form-label"
                            >Fichier de la demande *</label
                          >
                         <Field name="Fichier de la demande"  rules="required|ext:pdf"
                            class="form-control"
                            type="file"
                            @change="onchange1"
                          />
                          <ErrorMessage style="color: red" name="Fichier de la demande" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <label for="basic-url" class="form-label"
                            >Photo de Couverture *</label
                          >
                          <Field name="Photo de Couverture"  rules="required|image"
                            class="form-control"
                            type="file"
                            @change="onchange2"
                          />
                          <ErrorMessage style="color: red" name="Photo de Couverture" />
                        </div>
                        <div class="col-md-4">
                          <label for="basic-url" class="form-label"
                            >Fichier du brevet</label
                          >
                          <Field name="Fichier du brevet"  rules="ext:pdf"
                            class="form-control"
                            type="file"
                            @change="onchange3"
                          />
                          <ErrorMessage style="color: red" name="Fichier du brevet" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <label for="basic-url" class="form-label"
                            >Fichier du recherche</label
                          >
                          <Field name="Fichier du recherche"  rules="ext:pdf"
                            class="form-control"
                            type="file"
                            @change="onchange4"
                          />
                          <ErrorMessage style="color: red" name="Fichier du recherche" />
                        </div>
                        <div class="col-md-4">
                          <label for="basic-url" class="form-label"
                            >Nombre de pages</label
                          >
                          <Field
                            class="form-control"
                            type="number"
                            name="nbpages"
                            placeholder="nombre de page"
                            v-model="nbpages"
                            :rules="isRequired"
                            min="0"
                          />
                          <ErrorMessage style="color: red" name="nbpages" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="basic-url" class="form-label"
                            >Description</label
                          >
                          <Field
                            as="textarea"
                            style="height: 200px"
                            class="form-control"
                            type="text"
                            name="Description"
                            placeholder="Description"
                            v-model="description"
                            :rules="Description"
                            
                          ></Field>
                          <ErrorMessage style="color: red" name="Description" />
                        </div>
                      </div>
                      <br />
                      <div class="input-group mb-3">
                        <button
                          
                          type="submit"
                          class="btn btn-dark"
                          style="background-color: #0e3746"
                        >
                          Déposer ma demande
                        </button>
                      </div>
                    </Form>
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
      </div>
    </div>
  </div>
</template>
<script>
import NavbarComponent from "@/components/navbar.vue";
import sidebarComponent from "@/components/sidebar.vue";
import axios from "axios";
import swal from 'sweetalert';
import { image, ext,required } from '@vee-validate/rules';
defineRule('image', image);
defineRule('ext', ext);
defineRule('required', required);
import { Field, Form, ErrorMessage,defineRule } from "vee-validate";
export default {
  name: "AddDemandeDepotComponent",
  components: {
    NavbarComponent,
    sidebarComponent,
    Field,
    Form,
    ErrorMessage,
  },

  data() {
    return {
      entreprises: null,
      domaines: null,
      selectedDomaine: 0,
      selectedEtablisement: 0,
      selectedCritere: "",
      selectedEntreprise: "",
      selectedEncadreur: "",
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
      userid: localStorage.getItem("id"),
      testres: "",
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
  
    isRequired(value) {
      if (!value) {
        return "this field is required";
      }

      return true;
    },
    Description(value) {
     if (!value) {
        return "this field is required";
      }
  if (value.length < 20) {
    return `This field must be at least 20 characters`;
  }
  return true;
    },
    
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
        .get("http://127.0.0.1:8000/api/Entreprise/search/" + Entreprise)
        .then((response) => (this.selectedEntreprise = response.data));
    },
    onchange(e) {
      this.file = e.target.files[0];
    },
    onchange1(e) {
      this.file1 = e.target.files[0];
    },
    onchange2(e) {
      this.file2 = e.target.files[0];
    },
    onchange3(e) {
      this.file3 = e.target.files[0];
    },
    onchange4(e) {
      this.file4 = e.target.files[0];
    },
    onCreate() {
        swal({
  title: "Are you sure?",
  text: " ajouté la demande ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    let data = new FormData();
      data.append("titre", this.titre);
      data.append("user_id", this.userid);
      data.append("encadreur_id", this.selectedEncadreur);
      data.append("domaine_id", this.selectedDomaine.id);
      data.append("critere_id", this.selectedCritere);
      data.append("description", this.description);
      data.append("fichierpdf", this.file);
      data.append("fichierdemande", this.file1);
      data.append("etablisement_id", this.selectedEtablisement.id);
      data.append("nbpages", this.nbpages);
      data.append("entreprise_id", this.selectedEntreprise);
      data.append("coverimage", this.file2);
      data.append("fichierbrevet", this.file3);
      data.append("fichierrecherche", this.file4);
      axios({
        headers: { "Content-Type": "multipart/form-data" },
        method: "post",
        url: "http://127.0.0.1:8000/api/DemandeDepot",
        data: data,
      })
        .then((response) => {
          this.testres = response.data;
          console.log("response", response.data);
        })
        .catch((err) => console.log(err));
swal("Demande ajouté !", "votre demande est en attente de reponse!", "success");
this.$router.push({ path: "/mesdemandes" });
  } else {
    swal("demande non ajouté");
  }
});
      
},
  },
};
</script>