// Import Vue Router
import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  {
    path: '/',
    name: 'home',
    component: () => import('../views/home.vue'),
  },
  {
    path: '/booking',
    name: 'booking.index',
    component: () => import('../views/booking/index_booking.vue'),
  },
  {
    path: '/booking/create', // Ubah path untuk konsistensi
    name: 'booking.create',
    component: () => import('../views/booking/create_booking.vue'),
  },
  {
    path: '/booking/edit/:id', // Ubah path untuk konsistensi
    name: 'booking.edit',
    component: () => import('../views/booking/edit_booking.vue'),
    props: true,
  },
  {
    path: '/rooms',
    name: 'rooms.index',
    component: () => import('../views/rooms/index_rooms.vue'),
  },
  {
    path: '/rooms/create',
    name: 'rooms.create',
    component: () => import('../views/rooms/create_rooms.vue'),
  },
  {
    path: '/rooms/edit/:id',
    name: 'rooms.edit',
    component: () => import('../views/rooms/edit_rooms.vue'),
    props: true,
  },
];

// Create router
const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
