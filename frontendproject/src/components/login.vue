<template>
  <div>
    <navbar-component />
    <section class="login_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="detail-box">
              <h3 style="color:white">GET ONLINE COURSES FOR FREE</h3>
              <p style="color:white">
                Create your free account now and get immediate access to 100s of
                online courses
              </p>
              <router-link to="/Register"> REGISTER NOW</router-link>
            </div>
          </div>
          <div class="col-md-6">
            <div class="login_form">
              <h5 style="color:white">Login Now</h5>
              <Form action="" @submit="onCreate">
                <div>
                  <Field
                    name="mail"
                    :rules="validateEmail"
                    type="email"
                    placeholder="Email"
                    v-model="email"
                  />
                  <ErrorMessage style="color: white" name="mail" />
                </div>
                <div>
                  <Field
                    name="password"
                    :rules="isRequired"
                    type="password"
                    v-model="password"
                    placeholder="Password"
                  />
                  <ErrorMessage style="color: white" name="password" />
                </div>
                <button type="submit">Login</button>
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
import axios from "axios";
import NavbarComponent from "@/components/navbar.vue";
import FooterComponent from "@/components/footer.vue";
import { Field, Form, ErrorMessage } from "vee-validate";
export default {
  name: "loginComponent",
  components: {
    NavbarComponent,
    FooterComponent,
    Field,
    Form,
    ErrorMessage,
  },
  data() {
    return {
      email: "",
      password: "",
      values: {
        id: "",
        nom: "",
      },
    };
  },
  methods: {
    isRequired(value) {
      if (!value) {
        return "this field is required !";
      }

      return true;
    },
    validateEmail(value) {
      // if the field is empty
      if (!value) {
        return "This field is required !";
      }
      // if the field is not a valid email
      const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
      if (!regex.test(value)) {
        return "This field must be a valid email !";
      }
      // All is good
      return true;
    },
    onCreate() {
      let data = new FormData();
      data.append("email", this.email);
      data.append("password", this.password);
      axios({
        headers: { "Content-Type": "multipart/form-data" },
        method: "post",
        url: "http://127.0.0.1:8000/api/login",
        data: data,
      })
        .then((response) => {
          console.log("response", response.data);
          localStorage.setItem("token", response.data.token);
          localStorage.setItem("name", response.data.user.name);
          localStorage.setItem("id", response.data.user.id);
          localStorage.setItem("role", response.data.user.role);
          localStorage.setItem("prenom", response.data.user.prenom);
          localStorage.setItem("etatdecompte", response.data.user.etatdecompte);
          localStorage.setItem("profilepic", response.data.user.profilepic);
          localStorage.setItem("tel", response.data.user.tel);
          localStorage.setItem("email", response.data.user.email);

          if (response.status === 201) {
            if (response.data.user.role === "admin") {
              this.$router.push({ path: "/Admin" });
            } else {
              this.$router.push({ path: "/Memoire" });
            }
          }
        })
        .catch((err) => console.log(err));
    },
  },
};
</script>

<style>
</style>