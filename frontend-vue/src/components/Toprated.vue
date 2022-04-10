<template>
  <div class="toprated" id="top">
    <Nav/>
    <div class="now_playing_text">
      <h1 rel="stylesheet" >Top Rated</h1>
      <!-- <h3>{{this.linkPage}}</h3> -->
      <ol class="breadcrumb">
        <li><router-link to="/">Home</router-link></li>
        <!-- <li><router-link to="/listmovie">List Book</router-link></li> -->
        <li>Top Rated</li>
        <li>{{this.halaman}}</li>
      </ol>
    </div>
    <div class="container">
      <div class="book_list">
        <div class="row">
          <div class="col-sm-3" v-for= "tr in toprated">
            <a href="#" role="button" @click="detailFilm(tr)">
              <router-link :to="'/detail/toprated/'+$route.params.id">
                <div class="vote">
                  <p>Rating: {{tr.vote_average}}</p>
                </div>
                <div class="release_date">
                  <p>{{tr.release_date}}</p>
                </div>
                <div class="title">
                  <p><strong>{{tr.title}}</strong></p>
                </div>
                <img :src="'https://image.tmdb.org/t/p/w500_and_h282_bestv2'+tr.poster_path" alt="">
                <div class="overlay">
                  <div class="text">Review</div>
                </div>
              </router-link>
            </a>
          </div>
        </div>
      </div>

    </div>
    <Footer/>
  </div>
</template>

<script>
import Nav from './Nav'
import Footer from './Footer'

import axios from 'axios'

// export default {
//   name: 'HelloWorld',
//   data () {
//     return {
//       msg: 'Welcome to Your Vue.js App'
//     }
//   },
//   components: {
//     Nav,
//     Footer
//   }
// }

export default{
  computed:{
    halaman(){
      return this.$route.params.id
    }
  },
  data(){
    return{
      toprated: []
    }
  },
  components: {
    Nav,
    Footer,

  },
  created(){
    this.getAPItr()
  },
  methods:{
    getAPItr(){
      axios.get('https://api.themoviedb.org/3/movie/top_rated?api_key=4cd6d9ef2fca21ddbdba9671f95ae371&language=en-US&page='+this.$route.params.id)
      .then((response) => {
        this.toprated = response.data.results
        console.log(response)
      })
      // .catch((err) => {
      //   console.log(err)
      // })
    },
    detailFilm(data){
      this.$store.commit('setFilm', data)
      // this.$router.replace({'path': '/detail'})
    }
  }
}

</script>

<style scoped>

.toprated{
  /* background: url(../assets/bg.jpg) no-repeat center center fixed !important; */
  background: url(https://preview.ibb.co/co60fH/bg.jpg) no-repeat center center fixed !important;
  background-size: cover !important;
  padding-top: 30px !important;
}

.now_playing_text h1{
  font-family: 'Lobster', cursive;
  color: white;
  /*margin-left: 105px;*/
  text-align: center;
  margin-top: 60px;
  margin-bottom: 40px;
}

.now_playing_text .breadcrumb{
  /* background-color: transparent; */
  background: rgba(0, 0, 0, 0.5);
  /* width: 19%; */
  margin-right: 104px;
  margin-left: 104px;
  text-align: left;
  /* padding-left: 105px; */
  font-weight: bold;
  /* color: #337ab7; */
  color: white;
}

.now_playing_text .breadcrumb li:nth-child(1){
  color: #337ab7 !important;
}

.now_playing_text .breadcrumb li a:hover{
  opacity: .8 !important;
  color: #337ab7 !important;
}

.book_list{
  /* width: auto; */
  height: auto;
  background: rgba(0, 0, 0, 0.5) !important;
  /*background-color: white;*/
  padding: 30px 30px 0px 30px;
}

.toprated .container{
  width: auto;
  /* margin: auto; */
  padding: 0px 105px;
}

.book_list .container{
  padding: 0px;
  margin: 0px;
}

.book_list .row{
  position: relative;
  /* margin-bottom: 40px; */
}

.book_list img{
  /* width: 253px; */
  width: 100%;
  /* height: 100%; */
  margin-bottom: 20px;
}

.book_list .vote p{
  position:absolute;
  /*background: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,1));*/
  background:rgba(250, 220, 0, 0.6);
  /*background-color: black;*/
  top: auto;
  height: 25px;
  padding: 5px 2px;
  color: white;
  font-family:sans-serif;
  text-align: center;
  right: 15px;
  font-size: 13px;
}

.book_list .release_date p{
  position:absolute;
  /*background: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,1));*/
  /*background:rgba(0, 0, 0, 0.5);*/
  background:rgba(0, 200, 255, 0.6);
  /*background-color: black;*/
  height: 25px;
  padding: 5px 2px;
  color: white;
  text-align: center;
  font-size: 12px;
  font-family:sans-serif;
}

.title p{
  position:absolute;
  /*background: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1));*/
  /*background:rgba(0, 0, 0, 1);*/
  background: rgba(230, 20, 10, 0.6);
  height: 25px;
  padding: 2px;
  color: white;
  text-align: center;
  font-size: 12px;
  bottom: 10px;
}

.overlay{
  position:absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background: rgba(0, 0, 0, 0.5);
}


.book_list .label-warning{
  padding: 7px 7px;
  font-size: 15px;
  font-family: sans-serif;
  position: absolute;
  left: 15px;
  /* right: 140px; */
}

.book_list .label-primary{
  padding: 7px 7px;
  font-size: 15px;
  font-family: sans-serif;
  position: absolute;
  top: 0px;
  right: 15px;
}

.book_list .label-primary a:hover{
  color: white;
  opacity: 0.8;
}

/* .book_list span:nth-child(3), .book_list span:nth-child(4), .book_list span:nth-child(5){
  margin-top: 20px;
} */

/* .book_list .col-sm-3:nth-child(3), .book_list .col-sm-3:nth-child(4), .book_list .col-sm-3:nth-child(5), .book_list .col-sm-3:nth-child(6){
  margin-top: 50px;
} */

.book_list .col-sm-3:hover .overlay {
  bottom: 0px;
  left: 15px;
  width: 89.2%;
  /* height: 87.5%; */
  height: 87.5%;
  /* width: 100%; */
  /* height: 100%; */
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}

@media (max-width: 768px){
  .toprated{
    background: url(https://preview.ibb.co/co60fH/bg.jpg) no-repeat left fixed !important;
    background-size:cover !important;
    opacity: 1;
  }
  .breadcrumb{
    margin: 0px 20px 20px 20px !important;
  }
  .toprated .container{
    padding: 0px 20px;
  }
  .book_list{
    margin-bottom: 20px;
  }
}

</style>
