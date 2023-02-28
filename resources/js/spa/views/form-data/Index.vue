<template>
  <content v-if="store.loaded.value === true">
    <content-header>
      <search 
        @change="searchFormData($event)" 
        @reset="getFormData()"
      />
    </content-header>
    <content-main>
      <content-section>
        <table-container>
          <template #table-head>
            <table-head>
              Name
            </table-head>
            <table-head>
              Vorname
            </table-head>
            <table-head>
             E-Mail
            </table-head>
            <table-head>
              Telefon
            </table-head>
            <table-head>&nbsp;</table-head>
          </template>
          <template #table-body>
            <template v-for="data in formData" :key="data.id">
              <table-row>
                <table-cell>{{ data.name }}</table-cell>
                <table-cell>{{ data.firstname }}</table-cell>
                <table-cell>{{ data.email }}</table-cell>
                <table-cell>{{ data.phone }}</table-cell>
                <table-cell class="text-right">
                  <a 
                    href="javascript:;" 
                    @click.prevent="destroyFormData(data.id)"
                    class="text-xs text-primary-900 hover:underline underline-offset-2">
                    Bearbeiten
                  </a>
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
import useFormData from "@/spa/composables/formdata";
import { ref, onMounted } from "vue";
import { useLoadingStateStore } from '@/spa/stores/loadingState';
import { storeToRefs } from 'pinia';

const { formData, getFormData, searchFormData, destroyFormData } = useFormData();

const store = storeToRefs(useLoadingStateStore());
store.loaded.value = false;

onMounted(() => {
  getFormData();
});

</script>