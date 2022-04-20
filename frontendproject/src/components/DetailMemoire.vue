<template>
  <navbar-component/>
<div>
  <section class="about_section layout_padding ">
    <div class="container">
      <div class="row" v-bind:key="item.id" v-for="item in info">
        <div class="col-md-6">
          <div class="img-box">
            <img width="200" height="600" v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.demande_depot.coverimage" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>{{item.id}}
               titre : {{ item.demande_depot.titre}}
              </h2>
            </div>
            <h3>
             desc : {{ item.demande_depot.description }}
             id domaine:{{item.demande_depot.domaine_id}}
            </h3>
            <p>
               date : {{ item.date_acceptation}} {{item.id}}
            </p>
            <p>
             nb pages : {{ item.demande_depot.nbpages}}
            </p>
            <a href="" data-toggle="modal" data-target=".bd-example-modal-lg">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>   <section class="teacher_section layout_padding">
    <div class="container">
      <div class="heading_container ">
        <h2>
          Les memoires de meme domaine
        </h2>
      </div>
      <div class="row">
       
     
      
         <div class="col-sm-6 col-lg-3" v-bind:key="item" v-for="item in info">
          <div class="box">
            <div class="img-box">
              <img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.demande_depot.coverimage" width=" 50" height="350" alt="">
             
            </div>
            <div class="detail-box">
              <h5>
                {{ item.date_acceptation}} {{item.id}}
              </h5>
              <h6>
                {{ item.demande_depot.titre}}
              </h6>
              <button @click="edit(item.id)">edit</button>
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
  </section>
<div v-bind:key="item.id" v-for="item in info" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" id="myModal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Demande d'emprunt </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div><form @submit.prevent="onCreate">
      <div class="modal-body">   <div class="form-group">
      <h6 for="disabledTextInput">Vous allez Empruntez la memoire </h6> <div class="input-group mb-3 input-group-lg">
      <input type="text" id="disabledTextInput" class="form-control" :placeholder="item.demande_depot.titre" disabled></div>
    </div>
      <div class="input-group mb-3 input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Date Debut</span>
  </div>
  <input type="date" class="form-control" aria-label="Sizing example input" v-model="date_debut" aria-describedby="inputGroup-sizing-default">
</div> <div class="input-group mb-3 input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Date Fin</span>
  </div>
  <input type="date" class="form-control" v-model="date_fin" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
      <h6 for="validationCustom03">Dites Pourquoi voulez vous Emprunter cette memoire?</h6>
      <div class="input-group mb-3 input-group-lg">
      <textarea v-model="description" type="text" class="form-control" id="validationCustom03" placeholder="Decrire vos raisons" required></textarea>
     
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" class="btn btn-primary" data-bs-dismiss="modal" >Confirmer La demande</button>
        
      </div></form>
    </div>
  </div>
</div>  
          </div>
          <footer-component/>

</template>

<script>
import axios from 'axios'
import NavbarComponent from '@/components/navbar.vue'
import FooterComponent from '@/components/footer.vue'
export default {
  props:['id'],
  name: 'DetailMemoire',
  components: {
    NavbarComponent,
    FooterComponent
  },
  data () {
    return {
     info: null,
     memoire_id:this.$route.params.id,
     user_id:5,
     description:'',
     status:'en attente',
     type:'indefini',
     date_debut:'',
     date_fin:'',
     values :{
      id:this.$route.params.id,
      },x:null
     
     
    }
  },
     async mounted () {
      
const res =axios.get('http://127.0.0.1:8000/api/Memoire/'+this.$route.params.id+'/DemandeDepot')
this.values=(await res).data
         axios
      .get('http://127.0.0.1:8000/api/Memoire/'+this.$route.params.id+'/DemandeDepot')
      .then(response => (this.info = response.data))
        axios
      .get('http://127.0.0.1:8000/api/Domaine/'+this.$route.params.id+'/Memoire')
      .then(response => (this.x = response.data))

  },
  methods :{
    onCreate(){
      axios
      .post('http://127.0.0.1:8000/api/DemandeEmprunt',
     {date_debut:this.date_debut,date_fin:this.date_fin,memoire_id:this.memoire_id,user_id:this.user_id,description:this.description,status:this.status,type:this.type} )
     .then((response)=>{if(response.status === 201) {
            
               this.$router.push({ path : '/Memoire' });
            }
            })
    },
    deletehedi(id){
      axios.delete('http://127.0.0.1:8000/api/Memoire/'+id)
    },edit(id){
this.$router.push({
    name:"Edit",
    params : {id:id}
})
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
</style>
