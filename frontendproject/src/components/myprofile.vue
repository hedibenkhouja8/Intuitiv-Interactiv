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