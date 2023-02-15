import { ref } from 'vue';
import axios from "axios";
import { useRouter } from 'vue-router';
import { useLoadingStateStore } from '@/stores/loadingState';
import { storeToRefs } from 'pinia';

export default function useApartments() {
  const apartments = ref([]);
  const apartment = ref([]);
  const router = useRouter();
  const errors = ref('');

  const store = storeToRefs(useLoadingStateStore());

  const routes = {
    get: `/api/apartments`,
    search: `/api/apartments/search`
  };

  const getApartments = async () => {
    let response = await axios.get(`/api/apartments`);
    apartments.value = response.data;
    store.loaded.value = true;
  };

  const searchApartments = async (keyword) => {
    let response = await axios.get(`${routes.search}/${keyword}`);
    apartments.value = response.data;
  };

  const getApartment = async (id) => {
    let response = await axios.get('/api/apartments/' + id);
    apartment.value = response.data;
  };


  const updateApartment = async (id) => {
    errors.value = ''
    try {
      await axios.put('/api/apartments/' + id, apartment.value)
      await router.push({name: 'apartments.index'})
    } catch (e) {
        if (e.response.status === 422) {
        errors.value = e.response.data.errors
      }
    }
  }

  const destroyApartment = async (id) => {
    await axios.delete('/api/apartments/' + id)
  }

  return {
    apartments,
    apartment,
    errors,
    searchApartments,
    getApartments,
    getApartment,
    updateApartment,
    destroyApartment
  }
}