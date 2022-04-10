import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Detail from '@/components/Detail'
import Psikologi from '@/components/Psikologi'


Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/detail/:linkprev/:linkhal',
      name: 'detail',
      component: Detail
    },
    {
      path: '/psikologi/:linkprev/:id',
      name: 'psikologi',
      component: Psikologi
    },
  ]
})
