<template><div>
  <navbar-component/>
  <section class="teacher_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Nos Encadreurs
        </h2>
      </div><br><div class="form-row"><div class="col-md-6">
	  <input type="text" class="form-control" placeholder="Nom d'encadreur Ex'Mario research'" height="222px" v-model="q"></div>
	<div class="col-md-6" >   <select  v-model="etablisement"   class="form-control"  
                          > <option disabled value="">Séléctionnez Un  Etablisement</option>
                            <option
                              v-bind:key="etablisement.id"
                              v-for="etablisement in etablisements"
                              :value="etablisement.nom"
                            >
                              {{ etablisement.nom }}
                            </option></select></div></div><br><div class="alert alert-secondary" v-if="(this.q  || this.etablisement) && getfilteredencadreurs.length >1">{{getfilteredencadreurs.length}} Encadreurs trouvées</div>
  <div class="alert alert-danger" v-if="(this.q  || this.etablisement) && getfilteredencadreurs.length === 0">{{getfilteredencadreurs.length}} Aucun encadreur touvé</div>
  <div class="alert alert-secondary" v-if="(this.q || this.etablisement) && getfilteredencadreurs.length === 1">{{getfilteredencadreurs.length}} Un seul encadreur touvé</div>
      <div class="row">
       <div style="margin-left:500px"  v-if="(this.q  || this.etablisement) && getfilteredencadreurs.length === 0">
            <img  style="height:300px;width:300px" src="../assets/images/abc.jpg" alt="">
          </div>
        <div class="col-sm-6 col-lg-3"  v-bind:key="info.id" v-for="info in getfilteredencadreurs">
          <div class="box">
            <div class="img-box">
              <img v-bind:src="'http://localhost:8000/storage/files/encadreurs/profilepic/'+info.profilepic" alt="">
            </div>
            <div class="detail-box">
              <h5 style="color:white">
              <a  @click="edit(info.id)"> {{info.nom}}</a>
              </h5>
              <h6 style="color:white">
           {{info.etablisement.nom}}
              </h6>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          View All
        </a>
      </div>
    </div>
  </section>
  <footer-component/>
          </div>
</template>

<script>
import NavbarComponent from '@/components/navbar.vue'
import FooterComponent from '@/components/footer.vue'
import axios from'axios'
export default {
name: 'encadreursComponent',
  components: {
    NavbarComponent,
    FooterComponent
  },
   data () {
    return {
      infos: [],etablisements:[],loading:true,q:'',etablisement:''
    }
  },  mounted () {
    this.getencadreurs();
	  axios
      .get("http://127.0.0.1:8000/api/Etablisement")
      .then((response) => (this.etablisements = response.data));
   
  },
  
 methods :{edit(id){
this.$router.push({
    name:"DetailEncadreur",
    params : {id:id}
})},
getencadreurs(){
 axios
      .get('http://127.0.0.1:8000/api/Encadreur')
      .then(response => {this.infos = response.data;this.loading=false;})
} , filterProductsByEtablisement: function(infos){
                return infos.filter(info => !info.etablisement.nom.indexOf(this.etablisement))
            }, filterProductsByName: function(infos) {
                return infos.filter(info=>info.nom.toLowerCase().includes(this.q.toLowerCase()));
            },
  },computed:{
	 getfilteredencadreurs: function(){ 
                return this.filterProductsByName(this.filterProductsByEtablisement(this.infos))
            }
  }

}
</script>

<style>

</style>