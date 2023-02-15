// stores/user.js
import { defineStore } from 'pinia';
export const useUserStore = defineStore('user', {
  state: () => ({ name: null, email: null }),
});