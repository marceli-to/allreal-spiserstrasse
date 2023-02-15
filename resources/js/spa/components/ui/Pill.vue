<template>
  <div class="bg-gray-200 text-gray-600 text-xs rounded-full px-3 py-1 font-mono inline-flex w-auto">
    <slot />
  </div>
</template>
<style scoped>
.is-danger {
  @apply bg-red-200 text-red-600
}
.is-success {
  @apply bg-green-200 text-green-600
}
.is-warning {
  @apply bg-yellow-200 text-yellow-600
}
</style>