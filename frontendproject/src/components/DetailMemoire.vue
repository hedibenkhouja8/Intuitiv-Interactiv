<template>
<div>
  <!-- end contact section -->
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
      date_acceptation:'',
      demande_depot_id:''
      }
    }
  },
    mounted () {
      
  
    axios.get('http://127.0.0.1:8000/api/Memoire')
.then(response => (this.info = response.data))   

    axios
      .get('http://127.0.0.1:8000/api/Memoire/'+this.id)
      .then(response => (this.info = response.data))
      
  
    const id =this.$route.params.id;
    axios.get('http://127.0.0.1:8000/api/Memoire/'+id)

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
