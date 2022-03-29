<template>
  <div class="">
   <div v-bind:key="item.id" v-for="item in info">

      <h1>fefefe{{item.lastname}}</h1>
    </div>

    <div id="app">
  {{ info }}
</div>
<div><form @submit.prevent="onCreate">
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
  name: 'HelloWorld',
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
a {
  color: #42b983;
}
</style>
