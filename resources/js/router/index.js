import { createRouter, createWebHistory } from 'vue-router';
import HomePage from '@/pages/HomePage.vue';
// import AboutUs from '@/pages/AboutUs.vue';
// import TermsOfBusiness from '@/pages/TermsOfBusiness.vue';
import ContactUs from '@/pages/ContactUs.vue';
import ComplaintsProcedure from '@/pages/ComplaintsProcedure.vue';
import PrivacyPolicy from '@/pages/PrivacyPolicy.vue';

const routes = [
  { path: '/', component: HomePage },
  // { path: '/about', component: AboutUs },
  // { path: '/terms', component: TermsOfBusiness },
  { path: '/contact', component: ContactUs },
  { path: '/complaints-procedure', component: ComplaintsProcedure },
  { path: '/privacy-policy', component: PrivacyPolicy },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;