import { ref } from 'vue';
import axios from "axios";
import { useRouter } from 'vue-router';
import { useLoadingStateStore } from '@/spa/stores/loadingState';
import { storeToRefs } from 'pinia';

export default function useFormData() {
  const formData = ref([]);
  const router = useRouter();
  const errors = ref('');
  const store = storeToRefs(useLoadingStateStore());

  const routes = {
    get: `/api/form-data`,
    search: `/api/form-data/search`
  };

  const getFormData = async () => {
    let response = await axios.get(`/api/form-data`);
    formData.value = response.data;
    store.loaded.value = true;
  };

  const searchFormData = async (keyword) => {
    let response = await axios.get(`${routes.search}/${keyword}`);
    formData.value = response.data;
  };

  const destroyFormData = async (id) => {
    if (confirm('Are you sure?')) {
      await axios.delete('/api/form-data/' + id).then(() => {
        formData.value = formData.value.filter(item => item.id !== id);
      });
    }
  }

  return {
    router,
    formData,
    errors,
    searchFormData,
    getFormData,
    destroyFormData
  }
}