<template>

    <section class="teacher_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Memoires
        </h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="../assets/images/t1.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Alice Stark
              </h5>
              <h6>
                Teacher
              </h6>
            </div>
          </div>
        </div>
     
      
         <div class="col-sm-6 col-lg-3" v-bind:key="item.id" v-for="item in info">
          <div class="box">
            <div class="img-box">
              <img v-bind:src="'http://localhost:8000/storage/files/memoires/cover/'+item.coverimage" alt="">
            </div>
            <div class="detail-box">
              <h5>
                {{ item.titre}}
              </h5>
              <h6>
                {{ item.description}}
              </h6>
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












  <!-- <section class="course_section layout_padding">
    <div class="course_bg_box ">
      <div class="bg_img_box">
        <img src="images/course-bg.jpg" alt="">
      </div>
    </div>
    <div class="container-fluid pr-0">
      <div class="heading_container">
        <h2>
         Memoire
        </h2>
        <p>
          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
        </p>
      </div>
      <div class="course_container">
        <div class=" course_owl-carousel owl-carousel owl-theme ">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="../assets/images/c1.jpg" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Learn JavaScript
                </h4>
                <p>
                  Incidunt veritatis adipisci autem repellat possimus id eos praesentium, beatae repudiandae.
                </p>
                <a href="">
                  View Detail
                </a>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="../assets/images/c2.jpg" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Learn Python
                </h4>
                <p>
                  Incidunt veritatis adipisci autem repellat possimus id eos praesentium, beatae repudiandae.
                </p>
                <a href="">
                  View Detail
                </a>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="../assets/images/c3.jpg" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Learn Html
                </h4>
                <p>
                  Incidunt veritatis adipisci autem repellat possimus id eos praesentium, beatae repudiandae.
                </p>
                <a href="">
                  View Detail
                </a>
              </div>
            </div>
          </div>
          <div v-bind:key="item.id" v-for="item in info">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img v-bind:src="'http://localhost:8000/storage/files/memoires/cover/'+item.coverimage" alt="item.coverimage">
              </div>
              <div class="detail-box">
                <h4>
                    {{ item.titre}}
                </h4>
                <p>
                    {{ item.description}}
                </p>
                <a href="">
                  View Detail
                </a>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  -->















</template>

<script>

import axios from 'axios';
export default {
name: 'MemoireComponent',
  data () {
    return {
      info: null
    }
  },
  mounted () {
    axios
      .get('http://127.0.0.1:8000/api/Memoire')
      .then(response => (this.info = response.data))
  }

}

</script>

<style>

</style>