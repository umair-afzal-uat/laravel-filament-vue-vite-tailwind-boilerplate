import { createRouter, createWebHistory } from 'vue-router';
import HomePage from '@/pages/HomePage.vue';
import AboutUs from '@/pages/AboutUs.vue';
import TermsOfBusiness from '@/pages/TermsOfBusiness.vue';
import ContactUs from '@/pages/ContactUs.vue';

const routes = [
  { path: '/', component: HomePage },
  { path: '/about', component: AboutUs },
  { path: '/terms', component: TermsOfBusiness },
  { path: '/contact', component: ContactUs },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;