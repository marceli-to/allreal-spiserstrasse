import { createRouter, createWebHistory } from 'vue-router';
import ApartmentView from '@/views/apartment/Index.vue';

const router = createRouter({
  history: createWebHistory(),
  linkActiveClass: 'is-active',
  routes: [
    {
      path: '/administration/',
      name: 'apartment',
      component: ApartmentView,
      meta: { requiresAuth: true },
    },
  ]
});

export default router;
