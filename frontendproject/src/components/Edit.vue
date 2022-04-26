<template><div>
  <navbar-component/>
<div>  <section class="about_section layout_padding ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
                 </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>{{id}}
                Who We Are
              </h2>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti dolorem eum consequuntur ipsam repellat dolor soluta aliquid laborum, eius odit consectetur vel quasi in quidem, eveniet ab est corporis tempore.
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section></div>
  <footer-component/>
          </div>
</template>

<script>
import axios from 'axios'
import NavbarComponent from '@/components/navbar.vue'
import FooterComponent from '@/components/footer.vue'
export default {
  
    props:['id'],
name: 'ItemEdit',
components: {
    NavbarComponent,
    FooterComponent
  },
  data () {
    return {
      info: null,
      values :{
      name :'',
      lastname:'',
      id:this.$route.params.id,
      },
     
    }
  },
 async mounted () {
      

 const res =axios.get('http://127.0.0.1:8000/api/Memoire/'+this.$route.params.id)
this.values=(await res).data
 axios
      .get('http://127.0.0.1:8000/api/Memoire/'+this.id)
      .then(response => (this.info = response.data))
      
  },
  methods :{
    onupdate(){
      axios
      .put('http://127.0.0.1:8000/api/Memoire/'+this.$route.params.id,
     {name:this.values.name,lastname:this.values.lastname}, )
     .then((response)=>{console.log(response)})
    },
    deletehedi(){ 
      axios.delete('http://127.0.0.1:8000/api/Memoire/'+this.$route.params.id)
    }
  }
}


</script>

<style>

</style>