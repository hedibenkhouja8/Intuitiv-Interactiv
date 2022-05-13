<template>
        
            
              <!-- row -->
              <div class="row">
                <!-- table section -->
                <div class="col-md-12">
                  <div class="white_shd full margin_bottom_30">
                   
                    <div class="full inbox_inner_section">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="full padding_infor_info">
                            <div class="mail-box">
                                <h6>not viewed notifications</h6>
                              <br>
                              <span
                                  v-if="nb == 0"
                                 
                                  style="color: blue"
                                  >tous les notifications sont deja vus </span>
                              <ul>
                                <li v-bind:key="item.id" v-for="item in info">
                                  <a
                                    class="content"
                                    @click="redirect(item.titre, item.id ,item.demande_id ,item.user_id)"
                                  >
                                    <div class="notification-item">
                                      <h4 class="item-title">
                                        <i
                                          class="fa fa-info-circle"
                                          aria-hidden="true"
                                        ></i
                                        >{{ item.titre }}
                                      </h4>
                                      <p class="item-info">
                                        {{ item.content }}
                                      </p>
                                    </div>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- table section -->
              </div>
            
            <!-- footer -->
          
        
   
</template>

<script>
import axios from "axios";
export default {
  name: "notviewednotifComponent",

  data() {
    return {
      info: null,
      nb: null,
    };
  },
  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/Notificationnotviewedadmin")
      .then((response) => (this.nb = response.data));
    axios
      .get("http://127.0.0.1:8000/api/Notificationnotviewedadminlist")
      .then((response) => (this.info = response.data));
  },
  methods: {
    redirect(titre, id , demande_id ,user_id) {
      axios.post("http://127.0.0.1:8000/api/Notificationviewed/" + id);
      if (titre == "Compte") {
        this.$router.push("/etudiantsenattente");
      }
      if (titre == "Demande depot") {
        this.$router.push({
        name: "Demandedepotdetails",
        params: { id: demande_id },
      });
        
      }
      if (titre == "Demande emprunt") {
        this.$router.push({
        name: "Demandeempruntdetails",
        params: { id: demande_id ,c:user_id},
      });
      }
    },
    notviewed() {
      axios
        .get("http://127.0.0.1:8000/api/Notificationnotviewedadminlist")
        .then((response) => (this.info = response.data));
    },
  },
};
</script>

<style>
</style>