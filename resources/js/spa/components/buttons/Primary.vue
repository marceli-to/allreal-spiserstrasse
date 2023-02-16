<template>
  <button :class="[$slots.icon ? 'pl-10' : '', 'group relative w-auto flex justify-center bg-gray-100 block shadow-inner shadow shadow-primary-200:50 hover:shadow-md hover:shadow-gray-200 rounded-lg px-4 py-3 pl-10 @endif text-primary-900 text-sm']">
    <div v-if="$slots.icon"
      class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-primary-900">
      <slot name="icon" />
    </div>
    <span class="block">{{ $props.label }}</span>
  </button>
</template>
<script>
export default {
  props: {
    label: {
      type: String,
      default: ''
    }
  }
}
</script>