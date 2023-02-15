<template>
  <div class="mt-6 mb-2 font-mono text-xs text-gray-400 uppercase tracking-widest">
    {{ $props.title }}
  </div>
</template>
<script>
export default {
  props: {
    title: {
      type: String,
      default: ''
    }
  }
}
</script>
