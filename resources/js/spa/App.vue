<template>
  <div class="flex min-h-screen">
    <nav-bar />
    <router-view />
  </div>
</template>
<script>
import NavBar from "@/spa/components/navigation/NavBar.vue";

export default {
  components: {
    NavBar
  },
}
</script>