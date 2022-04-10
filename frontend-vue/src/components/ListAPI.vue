<template>
  <div class="container">
    <div class="row">
      <span class="label label-warning">Psikologi</span>
      <router-link to="/psikologi/psikologi/1"> <span class="label label-primary"> More Books <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></router-link>
      <div class="col-sm-3" v-for= "index in 8">
        <a href="#" role="button" @click="detailFilm(psikologi[index-1])">
          <router-link to="/detail/psikologi/1">
            <div class="vote">
              <p>Rating: {{psikologi[index-1].rating}}</p>
            </div>
            <div class="year">
              <p>{{psikologi[index-1].year}}</p>
            </div>
            <div class="title">
              <p><strong>{{psikologi[index-1].title}}</strong></p>
            </div>
            <img :src="psikologi[index-1].image_url" alt="">
            <div class="overlay">
              <div class="text">Review</div>
            </div>
          </router-link>
        </a>
      </div>
    </div>

    <!-- <li v-for="index in 5"  style="color:white;">{{nama[index-1]}}</li> -->
  </div>
</template>

<script>

import axios from 'axios'
export default{
  data(){
    return{
      psikologi: [],
      popular: [],
      toprated: [],
      upcoming: [],
      nama:['a','b','c','d','e','f','g'],
      filter:[],
    }
  },
  created(){
    this.getAPI1(),
    this.getAPI2(),
    this.getAPItr(),
    this.getAPIuc()
  },
  methods:{
    getAPI1(){
      axios.get('http://127.0.0.1:8000/api/book')
      .then((response) => {
        this.psikologi = response.data.data
        this.filter = response.data.data.filter((item)=> item.category_id ==1);

      })
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

.book_list .container{
  padding: 0px;
  margin: 0px;
}

.book_list .row{
  position: relative;
  margin-top: 40px;
}

.book_list img{
  width: 100%;
  height: 270px;
  object-fit: cover;
  /* width: 100%; */
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

.book_list .year p{
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
  padding: 9px 13px;
  font-size: 15px;
  font-family: sans-serif;
  position: absolute;
  left: 15px;
  font-style: italic;
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

.book_list .label-primary:hover{
  /* color: white; */
  opacity: 0.8;
}

.book_list .col-sm-3:nth-child(3), .book_list .col-sm-3:nth-child(4), .book_list .col-sm-3:nth-child(5), .book_list .col-sm-3:nth-child(6){
  margin-top: 50px;
}

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
  .book_list .col-sm-3:nth-child(3){
    margin-top: 100px;
  }
  .book_list .col-sm-3:nth-child(4), .book_list .col-sm-3:nth-child(5), .book_list .col-sm-3:nth-child(6){
    margin-top: 0px;
  }
  .book_list .row{
    margin-top: 30px;
  }
  .label-warning{
    right: 15px ;
  }
  .label-primary{
    padding: 9px 13px !important;
    left: 15px;
    top: 45px !important;
  }
  .overlay{
    display: none !important;
  }
}

</style>
