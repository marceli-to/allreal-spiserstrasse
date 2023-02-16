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
        <form class="p-4" @submit.prevent="update(apartment.id, apartment, state)">
          <h1 class="mb-8">
            <span class="font-bold text-primary-900 text-xl block mb-1">{{ apartment.number }}</span>
            {{ apartment.type !== 'Atelier' ? apartment.rooms + ' Zimmer' : 'Atelier' }}, {{ apartment.floor }}, {{ apartment.street }}
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
import Content from "@/components/layout/Content.vue";
import ContentHeader from "@/components/layout/ContentHeader.vue";
import ContentMain from "@/components/layout/ContentMain.vue";
import ContentSection from "@/components/layout/ContentSection.vue";
import ButtonPrimary from "@/components/buttons/Primary.vue";
import ButtonSecondary from "@/components/buttons/Secondary.vue";
import Check from "@/components/icons/Check.vue";
import ArrowSmallLeft from "@/components/icons/ArrowSmallLeft.vue";
import FormGroup from "@/components/ui/form/Group.vue";
import FormInput from "@/components/ui/form/Input.vue";
import FormSelect from "@/components/ui/form/Select.vue";
import useApartments from "@/composables/apartments";
import { ref } from 'vue';
import { onMounted } from "vue";
import { useLoadingStateStore } from '@/stores/loadingState';
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