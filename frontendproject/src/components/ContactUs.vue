<template>
  <div>
    <navbar-component />
    <section class="contact_section layout_padding">
      <div class="container">
        <div class="heading_container">
          <h2>Contact Nous</h2>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form_container">
              <Form action="" @submit="onCreate">
                <div>
                  <Field
                    name="nom"
                    :rules="isRequired"
                    placeholder="Nom"
                    v-model="nom"
                  />
                  <ErrorMessage style="color: red" name="nom" />
                </div>
                <div>
                  <Field
                    name="phone"
                    :rules="isRequired"
                    placeholder="Numéro de téléphone"
                    v-model="phone"
                  />
                  <ErrorMessage style="color: red" name="phone" />
                </div>
                <div>
                  <Field
                    name="mail"
                    :rules="validateEmail"
                    type="email"
                    placeholder="Email"
                    v-model="email"
                  />
                  <ErrorMessage style="color: red" name="mail" />
                </div>
                <div>
                  <Field
                    name="description"
                    :rules="Description"
                    v-model="message"
                    type="text"
                    class="message-box"
                    placeholder="Message"
                  />
                   <ErrorMessage style="color: red" name="description" />
                </div>
                <div class="btn_box">
                  <button>Envoyez</button>
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
    </section>
    <footer-component />
  </div>
</template>

<script>
import swal from "sweetalert";
import axios from "axios";
import { Field, Form, ErrorMessage, defineRule } from "vee-validate";
import NavbarComponent from "@/components/navbar.vue";
import FooterComponent from "@/components/footer.vue";
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
export default {
  name: "contactusComponent",
  components: {
    NavbarComponent,
    FooterComponent,
    Field,
    Form,
    ErrorMessage,
  },
  data() {
    return {
      phone: "",
      error: "",
      nom: "",
      email: "",
      message: "",
    };
  },
  methods: {
     Description(value) {
      if (!value) {
        return "champs obligatoire !!";
      }
      if (value.length < 20) {
        return `le message doit etre au moins 20 characters`;
      }
      return true;
    },
    validateEmail(value) {
      // if the field is empty
      if (!value) {
        return "champs obligatoire !!";
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
        return "champs obligatoire !!";
      }

      return true;
    },

    onCreate() {
      let data = new FormData();
      data.append("name", this.nom);
      data.append("email", this.email);
      data.append("phone", this.phone);
      data.append("message", this.message);
      axios({
        headers: { "Content-Type": "multipart/form-data" },
        method: "post",
        url: "http://127.0.0.1:8000/api/sendcontactmail",
        data: data,
      })
        .then((response) => {
          console.log("response", response.data);
          if (response.status === 200) {
            swal(
              "message envoyé!",
              "votre message a été envoyé avec succes !",
              "success"
            );
    window.location.reload();
          }
        })
        .catch((err) => (this.error = err.response.data.errors.email[0]));
    },
  },
};
</script>

<style>
</style>