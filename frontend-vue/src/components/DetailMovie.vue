<template>
    <div class="main" id="top">
        <Nav />
        <div class="container konten">
            <div class="text_review">
                <h1>Movie Review</h1>
                <ol class="breadcrumb">
                    <li><router-link to="/">Home</router-link></li>
                    <li>
                        <router-link :to="'/movies'">Movies</router-link>
                    </li>
                    <li>{{ movie.title }}</li>
                </ol>
            </div>

            <div class="konten_review">
                <div class="row">
                    <div class="col-md-4 col-xs-12 kiri">
                        <img :src="movie.image_url" alt="" />
                    </div>
                    <div class="col-md-8 col-xs-12 kanan">
                        <div class="title">
                            <h1>{{ movie.title }}</h1>
                        </div>
                        <div>
                            <h4>
                                <i
                                    class="fa fa-bookmark"
                                    aria-hidden="true"
                                ></i>
                                {{ movie.genre }}
                            </h4>
                        </div>
                        <div class="vote">
                            <h4>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                {{ movie.rating }}
                            </h4>
                        </div>
                        <div class="release_date">
                            <h4>
                                <i
                                    class="fa fa-calendar-o"
                                    aria-hidden="true"
                                ></i>
                                {{ movie.year }}
                            </h4>
                        </div>
                        <div class="overview">
                            <p>{{ movie.description }}</p>
                        </div>
                        <router-link :to="'/movies'">
                            <button
                                type="button"
                                class="btn btn-primary"
                                name="button"
                            >
                                <i
                                    class="fa fa-angle-double-left"
                                    aria-hidden="true"
                                ></i>
                                Back
                            </button>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <FooterItem />
    </div>
</template>

<script>
import FooterItem from "./FooterItem";
export default {
    computed: {
        movie() {
            return this.$store.state.movie;
        },
    },
    data() {
        return {
            status: false,
            // vkey: '3cxixDgHUYw',
            // id: '141052'
        };
    },
    components: {
        FooterItem,
    },
    created() {},
    methods: {
        back() {
            window.history.length > 1
                ? this.$router.go(-1)
                : this.$router.push("/");
        },
    },
};
</script>

<style scoped>
.main {
    /* background: url(../assets/bg.jpg) no-repeat center center fixed !important; */
    background: url(https://preview.ibb.co/co60fH/bg.jpg) no-repeat center
        center fixed !important;
    background-size: cover !important;
    padding-top: 30px !important;
}

.main {
    text-align: center;
}

.container {
    padding: 0px 20px !important;
}

.main .text_review .breadcrumb {
    /* background-color: transparent; */
    background: rgba(0, 0, 0, 0.5);
    /* width: 19%; */
    margin-right: 0px;
    margin-left: 0px;
    text-align: left;
    /* padding-left: 105px; */
    font-weight: bold;
    /* color: #337ab7; */
    color: white;
}

.main .text_review .breadcrumb li:nth-child(1),
.main .text_review .breadcrumb li:nth-child(2) {
    color: #337ab7 !important;
}

.main .text_review .breadcrumb li a:hover {
    opacity: 0.8 !important;
    color: #337ab7 !important;
}

.main .text_review h1 {
    margin-top: 20px;
    color: white;
    font-family: "Faster One", cursive;
    margin-bottom: 40px;
}

.main .konten {
    padding: 0px 0px;
}

.main .konten .konten_review {
    padding: 25px 20px;
    height: 70vh;
    background: rgba(0, 0, 0, 0.6);
    /* background-size: cover;
  background-repeat: no-repeat;
  background-position: 50% 50%;
  background-image: url(https://image.tmdb.org/t/p/w1400_and_h450_face/9ywA15OAiwjSTvg3cBs9B7kOCBF.jpg); */
}

.main .konten_review .kiri img {
    width: 77%;
    /* width: 100%; */
    /* height: 100%; */
    /* background-size: cover; */
}

.main .konten_review .kiri {
    /* background-color: yellow; */
    /* text-align: center; */
    padding: 0px;
}

.main .konten_review .kanan {
    /* padding: 30px 30px; */
    padding-right: 25px;
    padding-left: 8px;
    color: white;
    text-align: justify;
}

/* .main .konten_review .kanan ul li{
  display: inline;
  float: left;
  margin-right: 15px;
}

.main .konten_review .kanan ul li p{
  margin-bottom: 0px;
}

.main .konten_review .kanan ul{
  padding-left: 0px;
  margin-bottom: 0px;
} */

.main .konten_review .kanan .title h1 {
    font-weight: 650;
    margin-bottom: 20px;
}

.main .konten_review .kanan .release_date,
.vote,
.lang {
    font-size: 11px;
}

.main .konten_review .kanan .overview {
    font-size: 14px;
    margin-top: 20px;
    margin-bottom: 30px;
}

.main .trailer .slider .carousel a {
    background: rgba(0, 0, 0, 0);
    height: 0%;
    width: 10%;
    top: 45%;
}

.main .trailer .slider .carousel a span {
    font-size: 40px;
}

.main .trailer .embed-responsive {
    /* padding-bottom: 27.6%; */
    padding-bottom: 40%;
}

.main .trailer .embed-responsive iframe {
    /* height: 315px;
   width: 560px; */
    /* height: 200px; */
}

.main .konten_review .kanan .btn {
    /* border-color: yellow; */
}

@media (max-width: 768px) {
    .main {
        background: url(https://preview.ibb.co/co60fH/bg.jpg) no-repeat left
            fixed !important;
        background-size: cover !important;
        opacity: 1;
    }
    .main .konten .konten_review {
        height: auto;
    }
    .main .konten .konten_review img {
        width: 90%;
    }
    .main .konten .konten_review .row {
        padding: 5px 10px;
    }
    .main .konten .konten_review .row .kanan {
        padding: 7px 21px 0px;
    }
    .trailer {
        margin-bottom: 0px;
    }
    .main .trailer .embed-responsive iframe {
    }
    .html5-video-player .video-stream {
    }
}
</style>
