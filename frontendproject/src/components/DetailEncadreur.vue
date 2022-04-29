<template><div class="">
  <navbar-component/>
<div>
  <section class="about_section layout_padding ">
    <div class="container">
      <div class="row" v-bind:key="item.id" v-for="item in info">
        <div class="col-md-4">
          <div >
            <img v-bind:src="'http://localhost:8000/storage/files/encadreurs/profilepic/'+item.profilepic"  width="400" height="500"  alt="">
          </div>
        </div>
        <div class="col-md-4">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
               Nom et Prénom : {{ item.nom}}&nbsp; {{ item.prenom}}
              </h2>
            </div>
            <h3>
             Etablissement : 
          
            </h3><strong>{{ item.etablisement.nom }}</strong>
            <h2>Description :</h2><strong>{{ item.description}}</strong>
            <h3>
               Devenue membre le :
            </h3><strong> {{ formatDate(item.created_at)}} </strong>
          
      
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
       
     
      
            <div class="col-md-6 "  v-bind:key="item" v-for="item in dom">
     <div class="course" >
						
						<img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.coverimage" width="250" height="380" class="p"  alt="...">
 
						<div class="desc">
							<h3> {{ item.titre}}</h3>
              <h4>{{ item.user.name}}</h4>
							<p>{{ item.description}}</p>
							<span><button class="btn btn-primary btn-sm btn-course"  @click="edit(item.memoire.id,item.domaine_id)" >View Details</button></span>
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
          </div>
          <footer-component/>
          </div>
</template>

<script>
import axios from 'axios'
import NavbarComponent from '@/components/navbar.vue'
import FooterComponent from '@/components/footer.vue'
export default {
  props:['id'],
  name: 'DetailEncadreurComponent',
  components: {
    NavbarComponent,
    FooterComponent
  },
  data () {
    return {
     info: null,
     memoire_id:this.$route.params.id,
     
      username: localStorage.getItem('name'),
      user_id: localStorage.getItem('id'),
      user_status:localStorage.getItem('etatdecompte'),
     description:'',
     status:'EnAttente',
     type:'indefini',
     date_debut:'',
     date_fin:'',
     values :{
      id:this.$route.params.id,
      },dom:null,
     
     
    }
  },//
     async mounted () {
      
const res =axios.get('http://127.0.0.1:8000/api/Memoire/'+this.$route.params.id+'/DemandeDepot')
this.values=(await res).data
         axios
      .get('http://127.0.0.1:8000/api/Encadreur/'+this.$route.params.id)
      .then(response => (this.info = response.data))
axios
      .get('http://127.0.0.1:8000/api/MemoireEncadreur/'+this.$route.params.id)
      .then(response => (this.dom = response.data))

  },
  methods :{
    onCreate(){
      axios
      .post('http://127.0.0.1:8000/api/DemandeEmprunt',
     {date_debut:this.date_debut,date_fin:this.date_fin,memoire_id:this.memoire_id,user_id:this.user_id,description:this.description,status:this.status,type:this.type} )
     .then((response)=>{if(response.status === 201) {
            document.getElementById('close').click();
               this.$router.push({ path : '/Memoire' });
            }
            })
    },
    deletehedi(id){
      axios.delete('http://127.0.0.1:8000/api/Memoire/'+id)
    },edit(id,c){
this.$router.push({
    name:"DetailMemoire",
    params : {id:id,c:c}
});
},  formatDate(dateString) {
            const date = new Date(dateString);
                // Then specify how you want your dates to be formatted
            return new Intl.DateTimeFormat('default', {dateStyle: 'long'}).format(date);
        }
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
