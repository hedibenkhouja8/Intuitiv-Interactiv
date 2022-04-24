<template>

<div>
  <navbar-component/>

    <section class="teacher_section layout_padding">


    <div class="container">
        <div class="heading_container heading_center">
       <div class="col-md-6  ">
					<h2 class="text-center">Memoire categories</h2>
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
							<h3><a href="#">Health &amp; Psychology</a></h3>
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
							<h3><a href="#">Accounting</a></h3>
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
							<h3><a href="#">Science &amp; Technology</a></h3>
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
							<h3><a href="#">Art &amp; Media</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center ">
					<div class="services">
						<span class="icon">
							<i class="icon-home-outline"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Real Estate</a></h3>
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
							<h3><a href="#">Language</a></h3>
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
							<h3><a href="#">Web &amp; Programming</a></h3>
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
          faire une Demande depot 
         </router-link>
      </div>
      <br>
      </div>
      <div class="row" >
       <div class="col-md-6 "  v-bind:key="item.id" v-for="item in info">
     <div class="course" >
						<a href="#" class="course-img" style="background-image: url(http://localhost:8000/storage/files/demandes/cover/+ {{ item.demande_depot.coverimage }});">
						</a>
						<div class="desc">
							<h3> {{ item.demande_depot.titre}}</h3>
              <h4>{{ item.demande_depot.user.name}}</h4>
							<p>{{ item.demande_depot.description}}</p>
							<span><button class="btn btn-primary btn-sm btn-course"  @click="edit(item.id,item.demande_depot.domaine_id)" >View Details</button></span>
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
      info: null
    }
  },
  mounted () {
    
    axios
      .get('http://127.0.0.1:8000/api/Memoire')
      .then(response => (this.info = response.data))
      
  },
 methods :{edit(id,c){
this.$router.push({
    name:"DetailMemoire",
    params : {id:id,c:c}
})
},/* <embed controlslist="nodownload" v-bind:src="'http://localhost:8000/storage/files/demandes/pdf/'+item.demande_depot.fichierpdf" toolbar=0 width="500" height="375" 
 type="application/pdf">*/
  }
}

</script>

<style>

</style>