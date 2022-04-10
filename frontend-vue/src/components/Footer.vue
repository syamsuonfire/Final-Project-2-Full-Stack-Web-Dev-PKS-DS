<template>
  <footer class="" id="Contact" style="">
    <p><a href="#top" class="btn btn-default" role="button" v-smooth-scroll="{ duration: 1500, offset: 0}">Go to Top</a></p>


    <p>© {{ new Date().getFullYear() }} PKS Digischool. All Rights Reserved.</p>
  </footer>
</template>

<script>

</script>

<style>

footer{
  line-height: 30px;
  margin-top: 30px;
  /* margin-top: 0px; */
  text-align: center;
  padding: 30px 0px;
  height: auto;
  background-color: white;
  width: 100%;
}

footer .btn{
  margin-bottom: 10px;
}

footer h5{
  font-size: 15px;
}

footer p {
  margin-bottom: 0px;
  font-size: 12px;
}

footer ul{
  margin: 0;
  padding-left: 0px;
}

footer ul li{
  display: inline;
  margin-right: 15px;
  margin-left: 8px;
}

footer ul li a {
  color: black;
  font-size: 11px;
  opacity: .7;
}

footer ul li a:hover{
  text-decoration: none;
  color: black;
  opacity: .4;
}

@media (max-width: 768px){
  footer{
    margin-top: 20px;
  }
}
</style>
