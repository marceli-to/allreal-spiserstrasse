<template>
  <content v-if="store.loaded.value === true">
    <content-header>
      <search 
        @change="searchApartments($event)" 
        @reset="getApartments()"
      />
    </content-header>
    <content-main>
      <content-section>
        <table-container>
          <template #table-head>
            <table-head>
              <a href="" @click.prevent="sortBy('number')" class="flex items-center">
                Number
                <chevron-up-down class="ml-2" />
              </a>
            </table-head>
            <table-head>
              <a href="" @click.prevent="sortBy('type')" class="flex items-center">
                Zimmer
                <chevron-up-down class="ml-2" />
              </a>
            </table-head>
            <table-head>
              <a href="" @click.prevent="sortBy('floor')">Stockwerk</a>
            </table-head>
            <table-head>Strasse</table-head>
            <table-head>
              <a href="" @click.prevent="sortBy('price')" class="flex items-center">
                Preis
                <chevron-up-down class="ml-2" />
              </a>
            </table-head>
            <table-head>&nbsp;</table-head>
          </template>
          <template #table-body>
            <template v-for="apartment in apartments" :key="apartment.id">
              <table-row>
                <table-cell>{{ apartment.number }}</table-cell>
                <table-cell>{{ apartment.type }}</table-cell>
                <table-cell>{{ apartment.floor }}</table-cell>
                <table-cell>{{ apartment.street }}</table-cell>
                <table-cell>{{ apartment.price }}</table-cell>
                <table-cell>
                  <pill class="is-available" v-if="apartment.state == 1">frei</pill>
                  <pill class="is-reserved" v-if="apartment.state == 2">reserviert</pill>
                  <pill class="is-sold" v-if="apartment.state == 3">verkauft</pill>
                </table-cell>
                <table-cell class="text-right">
                  <router-link 
                    :to="{ name: 'apartment.update', params: { id: apartment.id} }" 
                    class="text-xs text-primary-900 hover:underline underline-offset-2">
                    Bearbeiten
                  </router-link>
                </table-cell>
              </table-row>
            </template>
          </template>
        </table-container>
      </content-section>
    </content-main>
  </content>
</template>
<script setup>
import Content from "@/spa/components/layout/Content.vue";
import ContentHeader from "@/spa/components/layout/ContentHeader.vue";
import ContentMain from "@/spa/components/layout/ContentMain.vue";
import ContentSection from "@/spa/components/layout/ContentSection.vue";
import TableContainer from "@/spa/components/ui/table/Table.vue";
import TableHead from "@/spa/components/ui/table/Th.vue";
import TableRow from "@/spa/components/ui/table/Tr.vue";
import TableCell from "@/spa/components/ui/table/Td.vue";
import Search from "@/spa/components/ui/Search.vue";
import Pill from "@/spa/components/ui/Pill.vue";
import ChevronUpDown from "@/spa/components/icons/ChevronUpDown.vue";
import useApartments from "@/spa/composables/apartments";
import { ref, onMounted } from "vue";
import { useLoadingStateStore } from '@/spa/stores/loadingState';
import { storeToRefs } from 'pinia';

const { apartments, getApartments, searchApartments } = useApartments();

const store = storeToRefs(useLoadingStateStore());
store.loaded.value = false;

let sortDirection = ref(false);

onMounted(() => {
  getApartments();
});

const sortBy = (attribute) => {
  sortDirection.value = sortDirection.value ? false : true;
  const order = sortDirection.value ? -1 : 1;
  apartments.value.sort((a, b) => {
    let aValue = parseFloat(a[attribute]);
    let bValue = parseFloat(b[attribute]);

    if (isNaN(aValue) && isNaN(bValue)) {
      // Both values are non-numeric strings, so sort them alphabetically
      aValue = a[attribute];
      bValue = b[attribute];
    } else if (isNaN(aValue)) {
      // a is a non-numeric string, so it should come after b
      return 1;
    } else if (isNaN(bValue)) {
      // b is a non-numeric string, so it should come after a
      return -1;
    }
    return order * (aValue - bValue);
  });
};

</script>