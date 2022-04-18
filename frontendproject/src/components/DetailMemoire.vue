<template>
  <section class="about_section layout_padding ">
    <div class="container">
      <div class="row" v-bind:key="item.id" v-for="item in info">
        <div class="col-md-6">
          <div class="img-box">
            <img v-bind:src="'http://localhost:8000/storage/files/demandes/cover/'+item.demande_depot.coverimage" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
               titre : {{ item.demande_depot.titre}}
              </h2>
            </div>
            <p>
             desc : {{ item.demande_depot.description }}
            </p>
            <p>
               date : {{ item.date_acceptation}}
            </p>
            <p>
             nb pages : {{ item.demande_depot.nbpages}}
            </p>
           
          </div>
        </div>
      </div>
    </div>
  </section>
<div>
 
</div>
</template>

<script>
import axios from 'axios'
export default {
  props:['id'],
  name: 'DetailMemoire',
  data () {
    return {
     info: null,
     values :{
      name :'',
      lastname:'',
      id:this.$route.params.id,
      }
     
    }
  },
     async mounted () {
      
const res =axios.get('http://127.0.0.1:8000/api/Memoire/'+this.$route.params.id+'/DemandeDepot')
this.values=(await res).data
         axios
      .get('http://127.0.0.1:8000/api/Memoire/'+this.$route.params.id+'/DemandeDepot')
      .then(response => (this.info = response.data))

  },
  methods :{
    onCreate(){
      axios
      .post('http://127.0.0.1:8000/api/Memoire',
     {name:this.name,lastname:this.lastname}, )
     .then((response)=>{console.log(response)})
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
a {
  color: #42b983;
}
</style>
