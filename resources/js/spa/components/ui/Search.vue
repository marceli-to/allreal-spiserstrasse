<template>
  <div class="max-w-sm relative">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-primary-900 z-20">
      <magnifier v-if="!keyword" />
      <a href="" @click.prevent="reset()" v-else>
        <cross />
      </a>
    </div>
    <form @submit.prevent="search(keyword)">
      <input 
        v-model="keyword"
        @blur="search(keyword)"
        @keydown="dirty = true"
        type="text" 
        placeholder="Suche..." 
        class="w-48 px-3 py-3 pl-10 relative block w-full border-transparent shadow-inner shadow shadow-primary-200:50 focus:shadow-md focus:shadow-gray-200 rounded-lg font-sans text-sm text-gray-900 placeholder:font-sans placeholder:text-sm placeholder:text-primary-900 focus:border-transparent focus:ring-0" />
    </form>
  </div>
</template>
<script setup>
import { ref } from 'vue';
import Magnifier from "@/spa/components/icons/Magnifier.vue";
import Cross from "@/spa/components/icons/Cross.vue";
const emit = defineEmits(['change', 'reset'])

const keyword = ref('');
const dirty = ref(false);

const reset = () => {
  keyword.value = '';
  emit('reset');
}

const search = (keyword) => {
  if (keyword.length === 0 && dirty.value) {
    emit('reset');
  }
  else if (keyword.length > 2 && dirty.value) {
    emit('change', keyword);
  }
}
</script>