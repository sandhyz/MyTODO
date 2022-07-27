// import module & import component 
import { createRouter, createWebHistory } from 'vue-router'
import TODOView from '@/views/TODO'
import DetTODO from '@/views/DetTODO'

//create route
const routes = [
  {
    path: '/',
    name: 'home',
    component: TODOView
  },
  {
    path: '/detail',
    name: 'detail',
    component: DetTODO
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
