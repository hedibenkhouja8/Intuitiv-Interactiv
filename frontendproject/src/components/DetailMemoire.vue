<template>
  <div class="">
    <navbar-component />
    <div>
      <section class="about_section layout_padding">
        <div class="container">
          <div class="row" v-bind:key="item.id" v-for="item in info">
            <div class="col-md-3">
              <div>
                <img
                  width="300"
                  height="500"
                  v-bind:src="
                    'http://localhost:8000/storage/files/demandes/cover/' +
                    item.demande_depot.coverimage
                  "
                  alt=""
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="detail-box">
                <div class="heading_container">
                  <h2>titre : {{ item.demande_depot.titre }}</h2>
                  <h6>
                    <strong>
                      Plus de {{ nb }} demandes d'emprunts sur cette
                      memoire</strong
                    >
                  </h6>
                </div>
                <hr />
                <h6>
                  <strong> Etablissement</strong> :
                  {{ item.demande_depot.etablisement.nom }}
                </h6>
                <h6>
                  <br />
                  <strong> Encadreur : </strong
                  >{{ item.demande_depot.encadreur.nom }}
                </h6>
                <h6>
                  <strong> Description :</strong>
                  {{ item.demande_depot.description }}
                </h6>
                <br />
                <h6>
                  <strong> Domaine: </strong
                  >{{ item.demande_depot.domaine.nom }}
                </h6>
                <br />
                <h6>
                  <strong> Critere:</strong>
                  {{ item.demande_depot.critere.nom }}
                </h6>
                <br />

                <h6>
                  <strong> Nombre de pages :</strong>
                  {{ item.demande_depot.nbpages }}
                </h6>
                <h3 v-if="user_status === 'restreint'">
                  Votre compte est désactivé veuillez nous contacter
                </h3>
                 <h3 v-if="x > 0">
                 Vous avez déja demandé d'emprunter cette mémoire
                </h3>
                <h3 v-if="info5.length > 4">
                 Vous avez déja demandé d'emprunter plus de 5 mémoire veuillez attendre qu'une soit accepté ou réfusé
                </h3>
                <br />
                <a
                  v-if="user_id !== null && user_status !== 'restreint' && x<1 && info5.length < 5" 
                  href=""
                  data-toggle="modal"
                  data-target=".bd-example-modal-lg"
                >
                  Empruntez
                </a>
                <router-link v-if="user_id === null" to="/login">
                  Connecter vous pour empruntez cette memoire</router-link
                >
              </div>
            </div>
          </div>
        </div>
        <section class="teacher_section layout_padding">
          <div class="container">
            <div class="heading_container">
              <h2>Les memoires de meme domaine</h2>
            </div>
            <div class="row">
              <div class="col-md-6" v-bind:key="item" v-for="item in dom">
                <div class="course">
                  <img
                    v-bind:src="
                      'http://localhost:8000/storage/files/demandes/cover/' +
                      item.coverimage
                    "
                    width="250"
                    height="380"
                    class="p"
                    alt="..."
                  />

                  <div class="desc">
                    <h3>{{ item.titre }}</h3>
                    <h4>{{ item.user.name }}</h4>
                    <p>{{ item.description }}</p>
                    <span
                      ><button
                        class="btn btn-primary btn-sm btn-course"
                        @click="edit(item.memoire.id, item.domaine_id)"
                      >
                        View Details
                      </button></span
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="btn-box">
              <a href=""> View All </a>
            </div>
          </div>
        </section>
      </section>
      <div
        v-bind:key="item.id"
        v-for="item in info"
        class="modal fade bd-example-modal-lg"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
      >
        <div
          class="modal-dialog modal-dialog-centered"
          id="myModal"
          role="document"
        >
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Demande d'emprunt</h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <Form action="" @submit="onCreate">
              <div class="modal-body">
                <div class="form-group">
                  <h6 for="disabledTextInput">
                    Vous allez Empruntez la memoire
                  </h6>
                  <div class="input-group mb-3 input-group-lg">
                    <input
                      type="text"
                      id="disabledTextInput"
                      class="form-control"
                      :placeholder="item.demande_depot.titre"
                      disabled
                    />
                  </div>
                </div>
                <div class="input-group mb-3 input-group-lg">
                  <div class="input-group-prepend">
                    <span
                      class="input-group-text"
                      id="inputGroup-sizing-default"
                      >Date Debut</span
                    >
                  </div>
                  <Field
                    name="dated"
                    :rules="datedeubt"
                    type="date"
                    class="form-control"
                    aria-label="Sizing example input"
                    v-model="date_debut"
                    aria-describedby="inputGroup-sizing-default"
                  />

                  <ErrorMessage style="color: red" name="dated" />
                </div>
                <div class="input-group mb-3 input-group-lg">
                  <div class="input-group-prepend">
                    <span
                      class="input-group-text"
                      id="inputGroup-sizing-default"
                      >Date Fin</span
                    >
                  </div>
                  <Field
                    name="datef"
                    :rules="datefin"
                    type="date"
                    class="form-control"
                    v-model="date_fin"
                    aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default"
                  />
                  <ErrorMessage style="color: red" name="datef" />
                </div>
                <h6 for="validationCustom03">
                  Dites Pourquoi voulez vous Emprunter cette memoire?
                </h6>
                <div class="input-group mb-3 input-group-lg">
                  <Field
                    name="description"
                    as="textarea"
                    :rules="Description"
                    v-model="description"
                    height="200px"
                    type="text"
                    class="form-control"
                    id="validationCustom03"
                    placeholder="Decrire vos raisons"
                    required
                  ></Field>
                  <ErrorMessage style="color: red" name="description" />
                </div>
                 <h6 v-if="nblimite == 1" style="color: red"
                          >vous avez depassé le nb demandes autorisé !
                        </h6>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                  id="close"
                >
                  Close
                </button>
                <button
                  type="submit"
                  class="btn btn-primary"
                  data-bs-dismiss="modal"
                >
                  Confirmer La demande
                </button>
              </div>
            </Form>
          </div>
        </div>
      </div>
    </div>

    <footer-component />
  </div>
</template>

<script>
import axios from "axios";
import NavbarComponent from "@/components/navbar.vue";
import FooterComponent from "@/components/footer.vue";
import { Field, Form, ErrorMessage } from "vee-validate";
import swal from "sweetalert";
export default {
  props: ["id"],
  name: "DetailMemoire",
  components: {
    NavbarComponent,
    FooterComponent,
    Field,
    Form,
    ErrorMessage,
  },
  data() {
    return {
      info: null,x:null,info5:null,
      memoire_id: this.$route.params.id,
      nb: null,

      username: localStorage.getItem("name"),
      user_id: localStorage.getItem("id"),
      user_status: localStorage.getItem("etatdecompte"),
      description: "",
      status: "EnAttente",
      type: "indefini",
      date_debut: "",
      date_fin: "",
      nblimite: 0,
      nbd: null,
      values: {
        id: this.$route.params.id,
      },
      dom: null,
    };
  }, //
  async mounted() {
    const res = axios.get(
      "http://127.0.0.1:8000/api/Memoire/" +
        this.$route.params.id +
        "/DemandeDepot"
    );
    this.values = (await res).data;
    axios
      .get(
        "http://127.0.0.1:8000/api/Memoire/" +
          this.$route.params.id +
          "/DemandeDepot"
      )
      .then((response) => (this.info = response.data));
       axios
      .get('http://127.0.0.1:8000/api/enattentebyUser/'+localStorage.getItem("id"))
      .then(response => (this.info5 = response.data))
  axios
      .get(
        "http://127.0.0.1:8000/api/MemoireDejaEmprunte/" +
          this.$route.params.id +
          "/"+localStorage.getItem("id")
      )
      .then((response) => (this.x = response.data.length));

    axios
      .get(
        "http://127.0.0.1:8000/api/Memoire/" +
          this.$route.params.id +
          "/DemandeEmprunt"
      )
      .then((response) => (this.nb = response.data.length));
    axios
      .get(
        "http://127.0.0.1:8000/api/MemoireDeMemeDomaine/" + this.$route.params.c
      )
      .then((response) => (this.dom = response.data));
  },
  methods: {
    isRequired(value) {
      if (!value) {
        return "this field is required";
      }

      return true;
    },
    datedeubt(value) {
      if (!value) {
        return "this field is required";
      }
      var varDate = new Date(value); //dd-mm-YYYY
      var today = new Date();
      today.setHours(0,0,0,0);
      if (varDate < today) {
        return "cette date est deja passé ";
      }

      return true;
    },
     datefin(value) {
      if (!value) {
        return "this field is required";
      }
      var varDate = new Date(value); //dd-mm-YYYY
      var today = new Date();
      today.setHours(0,0,0,0);
      var datedeubt = new Date(this.date_debut);
      datedeubt.setHours(0,0,0,0);
      if (varDate <= today) {
        return "cette date est deja passé ";
      }
      if (varDate < datedeubt) {
        return "la date fin doit etre apres la date debut ";
      }
      var nbjours=10;
      var Difference_In_Time = varDate.getTime() - datedeubt.getTime();
      var Days = Difference_In_Time / (1000 * 3600 * 24);
      if(Days>nbjours){
        return "le nombre de jours max est 10 jours  ";
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
    onCreate() {
    
      axios
        .post("http://127.0.0.1:8000/api/DemandeEmprunt", {
          date_debut: this.date_debut,
          date_fin: this.date_fin,
          memoire_id: this.memoire_id,
          user_id: this.user_id,
          description: this.description,                                                                                                     
          status: this.status,
          type: this.type,
        })
        .then((response) => {
          if (response.status === 200) {
            swal(
              "Demande ajouté !",
              "votre demande est en attente de reponse!",
              "success"
            );
            document.getElementById("close").click();

            this.$router.push({ path: "/Memoire" });
          }
        });
     
    },
     deletehedi(id) {
      axios.delete("http://127.0.0.1:8000/api/Memoire/" + id);
    },
    edit(id, c) {
      this.$router.push({
        name: "DetailMemoire",
        params: { id: id, c: c },
      });
    },
   
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
</style>
