<template>
  <section class="course_section layout_padding">
    <div class="course_bg_box ">
      <div class="bg_img_box">
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
          </div><div v-bind:key="item.id" v-for="item in info">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('storage/cover/vr6TxGnR0ktDbSc23fqeESfMxAbvgbpeocRnDEoq.png') }}">
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
          </div></div>
        </div>
      </div>
    </div>
  </section>
  
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