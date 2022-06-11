<template>
  <div>
    <navbar-component />
    <section class="login_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="detail-box">
              <h3 style="color:white"> Vous AVEZ DéJA UN COMPTE ?</h3>
              <p style="color:white">
               Connectez vous maintenant
              </p>
              <router-link to="/login"> Connexion</router-link>
            </div>
          </div>
          <div class="col-md-6">
            <div class="login_form">
              <h5>Inscription</h5>
              <Form action="" @submit="onCreate">
                <Field
                  name="nom"
                  :rules="isRequired"
                  placeholder="Nom"
                  v-model="nom"
                />
                <ErrorMessage style="color: white" name="nom" />
                <Field
                  name="prenom"
                  :rules="isRequired"
                  placeholder="Prenom"
                  v-model="prenom"
                />
                <ErrorMessage style="color: white" name="prenom" />
                <Field
                  name="mail"
                  :rules="validateEmail"
                  type="email"
                  placeholder="Email"
                  v-model="email"
                />
                <ErrorMessage style="color: white" name="mail" />
                <Field
                  id="password"
                  name="password"
                  type="password"
                  rules="required|min:5"
                  class="message-box"
                  placeholder="password"
                  v-model="password"
                />
                <ErrorMessage style="color: white" name="password" />
                <Field
                  id="passwordConfirmation"
                  name="passwordConfirmation"
                  type="password"
                  rules="required|confirmed:@password"
                  class="message-box"
                  placeholder="confirm password"
                  v-model="password_confirmation"
                />
                <ErrorMessage
                  style="color: white"
                  name="passwordConfirmation"
                />
                <input
                  type="text"
                  class="message-box"
                  placeholder="phone +216"
                  v-model="phone"
                />
                <div>
                  <label for=""> Etablisement </label>
                  <Field
                    as="select"
                    name="Etablissement"
                    :rules="isRequired"
                    class="form-select"
                    aria-label="Default select example"
                    v-model="selectedEtablisement"
                  >
                    <option selected>Etablissement</option>
                    <option
                      v-bind:key="etablisement.id"
                      v-bind:value="etablisement.id"
                      v-for="etablisement in etablisements"
                    >
                      {{ etablisement.nom }}
                    </option>
                  </Field>
                  <ErrorMessage style="color: white" name="Etablissement" />
                </div>
                 <label class="hovertext" data-hover="Un fichier qui peut confirmer votre identité universitaire ex : (carte étudiant,cin,attestation de présence)"> Fichier de demande</label>
                <Field name="Pdf"  rules="required|ext:pdf" class="form-control " type="file"  @change="onchange1" />
                 <ErrorMessage style="color: white" name="Pdf" :custom-messages="customMessages" />
            
                <label for=""> Photo de profil</label>
                <Field  name="image" class="form-control" type="file" rules="image" @change="onchange" />
               <ErrorMessage style="color: white" name="image" />
               <br>
                <button type="submit">S'inscrire</button><br><br>
                 <div class="alert alert-danger" v-if="this.error">{{error}}</div>
              </Form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer-component />
  </div>
</template>

<script>
import swal from 'sweetalert';
import { image, ext,required } from '@vee-validate/rules';
import axios from "axios";
import NavbarComponent from "@/components/navbar.vue";
import FooterComponent from "@/components/footer.vue";
import { Field, Form, ErrorMessage, defineRule } from "vee-validate";
import * as yup from "yup";
defineRule('image', image);
defineRule('ext', ext);
defineRule('required', required);



defineRule("required", (value) => {
  if (!value) {
    return "This is required !!";
  }

  return true;
});

defineRule("min", (value, [min]) => {
  if (value && value.length < min) {
    return `Should be at least ${min} characters !!`;
  }

  return true;
});

defineRule("confirmed", (value, [other]) => {
  if (value !== other) {
    return `Passwords do not match !!`;
  }

  return true;
});

export default {
  name: "registerComponent",
  components: {
    NavbarComponent,
    FooterComponent,
    Field,
    Form,
    ErrorMessage,
  },
  data: () => {
    const schema = yup.object().shape({
      password: yup.string().min(5).required(),
      passwordConfirmation: yup
        .string()
        .required()
        .oneOf([yup.ref("password")], "Passwords do not match"),
    });
    return {
      selectedEtablisement: 0,
      schema,
      etablisements: null,
      phone: "",error:"",
      password_confirmation: "",
      nom: "",
      prenom: "",
      email: "",
      password: "",
      file: null,
      file1: null,
      responsevalue: "",
    };
  },
  mounted() {

    axios
      .get("http://127.0.0.1:8000/api/Etablisement")
      .then((response) => (this.etablisements = response.data));
  },
  methods: {
    validateEmail(value) {
      // if the field is empty
      if (!value) {
        return "This field is required !!";
      }
      // if the field is not a valid email
      const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
      if (!regex.test(value)) {
        return "This field must be a valid email !!";
      }
      // All is good
      return true;
    },
    isRequired(value) {
      if (!value) {
        return "this field is required !!";
      }

      return true;
    },
    onchange(e) {
      
      this.file = e.target.files[0];
    },
    onchange1(e) {
      this.file1 = e.target.files[0];
    },

    onCreate() {
      let data = new FormData();
      data.append("name", this.nom);
      data.append("prenom", this.prenom);
      data.append("email", this.email);
      data.append("password", this.password);
      data.append("password_confirmation", this.password_confirmation);
      data.append("tel", this.phone);
      data.append("profilepic", this.file);
      data.append("fichierdemande", this.file1);
      data.append("etablisement_id", this.selectedEtablisement);

      axios({
        headers: { "Content-Type": "multipart/form-data" },
        method: "post",
        url: "http://127.0.0.1:8000/api/register",
        data: data,
      })
        .then((response) => {
          console.log("response", response.data);
          if (response.status === 201) {
            swal("compte créé !", "votre compte a été créé et en attente d'acceptation par un admin!", "success");
            this.$router.push({ path: "/login" });
          }
        })
        .catch((err) => this.error=err.response.data.errors.email[0]);
    },
  },
};
</script>

<style>.hovertext {
  position: relative;
  border-bottom: 1px dotted black;
}

.hovertext:before {
  content: attr(data-hover);
  visibility: hidden;
  opacity: 0;
  width: 200px;
  background-color: rgb(83, 81, 81);
  color: #fff;
  text-align: center;
  border-radius: 5px;
  padding: 5px 0;
  transition: opacity 1s ease-in-out;

  position: absolute;
  z-index: 1;
  left: 0;
  top: 110%;
}

.hovertext:hover:before {
  opacity: 1;
  visibility: visible;
}
</style>