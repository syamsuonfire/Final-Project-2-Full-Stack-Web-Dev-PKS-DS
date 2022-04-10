<template>
  <div class="hello">
    <Home/>

    <!-- <Detail/> -->
  </div>
</template>

<script>
import Home from './Home'

export default {
  name: 'HelloWorld',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  components: {
    Home
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>


</style>
