import { createRouter, createWebHistory } from 'vue-router'
import ImageHeader from './components/ImageHeader.vue'
import AboutUs from './components/AboutUs.vue'

const routes = [
  { path: '/', component: ImageHeader },
  { path: '/Nosotros', component: AboutUs },
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
    });

export default router