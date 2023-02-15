// stores/loadingState.js
import { defineStore } from 'pinia';
export const useLoadingStateStore = defineStore('loadingState', {
  state: () => ({ loaded: false }),
});