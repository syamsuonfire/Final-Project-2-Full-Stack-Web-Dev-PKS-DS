<template>
    <div class="container">
        <div class="row">
            <span class="label label-warning">Movies</span>
            <router-link to="/movies/">
                <span class="label label-primary">
                    More Movies
                    <i
                        class="fa fa-angle-double-right"
                        aria-hidden="true"
                    ></i></span
            ></router-link>
            <div class="col-sm-3" v-for="item in movies" :key="item.id">
                <a href="#" role="button" @click="detailMovie(item)">
                    <router-link :to="`/movies/${item.id}`">
                        <div class="vote">
                            <p>Rating: {{ item.rating }}</p>
                        </div>
                        <div class="year">
                            <p>{{ item.year }}</p>
                        </div>
                        <div class="title">
                            <p>
                                <strong>{{ item.title }}</strong>
                            </p>
                        </div>
                        <img :src="item.image_url" alt="" />
                        <div class="overlay">
                            <div class="text">Review</div>
                        </div>
                    </router-link>
                </a>
            </div>
        </div>

        <div class="row">
            <span class="label label-warning">Games</span>
            <router-link to="/games/">
                <span class="label label-primary">
                    More Games
                    <i
                        class="fa fa-angle-double-right"
                        aria-hidden="true"
                    ></i></span
            ></router-link>
            <div class="col-sm-3" v-for="item in games" :key="item.id">
                <a href="#" role="button" @click="detailGame(item)">
                    <router-link :to="`/games/${item.id}`">
                        <div class="vote">
                            <p>Platform: {{ item.platform }}</p>
                        </div>
                        <div class="year">
                            <p>{{ item.release }}</p>
                        </div>
                        <div class="title">
                            <p>
                                <strong>{{ item.name }}</strong>
                            </p>
                        </div>
                        <img :src="item.image_url" alt="" />
                        <div class="overlay">
                            <div class="text">Review</div>
                        </div>
                    </router-link>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            movies: [],
            games: [],
        };
    },
    created() {
        this.fetchMovies();
        this.fetchGames();
    },
    methods: {
        fetchMovies() {
            axios
                .get("https://backendexample.sanbersy.com/api/data-movie")
                .then((response) => {
                    this.movies = response.data;
                });
            // .catch((err) => {
            //   console.log(err)
            // })
        },
        detailMovie(data) {
            console.log(data);
            this.$store.commit("setMovie", data);
            // this.$router.replace({ path: `/movies/${data.id}` });
        },
        fetchGames() {
            axios
                .get("https://backendexample.sanbersy.com/api/data-game")
                .then((response) => {
                    this.games = response.data;
                });
            // .catch((err) => {
            //   console.log(err)
            // })
        },
        detailGame(data) {
            console.log(data);
            this.$store.commit("setGame", data);
            // this.$router.replace({ path: `/games/${data.id}` });
        },
    },
};
</script>

<style scoped>
.movie_list .container {
    padding: 0px;
    margin: 0px;
}

.movie_list .row {
    position: relative;
    margin-top: 40px;
}

.movie_list img {
    width: 100%;
    height: 270px;
    object-fit: cover;
    /* width: 100%; */
    /* height: 100%; */
    margin-bottom: 20px;
}

.movie_list .vote p {
    position: absolute;
    /*background: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,1));*/
    background: rgba(250, 220, 0, 0.6);
    /*background-color: black;*/
    top: auto;
    height: 25px;
    padding: 5px 2px;
    color: white;
    font-family: sans-serif;
    text-align: center;
    right: 15px;
    font-size: 13px;
}

.movie_list .year p {
    position: absolute;
    /*background: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,1));*/
    /*background:rgba(0, 0, 0, 0.5);*/
    background: rgba(0, 200, 255, 0.6);
    /*background-color: black;*/
    height: 25px;
    padding: 5px 2px;
    color: white;
    text-align: center;
    font-size: 12px;
    font-family: sans-serif;
}

.title p {
    position: absolute;
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

.overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: 0.5s ease;
    background: rgba(0, 0, 0, 0.5);
}

.movie_list .label-warning {
    padding: 9px 13px;
    font-size: 15px;
    font-family: sans-serif;
    position: absolute;
    left: 15px;
    font-style: italic;
    /* right: 140px; */
}

.movie_list .label-primary {
    padding: 7px 7px;
    font-size: 15px;
    font-family: sans-serif;
    position: absolute;
    top: 0px;
    right: 15px;
}

.movie_list .label-primary:hover {
    /* color: white; */
    opacity: 0.8;
}

.movie_list .col-sm-3:nth-child(3),
.movie_list .col-sm-3:nth-child(4),
.movie_list .col-sm-3:nth-child(5),
.movie_list .col-sm-3:nth-child(6) {
    margin-top: 50px;
}

.movie_list .col-sm-3:hover .overlay {
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

@media (max-width: 768px) {
    .movie_list .col-sm-3:nth-child(3) {
        margin-top: 100px;
    }
    .movie_list .col-sm-3:nth-child(4),
    .movie_list .col-sm-3:nth-child(5),
    .movie_list .col-sm-3:nth-child(6) {
        margin-top: 0px;
    }
    .movie_list .row {
        margin-top: 30px;
    }
    .label-warning {
        right: 15px;
    }
    .label-primary {
        padding: 9px 13px !important;
        left: 15px;
        top: 45px !important;
    }
    .overlay {
        display: none !important;
    }
}
</style>
