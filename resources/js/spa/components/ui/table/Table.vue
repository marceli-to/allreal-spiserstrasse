<template>
  <table class="w-full">
    <thead class="text-sm border-b border-gray-100">
      <slot name="table-head" />
    </thead>
    <tbody class="text-sm">
      <slot name="table-body" />
    </tbody>
  </table>
</template>