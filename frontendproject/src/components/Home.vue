<template><div>
  <navbar-component/>
<div>
<div class="hero_area">
<section class="slider_section ">
      <div class="slider_bg_box">
        <div class="bg_img_box">
          <img src="../assets/images/slider-bg.jpg" alt="">
</div>
      </div>
      <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 mx-auto">
                  <div class="detail-box">
                    <h1 style="color:white">
                     Bienvenue dans notre <br>
                      Bibliothèque
                    </h1>
                    <p style="color:white">
              
                   Empruntez et partagez des mémoires en ligne quand vous voulez ,où vous voulez        </p>
                    <div class="btn-box">
                                     <router-link  class="btn1"  to="/about">
     <strong>   Présentation</strong>
         </router-link>
                      
                    
                       <router-link  class="btn2"  to="/memoire">
     <strong>   Nos mémoires</strong>
         </router-link>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 mx-auto">
                  <div class="detail-box">
                    <h1 style="color:white">
                     Bienvenue dans notre <br>
                      Bibliothèque
                    </h1>
                    <p style="color:white">
               
                   Empruntez et partagez des mémoires en ligne quand vous voulez ,où vous voulez                 </p>
                      <div class="btn-box">
                                     <router-link  class="btn1"  to="/about">
     <strong>   Présentation</strong>
         </router-link>
                      
                    
                       <router-link  class="btn2"  to="/memoire">
     <strong>   Nos mémoires</strong>
         </router-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 mx-auto">
                  <div class="detail-box">
                     <h1 style="color:white">
                     Bienvenue dans notre <br>
                      Bibliothèque
                    </h1>
                    <p style="color:white">
                   Empruntez et partagez des mémoires en ligne quand vous voulez ,où vous voulez </p>
                       <div class="btn-box">
                                     <router-link  class="btn1"  to="/about">
     <strong>   Présentation</strong>
         </router-link>
                      
                    
                       <router-link  class="btn2"  to="/memoire">
     <strong>   Nos mémoires</strong>
         </router-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel" data-slide-to="1"></li>
          <li data-target="#customCarousel" data-slide-to="2"></li>
        </ol>
      </div>
    </section>
    <!-- end slider section -->
  </div>
  <!-- end about section -->

 
  <section class="about_section layout_padding ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="../assets/images/about-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Qui nous sommes 
              </h2>
            </div>
            <p>
            On vous présente notre bibliothèque universitaire en ligne où vous pouvez partagez vos mémoires ou empruntez d'autres librement en toutes sécurité </p><p>N'hesitez pas a nous joindre</p>
             <router-link   to="/memoire">
     <strong>   Nos mémoires</strong>
         </router-link>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- course section start -->

  <section class="course_section layout_padding">
    <div class="course_bg_box ">
      <div class="bg_img_box">
        <img src="../assets/images/course-bg.jpg" alt="">
      </div>
    </div>
    <div class="container-fluid pr-0">
      <div class="heading_container">
        <h2>
       Mémoires récennement ajoutés
        </h2>
     <br>
      </div>
     <div class="row" style="margin-left: 100px">   
       <div class="col-md-6 " v-for="info in infos"  v-bind:key="info.id" >
     <div class="course"  >
						
						<img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+info.demande_depot.coverimage" width="250" height="380" class="p"  alt="...">
 
						<div class="desc">
							<h4> {{ info.demande_depot.titre}}</h4>
              <h3>{{ info.demande_depot.user.name}}</h3>
              <h3>{{ info.demande_depot.domaine.nom}}</h3>
							<p>{{ info.demande_depot.description}}</p>
							<span><button class="btn btn-primary btn-sm btn-course"  @click="edit(info.id,info.demande_depot.domaine_id)" >Voir Details</button></span>
						</div>
					</div>
       </div>
      
      </div>
    </div>
  </section>
<br>
  <!-- course section ends -->

  <!-- teacher section -->

  <section class="teacher_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Nos Encadreurs
        </h2>
      </div>
      <div class="row">
        
            <div class="col-sm-6 col-lg-3"  v-bind:key="info.id" v-for="info in infos2">
          <div class="box">
            <div class="img-box">
              <img v-bind:src="'http://localhost:8000/storage/files/encadreurs/profilepic/'+info.profilepic" alt="">
            </div>
            <div class="detail-box">
              <h5 style="color:white">
              <a   @click="edit2(info.id)"> {{info.nom}}</a>
              </h5>
              <h6 style="color:white">
           {{info.etablisement.nom}}
              </h6>
            </div>
          </div>
        </div>
        
      </div>
      <div class="btn-box">
        <router-link  class="btn1"  to="/encadreurs">
     <strong>   Voir tous les encadreurs</strong>
         </router-link>
      </div>
    </div>
  </section>

  <!-- end teacher section -->

  <!-- client section -->

  <section class="client_section ">
    <div class="container">
      <div class="heading_container">
        <h2>
         Nos étudiants
        </h2>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="../assets/images/client.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                      Chahrazed Ben Khouja
                      </h6>
                    </div>
                    <p>
                     Etablissement : Faculté de medecine de Tunis
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="../assets/images/ouss.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Oussema Ben Abid
                      </h6>
                    </div>
                    <p>
                   
                     Etablissement : Institut Superieur des etudes technologiques de Bizerte
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="../assets/images/client.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Siaalya Martin
                      </h6> 
                    </div>
                    <p>
                     
                   
                     Etablissement : Institut Superieur des etudes technologiques de Nabeul
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- contact section -->
  <section class="contact_section layout_padding">
      <div class="container">
        <div class="heading_container">
          <h2>Contactez Nous</h2>
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
  <!-- end contact section -->
</div>
<footer-component/>
          </div>
</template>

<script>
import NavbarComponent from '@/components/navbar.vue'
import swal from "sweetalert";
import FooterComponent from '@/components/footer.vue'
import { Field, Form, ErrorMessage, defineRule } from "vee-validate";
import axios from 'axios'
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
  name: 'HomePage',


  components: {
    NavbarComponent,
    FooterComponent
, Field,
    Form,
    ErrorMessage,  },
  data () {
    return {
      infos: null, infos2: null,
      name :'',
      lastname:'',
      list:undefined,  phone: "",
      error: "",
      nom: "",
      email: "",
      message: "",
    }
  },
  mounted () {
    axios.get('http://127.0.0.1:8000/api/MemoireX')
.then(response => (this.infos = response.data))   
axios
      .get('http://127.0.0.1:8000/api/EncadreurX')
      .then(response => (this.infos2 = response.data))
   
  },
  methods :{
   
    deletehedi(id){
      axios.delete('http://127.0.0.1:8000/api/Memoire/'+id)
    },edit(id,c){
this.$router.push({
    name:"DetailMemoire",
    params : {id:id,c:c}
})
},edit2(id){
this.$router.push({
    name:"DetailEncadreur",
    params : {id:id}
})},
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
  }
}

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
a {
  color: #42b983;
}
</style>
