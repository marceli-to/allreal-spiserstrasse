<template>
  <content v-if="store.loaded.value === true">
    <content-header>
      <search 
        @change="doSearch($event)" 
        @reset="getApartments()"
      />
    </content-header>
    <content-main>
      <content-section>
        <table-container>
          <template #table-head>
            <table-head>Nummer</table-head>
            <table-head>Zimmer</table-head>
            <table-head>Strasse</table-head>
            <table-head>Stockwerk</table-head>
            <table-head>&nbsp;</table-head>
          </template>
          <template #table-body>
            <template v-for="apartment in apartments" :key="apartment.id">
              <table-row>
                <table-cell>{{ apartment.number }}</table-cell>
                <table-cell>{{ apartment.type }}</table-cell>
                <table-cell>{{ apartment.street }}</table-cell>
                <table-cell>{{ apartment.floor }}</table-cell>
                <table-cell>
                  <pill :class="`is-${apartment.state.key}`">
                    {{ apartment.state.value }}
                  </pill>
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
import Content from "@/components/layout/Content.vue";
import ContentHeader from "@/components/layout/ContentHeader.vue";
import ContentMain from "@/components/layout/ContentMain.vue";
import ContentSection from "@/components/layout/ContentSection.vue";
import TableContainer from "@/components/ui/table/Table.vue";
import TableHead from "@/components/ui/table/Th.vue";
import TableRow from "@/components/ui/table/Tr.vue";
import TableCell from "@/components/ui/table/Td.vue";
import ButtonSecondary from "@/components/buttons/Secondary.vue";
import Search from "@/components/ui/Search.vue";
import Pill from "@/components/ui/Pill.vue";
import UserGroup from "@/components/icons/UserGroup.vue";
import useApartments from "@/composables/apartments";
import { onMounted } from "vue";
import { useLoadingStateStore } from '@/stores/loadingState';
import { storeToRefs } from 'pinia';

const { apartments, getApartments, updateApartment, searchApartments } = useApartments();

const store = storeToRefs(useLoadingStateStore());
store.loaded.value = false;

onMounted(() => {
  getApartments();
});

const deleteApartment = async (id) => {
  if (!window.confirm('Are you sure?')) {
    return
  }
  await destroyApartment(id);
  await getApartments();
}

const doSearch = async (keyword) => {
  await searchApartments(keyword);
}

</script>