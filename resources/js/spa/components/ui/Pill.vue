<template>
  <div class="bg-gray-200 text-gray-600 text-xs rounded-full px-3 py-1 inline-flex w-auto">
    <slot />
  </div>
</template>
<style scoped>
.is-danger,
.is-sold {
  @apply bg-red-100 text-red-600
}
.is-success,
.is-available {
  @apply bg-green-100 text-green-600
}
.is-warning,
.is-reserved {
  @apply bg-yellow-100 text-yellow-600
}
</style>