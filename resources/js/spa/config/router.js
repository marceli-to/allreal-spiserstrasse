import { createRouter, createWebHistory } from 'vue-router';
import ApartmentIndex from '@/spa/views/apartment/Index.vue';
import ApartmentUpdate from '@/spa/views/apartment/Update.vue';
import FormDataIndex from '@/spa/views/form-data/Index.vue';

const router = createRouter({
  history: createWebHistory(),
  linkActiveClass: 'is-active',
  routes: [
    {
      path: '/administration',
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
    {
      path: '/administration/form-data',
      name: 'form-data.index',
      component: FormDataIndex,
      meta: { requiresAuth: true },
    },
  ]
});

export default router;
