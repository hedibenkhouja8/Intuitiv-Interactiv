<template>
<div>
<div>
    
  <h1> edit</h1>
</div>  
 

 
<div>
<div>
  <br>
  <form @submit.prevent="onupdate">
  <label>name</label> <br>
  <input type="text" class="form-control"  v-model="values.name"/> <br> <br>
  
  <label>lastname</label> <br> <br>

  <input type="text" class="form-control" v-model="values.lastname"/> <br> <br>

  <button class="btn btn-primary " type="submit">update</button> <br> <br>
  <button v-on:click="deletehedi()">dlete</button>
  
  </form></div>
  
</div></div>
</template>

<script>
import axios from 'axios'
export default {
name: 'ItemEdit',
  data () {
    return {
      info: null,
      values :{
      name :'',
      lastname:'',
      }
    }
  },
 async mounted () {
      

const res =axios.get('http://127.0.0.1:8000/api/Memoire/'+this.$route.params.id)
this.values=(await res).data

      
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