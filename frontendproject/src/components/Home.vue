<template>

<h2>Home page 
    
 <div v-bind:key="item.id" v-for="item in info">

      <h3>{{item.id}} {{item.lastname}} {{item.name}} <button v-on:click="deletehedi(item.id)">dlete</button> <button @click="edit(item.id)">edit</button>
</h3>
    </div>
</h2>

  <div>

 
<div>
  <br>
  <form @submit.prevent="onCreate">
  <label>name</label>
  <input type="text" class="form-control" v-model="name"/>
  
  <label>lastname</label>
  <input type="text" class="form-control" v-model="lastname"/>
  <button class="btn btn-primary " type="submit">add</button>
  
  </form></div>
  </div>

</template>

<script>
import axios from 'axios'
export default {
  name: 'HomePage',
  data () {
    return {
      info: null,
      name :'',
      lastname:''
    }
  },
  mounted () {
    axios
      .get('http://127.0.0.1:8000/api/hedis')
      .then(response => (this.info = response.data['hydra:member']))
  },
  methods :{
    onCreate(){
      axios
      .post('http://127.0.0.1:8000/api/hedis',
     {name:this.name,lastname:this.lastname}, )
     .then((response)=>{console.log(response)})
    },
    deletehedi(id){
      axios.delete('http://127.0.0.1:8000/api/hedis/'+id)
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
