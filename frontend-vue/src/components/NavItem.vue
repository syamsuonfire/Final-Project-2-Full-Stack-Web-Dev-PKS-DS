<template>
    <div class="header1">
        <nav
            class="navbar navbar-inverse navbar-fixed-top nav-primary"
            role="navigation"
        >
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button
                        type="button"
                        class="navbar-toggle"
                        data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1"
                    >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <router-link to="/"
                        ><a class="navbar-brand">Movie-Review</a></router-link
                    >
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div
                    class="collapse navbar-collapse"
                    id="bs-example-navbar-collapse-1"
                >
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <router-link to="/">Home</router-link>
                        </li>

                        <li>
                            <a href="#"
                                ><router-link to="/movies"
                                    >List Movie</router-link
                                ></a
                            >
                        </li>

                        <li>
                            <a href="#"
                                ><router-link to="/games"
                                    >List Game</router-link
                                ></a
                            >
                        </li>

                        <li v-if="!this.loggedIn">
                            <router-link to="/login">Login</router-link>
                        </li>

                        <li v-if="!this.loggedIn">
                            <router-link to="/register">Register</router-link>
                        </li>

                        <li class="nav-item" v-if="this.loggedIn">
                            <a class="nav-link" href @click.prevent="logOut">
                                <font-awesome-icon icon="sign-out-alt" /> LogOut
                            </a>
                        </li>
                        <li>
                            <!-- <a href="#Contact" v-smooth-scroll="{ duration: 2000, offset: 0}">Contact</a> -->
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            status: false,
        };
    },
    computed: {
        loggedIn() {
            return this.$store.state.auth.status.loggedIn;
        },
    },
    methods: {
        logOut() {
            this.$store.dispatch("auth/logout");
            this.$router.push("/login");
        },
    },
};
</script>

<style scoped>
.header1 {
    margin-bottom: 40px;
}

.header1 .navbar {
    background-color: white;
    border: none;
}

.header1 .nav-primary .navbar-header a {
    color: black;
    font-family: "Poppins", cursive;
}

.header1 .nav-primary .navbar-header a:hover {
    color: black;
    opacity: 0.8;
}

.header1 .nav-primary .navbar-collapse .dropdown .dropdown-toggle:visited {
    background-color: white;
}

.header1 .nav-primary .navbar-collapse .divider {
    background-color: grey !important;
    opacity: 0.3 !important;
}

.header1 .nav-primary .navbar-collapse ul li a {
    /* text-align: center !important; */
    /* margin-top: 20px !important; */
    /* margin-bottom: 20px !important; */
}

.header1 .nav-primary .navbar-collapse .dropdown .dropdown-menu {
    /* width: 300px; */
    /* padding: 10px 10px 10px 30px; */
}

.header1 .nav-primary .navbar-collapse ul li a {
    color: black;
    background-color: white !important;
    font-size: 15px;
    font-family: "Poppins", cursive;
    text-align: left;
}

.header1 .nav-primary .navbar-collapse ul li a:active {
    background-color: white !important;
}

.header1 .nav-primary .navbar-collapse ul li a:visited {
    background-color: white !important;
}

.header1 .nav-primary .navbar-collapse ul li a:hover,
.header1 .nav-primary .navbar-header a i:hover {
    color: black;
    opacity: 0.7;
}

.header1 .navbar-inverse .navbar-toggle:focus,
.navbar-inverse .navbar-toggle:hover {
    background-color: white;
}

.header1 .navbar-inverse .navbar-collapse,
.navbar-inverse .navbar-form {
    border-color: #d0d4db;
}

.header1 .navbar-inverse .navbar-toggle .icon-bar {
    background-color: black;
}
</style>
