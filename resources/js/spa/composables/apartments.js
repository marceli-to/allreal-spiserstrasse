import { ref } from 'vue';
import axios from "axios";
import { useRouter } from 'vue-router';
import { useLoadingStateStore } from '@/stores/loadingState';
import { storeToRefs } from 'pinia';

export default function useApartments() {
  const apartments = ref([]);
  const apartment = ref([]);
  const states = ref([
    {
      key: 'available',
      value: 'frei'
    },
    {
      key: 'reserved',
      value: 'reserviert'
    },
    {
      key: 'sold',
      value: 'verkauft'
    },
  ]);
  const router = useRouter();
  const errors = ref('');

  const store = storeToRefs(useLoadingStateStore());

  const routes = {
    get: `/api/apartments`,
    find: `/api/apartment`,
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
    let response = await axios.get(`${routes.find}/${id}`);
    apartment.value = response.data;
    store.loaded.value = true;
  };

  const updateApartment = async (id, data) => {
    errors.value = ''
    try {
      await axios.put(`/api/apartment/${id}`, data)
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
    router,
    apartments,
    apartment,
    states,
    errors,
    searchApartments,
    getApartments,
    getApartment,
    updateApartment,
    destroyApartment
  }
}