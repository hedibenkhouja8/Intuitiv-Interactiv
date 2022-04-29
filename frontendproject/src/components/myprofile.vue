<template><div>
  <navbar-component/> <div class="wrapper d-flex align-items-stretch">
    <sidebar-component />
    <div id="content" class="p-4 p-md-5 pt-5">
      <section
        style="background-color: #eee"
        v-bind:key="item.id"
        v-for="item in info"
      >
        <div class="container py-5">
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <img
                    v-bind:src="
                      'http://localhost:8000/storage/files/register/profilepic/' +
                      item.profilepic
                    "
                    alt="avatar"
                    class="rounded-circle img-fluid"
                    style="width: 150px"
                  />
                  <h5 class="my-3">{{ username + " " + prenom }}</h5>
                  <p class="text-muted mb-1">{{ item.etablisement.nom }}</p>
                  <div class="d-flex justify-content-center mb-2">
                    <router-link  class="btn btn-primary" to="/parametresprofile"><i class="fa fa-cog"></i> <span>Edit</span></router-link>
                  </div>
                    
                </div>
              </div>
           
              <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li
                      class="
                        list-group-item
                        d-flex
                        justify-content-between
                        align-items-center
                        p-3
                      "
                    >
                      <i class="fas fa-globe fa-lg text-warning"></i>
                      <p class="mb-0">https://mdbootstrap.com</p>
                    </li>
                    <li
                      class="
                        list-group-item
                        d-flex
                        justify-content-between
                        align-items-center
                        p-3
                      "
                    >
                      <i class="fab fa-github fa-lg" style="color: #333333"></i>
                      <p class="mb-0">mdbootstrap</p>
                    </li>
                    <li
                      class="
                        list-group-item
                        d-flex
                        justify-content-between
                        align-items-center
                        p-3
                      "
                    >
                      <i
                        class="fab fa-twitter fa-lg"
                        style="color: #55acee"
                      ></i>
                      <p class="mb-0">@mdbootstrap</p>
                    </li>
                    <li
                      class="
                        list-group-item
                        d-flex
                        justify-content-between
                        align-items-center
                        p-3
                      "
                    >
                      <i
                        class="fab fa-instagram fa-lg"
                        style="color: #ac2bac"
                      ></i>
                      <p class="mb-0">mdbootstrap</p>
                    </li>
                    <li
                      class="
                        list-group-item
                        d-flex
                        justify-content-between
                        align-items-center
                        p-3
                      "
                    >
                      <i
                        class="fab fa-facebook-f fa-lg"
                        style="color: #3b5998"
                      ></i>
                      <p class="mb-0">mdbootstrap</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">
                        {{ username + " " + prenom }}
                      </p>
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ item.email }}</p>
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ item.tel }}</p>
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Etablisement</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ item.etablisement.nom }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                      <p class="mb-4">
                        <span class="text-primary font-italic me-1"
                          >assigment</span
                        >
                        Project Status
                      </p>
                      <p class="mb-1" style="font-size: 0.77rem">Web Design</p>
                      <div class="progress rounded" style="height: 5px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 80%"
                          aria-valuenow="80"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: 0.77rem">
                        Website Markup
                      </p>
                      <div class="progress rounded" style="height: 5px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 72%"
                          aria-valuenow="72"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: 0.77rem">
                        One Page
                      </p>
                      <div class="progress rounded" style="height: 5px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 89%"
                          aria-valuenow="89"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: 0.77rem">
                        Mobile Template
                      </p>
                      <div class="progress rounded" style="height: 5px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 55%"
                          aria-valuenow="55"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: 0.77rem">
                        Backend API
                      </p>
                      <div class="progress rounded mb-2" style="height: 5px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 66%"
                          aria-valuenow="66"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                      <p class="mb-4">
                        <span class="text-primary font-italic me-1"
                          >assigment</span
                        >
                        Project Status
                      </p>
                      <p class="mb-1" style="font-size: 0.77rem">Web Design</p>
                      <div class="progress rounded" style="height: 5px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 80%"
                          aria-valuenow="80"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: 0.77rem">
                        Website Markup
                      </p>
                      <div class="progress rounded" style="height: 5px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 72%"
                          aria-valuenow="72"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: 0.77rem">
                        One Page
                      </p>
                      <div class="progress rounded" style="height: 5px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 89%"
                          aria-valuenow="89"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: 0.77rem">
                        Mobile Template
                      </p>
                      <div class="progress rounded" style="height: 5px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 55%"
                          aria-valuenow="55"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: 0.77rem">
                        Backend API
                      </p>
                      <div class="progress rounded mb-2" style="height: 5px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 66%"
                          aria-valuenow="66"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      </section>
    </div>
  </div>
          </div>
</template>

<script>
import NavbarComponent from "@/components/navbar.vue";
import sidebarComponent from "@/components/sidebar.vue";
import axios from "axios";
export default {
  name: "myprofileComponent",
  components: {
    NavbarComponent,
    sidebarComponent,
  },
  data() {
    return {
      info: null,
      etab: null,
      etabid:'',
      username: localStorage.getItem("name"),

      prenom: localStorage.getItem("prenom"),
      id: localStorage.getItem("id"),
    };
  },
  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/User/" + localStorage.getItem("id"))
      .then((response) => (this.info = response.data));
         axios
      
     
  },
};
</script>

<style>
</style>