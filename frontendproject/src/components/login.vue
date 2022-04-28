<template><div>
  <navbar-component/>
  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
              GET ONLINE COURSES FOR FREE
            </h3>
            <p>
              Create your free account now and get immediate access to 100s of
              online courses
            </p>
                       <router-link  to="/Register"> REGISTER NOW</router-link>

          </div>
        </div>
        <div class="col-md-6">
          <div class="login_form">
            <h5>
              Login Now
            </h5>
            <form action="" @submit.prevent="onCreate">
              <div>
                <input type="email" placeholder="Email" v-model="email" />
              </div>
              <div>
                <input type="password"  v-model="password"  placeholder="Password" />
              </div>
              <button type="submit">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer-component/>
          </div>
</template>

<script>
import axios from "axios";
import NavbarComponent from '@/components/navbar.vue'
import FooterComponent from '@/components/footer.vue'
export default {
name: 'loginComponent',
components: {
    NavbarComponent,
    FooterComponent
  },
   data() {
    return {
      email: "",
      password: "",
      values :{
      id:'',
      nom:''
      }
    };
  },
  methods: {
  
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
          localStorage.setItem('token',response.data.token)
          localStorage.setItem('name',response.data.user.name)
          localStorage.setItem('id',response.data.user.id)
          localStorage.setItem('role',response.data.user.role)
          localStorage.setItem('prenom',response.data.user.prenom)
          localStorage.setItem('etatdecompte',response.data.user.etatdecompte)
          localStorage.setItem('profilepic',response.data.user.profilepic)
          localStorage.setItem('tel',response.data.user.tel)
          localStorage.setItem('email',response.data.user.email)

if(response.status === 201) {
            if(response.data.user.role === 'admin') {
             this.$router.push({ path : '/Admin' });
            }
            else{
              this.$router.push({ path : '/Memoire' });
            }
              
            }
        })
        .catch((err) => console.log(err))
      
    },
  },

}
</script>

<style>

</style>