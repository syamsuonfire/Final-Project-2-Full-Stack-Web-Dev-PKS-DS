<template>
  <div class="">
    <div class="slider">
      <div id="" class="myCarousel carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
            <li data-target="#myCarousel" data-slide-to="7"></li>
            <li data-target="#myCarousel" data-slide-to="8"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
              <div class="item active">
                <a class="hvr-grow" href="#" @click="detailFilm(posts[1])">
                  <router-link to="/detail/nowplaying/1">
                    <img :src="'https://image.tmdb.org/t/p/w1400_and_h450_face'+posts[1].backdrop_path" alt="" class="carousel-besar">
                    <img :src="'https://image.tmdb.org/t/p/w500_and_h282_bestv2'+posts[1].backdrop_path" alt="" class="carousel-kecil">
                    <div class="carousel-caption">
                      <ul>
                        <li>
                          <h3>{{posts[1].title}}</h3>
                        </li>
                        <li>
                          <h5>Rating: {{posts[1].vote_average}}</h5>
                        </li>
                      </ul>
                    </div>
                  </router-link>
                </a>
              </div>

              <div class="item" v-for="index in 8">
                <a class="hvr-grow" href="#" @click="detailFilm(posts[index+1])">
                  <router-link to="/detail/nowplaying/1">
                    <img :src="'https://image.tmdb.org/t/p/w1400_and_h450_face'+posts[index+1].backdrop_path" alt="" class="carousel-besar">
                    <img :src="'https://image.tmdb.org/t/p/w500_and_h282_bestv2'+posts[index+1].backdrop_path" alt="" class="carousel-kecil">

                      <div class="carousel-caption">
                        <ul>
                          <li>
                            <h3>{{posts[index+1].title}}</h3>
                          </li>
                          <li>
                            <h5>Rating: {{posts[index+1].vote_average}}</h5>
                          </li>
                        </ul>
                      </div>
                    </router-link>
                  </a>
              </div>

          </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href=".myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href=".myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios'
export default{
  data(){
    return{
      posts: []
    }
  },
  created(){
    this.fetchData()
  },
  methods:{
    fetchData(){
      axios.get('https://api.themoviedb.org/3/movie/now_playing?api_key=4cd6d9ef2fca21ddbdba9671f95ae371&language=en-US&page=1')
      .then((response) => {
        this.posts = response.data.results
        // console.log(response)
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

.hvr-grow {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px transparent;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: transform;
  transition-property: transform;
}
.hvr-grow:hover, .hvr-grow:focus, .hvr-grow:active {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

.slider{
  /* margin-bottom: 20px */
}

.carousel-inner .item img{
  width: 100%;
  /* max-width: 100% !important; */
  /* height: 100%; */
}

.carousel-caption{
  padding: 25px 0px;
  /* background: rgba(255, 255, 255, 0.3);
  background-size:contain; */
  /* width: 50%; */
  /* background: url(../img/bg.png) no-repeat center center; */
}

.carousel-kecil{
  display: none;
}

.carousel-caption ul{
  list-style: none;
  padding: 0px;
}

.carousel-caption ul li{
  padding-bottom: 0px;
}

.carousel-caption a:hover{
  text-decoration: none;
}

.carousel-caption a h3:hover{
  font-size: 30px;
  font-weight: bold;
}

.carousel-inner .carousel-caption h3{
  text-align: center;
  /* text-shadow: 1px 1px 5px red; */
  color: #212121;
  font-family: 'Raleway',cursive;
  font-weight: bolder;
  font-size: 25px;
  background: rgba(255, 255, 255, 0.4);
  padding: 5px 10px;
  margin-top: 0px;
  display: inline-block;
  border-radius: 5px;
}

.carousel-inner .carousel-caption h5{
  text-align: center;
  /* opacity: .1; */
  color: #212121;
  font-family: 'Raleway',cursive;
  font-weight:bolder;
  font-size: 18px;
  background: rgba(255, 255, 255, 0.4);
  padding: 5px 10px;
  margin-top: 0px;
  display: inline-block;
  border-radius: 5px;
}

@media (max-width: 768px){
  .carousel-besar{
    display: none;
  }
  .carousel-kecil{
    display: block;
  }
  .carousel-indicators{
    margin-bottom: 0px;
  }
  .carousel-inner .carousel-caption{
    padding-bottom: 0px;
  }
  .carousel-inner .carousel-caption h3{
    font-size: 20px;
  }
  .carousel-inner .carousel-caption h5{
    display: none;
  }
}

</style>
