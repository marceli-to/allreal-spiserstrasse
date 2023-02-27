<template>
  <content v-if="store.loaded.value === true">
    <content-header>
      <button-secondary 
        @click="$router.push({ name: 'apartments.index' })" 
        :label="'Zurück'">
        <template #icon>
          <arrow-small-left class="w-4 h-4" />
        </template>
      </button-secondary>
    </content-header>
    <content-main>
      <content-section>
        <form class="pl-7 pr-8 pt-6 pb-0" @submit.prevent="update(apartment.id, apartment, state)">
          <h1 class="mb-8">
            <div class="flex justify-between items-center">
              <span class="font-bold text-primary-900 text-xl block mb-1">{{ apartment.number }}</span>
              <div>{{ apartment.type !== 'Atelier' ? apartment.rooms + ' Zimmer-Wohnung' : 'Atelier' }}, {{ apartment.floor }}, {{ apartment.street }}</div>
            </div>
          </h1>
          <form-group :label="'Preis'">
            <form-input 
              type="text" 
              class="" 
              v-model="apartment.price" 
              placeholder="Preis">
            </form-input>
          </form-group>
          <form-group :label="'Status'">
            <form-select 
              v-model="state" 
              :options="states">
            </form-select>
          </form-group>
          <form-group class="mt-10">
            <button-primary 
              :label="'Speichern'">
              <template #icon>
                <check />
              </template>
            </button-primary>
          </form-group>
        </form>
      </content-section>
    </content-main>
  </content>
</template>
<script setup>
import Content from "@/spa/components/layout/Content.vue";
import ContentHeader from "@/spa/components/layout/ContentHeader.vue";
import ContentMain from "@/spa/components/layout/ContentMain.vue";
import ContentSection from "@/spa/components/layout/ContentSection.vue";
import ButtonPrimary from "@/spa/components/buttons/Primary.vue";
import ButtonSecondary from "@/spa/components/buttons/Secondary.vue";
import Check from "@/spa/components/icons/Check.vue";
import ArrowSmallLeft from "@/spa/components/icons/ArrowSmallLeft.vue";
import FormGroup from "@/spa/components/ui/form/Group.vue";
import FormInput from "@/spa/components/ui/form/Input.vue";
import FormSelect from "@/spa/components/ui/form/Select.vue";
import useApartments from "@/spa/composables/apartments";
import { ref, onMounted } from "vue";
import { useLoadingStateStore } from '@/spa/stores/loadingState';
import { storeToRefs } from 'pinia';
const { router, getApartment, updateApartment, apartment, states } = useApartments();

const store = storeToRefs(useLoadingStateStore());
store.loaded.value = false;

let state = ref('');

onMounted(() => {
  getApartment(router.currentRoute.value.params.id).then(() => {
    state.value = apartment.value.state.key;
  });
});

const update = async () => {
  await updateApartment(apartment.value.id, {
    state: state.value,
    price: apartment.value.price
  });
}


</script>