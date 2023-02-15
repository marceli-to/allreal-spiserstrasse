<template>
<div class="mb-6">
  <label class="block text-sm mb-3">
    {{ $props.label }}
  </label>
  <slot />
</div>
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
