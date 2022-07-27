import { createRouter, createWebHistory } from 'vue-router'
import TODOView from '@/views/TODO'

const routes = [
  {
    path: '/',
    name: 'home',
    component: TODOView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
