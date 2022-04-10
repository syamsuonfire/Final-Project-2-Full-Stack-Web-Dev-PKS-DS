<template>
    <div class="home" id="top">
        <NavItem />
        <div class="container">
            <div class="introduce">
                <h2 class="page-header">WELCOME</h2>
                <p>Welcome to Book Review</p>
            </div>
            <SliderItem />
            <!-- <div class="container"> -->
            <div class="book_list">
                <ListAPI />
            </div>
        </div>
        <FooterItem />
    </div>
</template>

<script>
import NavItem from "./NavItem";
import SliderItem from "./SliderItem";
import ListAPI from "./ListAPI";
import FooterItem from "./FooterItem.vue";

export default {
    data() {
        return {};
    },
    components: {
        NavItem,
        ListAPI,
        SliderItem,
        FooterItem,
    },
};
</script>

<style scoped>
.home {
    /* background: url(../assets/bg.jpg) no-repeat center center fixed !important; */
    background: url(https://preview.ibb.co/co60fH/bg.jpg) no-repeat center
        center fixed !important;
    background-size: cover !important;
    background-repeat: no-repeat;
    padding-top: 2px !important;
}

.introduce {
    height: auto;
    /* width: 100%; */
    padding: 20px 15px;
    background: rgba(0, 0, 0, 0.5);
    margin-bottom: 30px;
}

.introduce h2 {
    margin-top: 10px;
    color: white;
    text-align: center;
    font-family: "Monoton";
    font-size: 40px;
}

.introduce p {
    margin-bottom: 0px;
    text-align: center;
    color: #d2d7e0;
    font-size: 16px;
    font-family: "Raleway", cursive;
}

.book_list {
    /* width: auto; */
    height: auto;
    background: rgba(0, 0, 0, 0.5) !important;
    /*background-color: white;*/
    padding: 0px 30px 15px 30px !important;
    margin-bottom: 30px;
    margin-top: 30px;
}

.container {
    width: auto;
    padding: 0px 105px;
}

.pra-footer {
    height: auto;
    width: 100%;
    /*background: url(warnawarni.png) no-repeat center center;
  background-size: cover;*/
    background: rgba(0, 0, 0, 0.5);
    padding: 20px 200px;
}

.pra-footer dl {
    margin-bottom: 0px;
    /* margin-left: 230px; */
}

.pra-footer dt {
    text-align: center;
    color: grey;
    font-size: 15px;
    font-family: "Raleway", cursive;
}

.pra-footer dd {
    text-align: center;
    color: #c9cacc;
    font-size: 15px;
    font-family: "Raleway", cursive;
}

@media (max-width: 768px) {
    body {
        background-size: cover;
    }
    p,
    dt,
    dd {
        font-size: 13px !important;
    }
    .home {
        background: url(https://preview.ibb.co/co60fH/bg.jpg) no-repeat left
            fixed !important;
        background-size: cover !important;
        opacity: 1;
    }
    .container {
        padding: 0px 20px;
    }
    .introduce {
        margin-bottom: 20px;
    }
    .book_list {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .carousel-inner .item img {
    }
    .pra-footer {
        padding: 20px 40px;
    }
}
</style>
