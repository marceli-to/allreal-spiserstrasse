import { createRouter, createWebHistory } from 'vue-router';
import ApartmentIndex from '@/views/apartment/Index.vue';
import ApartmentUpdate from '@/views/apartment/Update.vue';

const router = createRouter({
  history: createWebHistory(),
  linkActiveClass: 'is-active',
  routes: [
    {
      path: '/administration/apartments',
      name: 'apartments.index',
      component: ApartmentIndex,
      meta: { requiresAuth: true },
    },
    {
      path: '/administration/apartment/update/:id',
      name: 'apartment.update',
      component: ApartmentUpdate,
      meta: { requiresAuth: true },
    },
  ]
});

export default router;
