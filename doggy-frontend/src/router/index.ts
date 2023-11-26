import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'

import AdminView from '@/layouts/AdminView.vue'
import DogListView from '@/views/dogs/DogListView.vue'
import DogDetailView from '@/views/dogs/DogDetailView.vue'
import DogCreateView from '@/views/dogs/DogCreateView.vue'
import MedicalVisitsList from '@/views/medicalVisits/MedicalVisitsList.vue'



const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'adminLayout',
    component: AdminView,
    children: [
      {
        path:'/dogs/create',
        name: 'dogCreate',
        component: DogCreateView,
      },
      {
        path:'/dogs/:id',
        name: 'dogDetail',
        component: DogDetailView,
      },
      {
        path:'/medical-visits',
        name: 'medicalVisits',
        component: MedicalVisitsList,
      },
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
