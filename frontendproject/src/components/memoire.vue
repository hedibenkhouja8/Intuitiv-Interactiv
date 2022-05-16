<template>

<div>
  <navbar-component/>

    <section class="teacher_section layout_padding">


    <div class="container">
        <div class="heading_container heading_center">
       <div class="col-md-6  ">
					<h2 class="text-center">Nos Memoires</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
      <br>
      </div>
      <div class="text-center">
				
        </div>
			<div class="row">
				<div class="col-md-3 col-sm-6 text-center ">
					<div class="services">
						<span class="icon">
							<i class="icon-shop"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Business</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center ">
					<div class="services">
						<span class="icon">
							<i class="icon-heart4"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Medecine</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center ">
					<div class="services">
						<span class="icon">
							<i class="icon-banknote"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Comptabilité</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center ">
					<div class="services">
						<span class="icon">
							<i class="icon-lab2"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Chimie</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center ">
					<div class="services">
						<span class="icon">
							<i class="icon-photo"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Art </a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center ">
					<div class="services">
						<span class="icon">
							<i class="fa fa-minus"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Math</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center ">
					<div class="services">
						<span class="icon">
							<i class="icon-bubble3"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Langues</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center ">
					<div class="services">
						<span class="icon">
							<i class="icon-world"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Informatique</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
			</div>
      <br>
      <div class="heading_container heading_center">
        <h2>
          Memoires
        </h2>
         <div class="btn-box">
        <router-link   to="/adddemandedepot">
     <strong>   Déposer ma propre memoire</strong>
         </router-link>
      </div> </div><br><div class="form-row"><div class="col-md-4">
	  <input type="text" class="form-control" placeholder="Memoire Ex'Big Data research'" height="222px" v-model="q"></div>
	<div class="col-md-4" >   <select  v-model="domaine"   class="form-control"  
                          > <option disabled value="">Séléctionnez Un Domaine</option>
                            <option
                              v-bind:key="domaine.id"
                              v-for="domaine in domaines"
                              :value="domaine.nom"
                            >
                              {{ domaine.nom }}
                            </option></select></div>
						<div class="col-md-4">	  <select v-model="etablisement"  class="form-control"  
                          > <option disabled value="">Séléctionnez Un Etablissement</option>
                            <option
                              v-bind:key="etablisement.id"
                              v-for="etablisement in etablisements"
                              :value="etablisement.nom"
                            >
                              {{ etablisement.nom }}
                            </option></select></div>
        </div><br> <div class="alert alert-secondary" v-if="(this.q || this.domaine || this.etablisement) && getfilteredmemoires.length >1">{{getfilteredmemoires.length}} mémoires trouvées</div>
  <div class="alert alert-danger" v-if="(this.q || this.domaine || this.etablisement) && getfilteredmemoires.length === 0">{{getfilteredmemoires.length}} Aucune mémoire touvée</div>
  <div class="alert alert-secondary" v-if="(this.q || this.domaine || this.etablisement) && getfilteredmemoires.length === 1">{{getfilteredmemoires.length}} Une seule mémoire touvée</div>
  <div class="loader" v-if="loading "></div>
      <div class="row" >
       <div class="col-md-6 " v-for="info in getfilteredmemoires"  v-bind:key="info.id" >
     <div class="course" >
						
						<img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+info.demande_depot.coverimage" width="250" height="380" class="p"  alt="...">
 
						<div class="desc">
							<h4> {{ info.demande_depot.titre}}</h4>
              <h3>{{ info.demande_depot.user.name}}</h3>
              <h3>{{ info.demande_depot.domaine.nom}}</h3>
							<p>{{ info.demande_depot.description}}</p>
							<span><button class="btn btn-primary btn-sm btn-course"  @click="edit(info.id,info.demande_depot.domaine_id)" >View Details</button></span>
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























<footer-component/></div>

</template>

<script>

import axios from 'axios';
import NavbarComponent from '@/components/navbar.vue'
import FooterComponent from '@/components/footer.vue'
export default {
name: 'MemoireComponent',
components: {
    NavbarComponent,
    FooterComponent
  },
  data () {
    return {
      infos: [],
	  q:'',domaine:'',critere:'',domaines:[],criteres:[],etablisements:[],etablisement:'',loading:true,
    }
  },
  mounted () {
    this.getmemoires(); axios
      .get("http://127.0.0.1:8000/api/Domaine")
      .then((response) => (this.domaines = response.data));
	  axios
      .get("http://127.0.0.1:8000/api/Etablisement")
      .then((response) => (this.etablisements = response.data));
   
      
  },
 methods :{edit(id,c){
this.$router.push({
    name:"DetailMemoire",
    params : {id:id,c:c}
})
},getCriteres(DomaineId) {
      axios
        .get("http://127.0.0.1:8000/api/Domaine/" + DomaineId + "/Critere")
        .then((response) => (this.criteres = response.data));
    },
getmemoires(){
 axios
      .get('http://127.0.0.1:8000/api/Memoire')
      .then(response => {this.infos = response.data;this.loading=false;})
} ,
 filterProductsByDomaine: function(infos){
                return infos.filter(info => !info.demande_depot.domaine.nom.indexOf(this.domaine))
            }, filterProductsByEtablisement: function(infos){
                return infos.filter(info => !info.demande_depot.etablisement.nom.indexOf(this.etablisement))
            }, filterProductsByName: function(infos) {
                return infos.filter(info=>info.demande_depot.titre.toLowerCase().includes(this.q.toLowerCase()));
            },
  },computed:{
	 /* getfilteredmemoires(){
		  return this.infos.filter(info =>{
			  return info.demande_depot.titre.toLowerCase().includes(this.q.toLowerCase());
		  })
	  }*/ getfilteredmemoires: function(){ 
                return this.filterProductsByDomaine(this.filterProductsByName(this.filterProductsByEtablisement(this.infos)))
            }
  }
}

</script>

<style>
input{line-height: 2em;}.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #0E3746; /* Blue */
  border-radius: 50%; 
  margin-left: 13cm;
  width: 120px;
  height: 120px;
  animation: spin 10s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>