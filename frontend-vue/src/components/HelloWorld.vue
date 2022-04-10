<template>
    <div class="hello">
        <HomePage />

        <!-- <Detail/> -->
    </div>
</template>

<script>
import HomePage from "./HomePage";

export default {
    name: "HelloWorld",
    data() {
        return {
            msg: "Welcome to Your Vue.js App",
        };
    },
    components: {
        HomePage,
    },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
