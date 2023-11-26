import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'

import AdminView from '@/layouts/AdminView.vue'
import DogListView from '@/views/dogs/DogListView.vue'


const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'adminLayout',
    component: AdminView,
    children: [
      {
        path:'/',
        name: 'dogs',
        component: DogListView,
      },
    ]
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
