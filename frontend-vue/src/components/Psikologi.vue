<template>
  <div class="psikologi" id="top">
    <Nav/>
    <div class="psikologi_text">
      <h1 rel="stylesheet" >Psikologi</h1>
      <ol class="breadcrumb">
        <li><router-link to="/">Home</router-link></li>
        <li>Psikologi</li>
        <li>{{this.halaman}}</li>
      </ol>
    </div>
    <div class="container">
      <div class="book_list">
        <div class="row">
          <div class="col-sm-3" v-for= "np in psikologi">
            <a href="#" role="button" @click="detailFilm(np)">
              <router-link :to="'/detail/psikologi/'+$route.params.id">
                <div class="vote">
                  <p>Rating: {{np.rating}}</p>
                </div>
                <div class="release_date">
                  <p>{{np.release_date}}</p>
                </div>
                <div class="title">
                  <p><strong>{{np.title}}</strong></p>
                </div>
                <!-- <div class="image"> -->
                <img :src="np.image_url" alt="">
                <!-- </div> -->
                <div class="overlay">
                  <div class="text">Review</div>
                </div>
              </router-link>
            </a>
          </div>
        </div>
      </div>

    </div>
    <!-- <nav aria-label="Page navigation">
      <ul class="pagination">
        <li>
          <a aria-label="Previous">
            <span aria-hidden="true" >&laquo;</span>
          </a>
        </li>
      </ul>
      <ul class="pagination" v-for="index in 20">
        <li><router-link :to="'/psikologi/'+index" onclick="location.reload()">{{index}}</router-link></li>
      </ul>
      <ul class="pagination">
        <li>
          <a aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav> -->
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
      psikologi: [],
      page:1
    }
  },
  components: {
    Nav,
    Footer,

  },
  created(){
    this.getAPI1()
  },
  methods:{
    getAPI1(){
      axios.get('http://pks.guidelight.id/api/book')
      .then((response) => {
        this.psikologi = response.data.data
        this.filter = response.data.data.filter((item)=> item.category_id ==1);
      })

      console.log(this.psikologi)
      // .catch((err) => {
      //   console.log(err)
      // })
    },
    detailFilm(data){
      this.$store.commit('setBook', data)
      // this.$router.replace({'path': '/detail'})
    }

  }
}

</script>

<style scoped>

.psikologi{
  /* background: url(../assets/bg.jpg) no-repeat center center fixed !important; */
  background: url(https://preview.ibb.co/co60fH/bg.jpg) no-repeat center center fixed !important;
  background-size: cover !important;
  padding-top: 30px !important;
}

.psikologi_text h1{
  font-family: 'Lobster', cursive;
  color: white;
  /*margin-left: 105px;*/
  text-align: center;
  margin-top: 60px;
  margin-bottom: 40px;
}

.psikologi_text .breadcrumb{
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

.psikologi_text .breadcrumb li:nth-child(1){
  color: #337ab7 !important;
}

.psikologi_text .breadcrumb li a:hover{
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

.psikologi .container{
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
  width: 100%;
  /* width: 247px; */
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
/*
nav ul{
  margin-top: 40px;
  margin-bottom: 0px;
}

nav .pagination li a{
  background-color: white;
  color: black;
  border-color: transparent;
  margin-left: 10px;
  -webkit-box-shadow: 6px 11px 19px -5px rgba(0,0,0,0.61);
  -moz-box-shadow: 6px 11px 19px -5px rgba(0,0,0,0.61);
  box-shadow: 6px 11px 19px -5px rgba(0,0,0,0.61);
  border-radius: 10%;
}

nav .pagination li a:hover{
  cursor: pointer;
  color: black;
  background-color: #9E9E9E;
}

nav .pagination .active a{
  background-color: #9E9E9E;
  border-color: transparent;
} */

@media (max-width: 768px){
  .psikologi{
    background: url(https://preview.ibb.co/co60fH/bg.jpg) no-repeat left fixed !important;
    background-size:cover !important;
    opacity: 1;
  }
  .breadcrumb{
    margin: 0px 20px 20px 20px !important;
  }
  .psikologi .container{
    padding: 0px 20px;
  }
  .book_list{
    margin-bottom: 20px;
  }
}

</style>
