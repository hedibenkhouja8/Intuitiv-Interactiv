<template><div>
  <navbar-component />
  <div class="wrapper d-flex align-items-stretch">
    <sidebar-component />
    <div
      id="content"
      class="p-4 p-md-5 pt-5"
      v-bind:key="item.id"
      v-for="item in info"
    >
      <div class="wrapperedit bg-white mt-sm-5">
        <br />
        <h4 class="pb-4 border-bottom" style="margin-left: 30px">
          Account settings
        </h4>
        
        <div
          class="d-flex align-items-start py-3 border-bottom"
          style="margin-left: 30px"
        >
          <img
            v-bind:src="
                      'http://localhost:8000/storage/files/register/profilepic/' +
                      item.profilepic
                    "
                    style="width:50%;"
            class="img"
            alt=""
          />
       
          <div class="pl-sm-4 pl-2" id="img-section">
            <label for="pic"> profile pic</label>
            <input class="form-control" id="pic" type="file" @change="onchange" />
          </div>
        </div>
        <div class="py-2" style="margin-left: 30px">
          <form action="" @submit.prevent="onCreate">
            <div class="row py-2">
              <div class="col-md-6">
                <label for="firstname">Prenom</label>
                <input
                  type="text"
                  v-model="prenom"
                  class="bg-light form-control"
                />
              </div>
              <div class="col-md-6 pt-md-0 pt-3">
                <label for="lastname">Nom</label>
                <input
                  type="text"
                  v-model="username"
                  class="bg-light form-control"
                  placeholder="Smith"
                />
              </div>
            </div>
            <div class="row py-2">
              <div class="col-md-6">
                <label for="email">Email Address</label>
                <input
                  type="text"
                  v-model="email"
                  class="bg-light form-control"
                  placeholder="steve_@email.com"
                />
              </div>
              <div class="col-md-6 pt-md-0 pt-3">
                <label for="phone">Phone Number</label>
                <input
                  type="tel"
                  v-model="tel"
                  class="bg-light form-control"
                  placeholder="+1 213-548-6015"
                />
              </div>
              <div class="col-md-6 pt-md-0 pt-3">
                <label for="phone">Password</label>
                <input
                  type="password"
                  v-model="password"
                  class="bg-light form-control"
                  placeholder="password"
                />
              </div>
            </div>

            <div class="py-3 pb-4 border-bottom">
              <button type="submit" class="btn btn-primary mr-3">Save Changes</button>
              <button class="btn border button">Cancel</button>
            </div>
            </form>
            <div class="d-sm-flex align-items-center pt-3" id="deactivate">
              <div>
                <b>Deactivate your account</b>
                <p>Details about your company account and password</p>
              </div>
              <div class="ml-auto">
                <button class="btn danger">Deactivate</button>
              </div>
            </div>
          
        </div>
      </div>
    </div>
  </div></div>
</template>

<script>
import NavbarComponent from "@/components/navbar.vue";
import sidebarComponent from "@/components/sidebar.vue";
import axios from "axios";
export default {
  name: "parametresComponent",
  components: {
    NavbarComponent,
    sidebarComponent,

  },
  data() {
    return {
      info: null,
      etab: null,
      email: localStorage.getItem("email"),
      username: localStorage.getItem("name"),
      tel: localStorage.getItem("tel"),
      prenom: localStorage.getItem("prenom"),
      id: localStorage.getItem("id"),
      password:'',
      file: null,
      values: {
        name: "",
        lastname: "",
      },
    };
  },
  async mounted() {
    const res = await axios.get(
      "http://127.0.0.1:8000/api/User/" + localStorage.getItem("id")
    );
    this.values = res.data;

    axios
      .get("http://127.0.0.1:8000/api/User/" + localStorage.getItem("id"))
      .then((response) => (this.info = response.data));
    this.values = (await this.info).data;

    this.values.name = "test";
  },
  methods: {
      onchange(e) {
      this.file = e.target.files[0];
    },
    onCreate() {
      let data = new FormData();
      data.append("_method", "put");
      data.append("name", this.username);
      data.append("prenom", this.prenom);
      data.append("email", this.email);
      data.append("password", this.password);
      data.append("tel", this.tel);
      data.append("profilepic", this.file);
      axios({
        headers: { "Content-Type": "multipart/form-data" },
        method: "post",
        url: 'http://127.0.0.1:8000/api/updateuser/'+this.id,
        data: data,
      })
        .then((response) => {
       
if(response.status === 200) {
      localStorage.setItem("name",this.username);
      localStorage.setItem("prenom",this.prenom);
      localStorage.setItem("tel",this.tel);
      localStorage.setItem("email",this.email);
      localStorage.setItem("profilepic",this.file);

      this.$router.push({ path : '/myprofile/'+this.id });
            }
        })
        .catch((err) => console.log(err))
      
    },
  
   
  },
};
</script>

<style>
.wrapperedit {
  border: 1px solid #ddd;
  border-radius: 15px;
  max-width: 900px;
}
#img-section p,
#deactivate p {
  font-size: 12px;
  color: #777;
  margin-bottom: 10px;
  text-align: justify;
}

#img-section b,
#img-section button,
#deactivate b {
  font-size: 14px;
}
</style>