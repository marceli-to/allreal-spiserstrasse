<template>
  <div>
    <select 
      @change="updateInput"
      class="relative block w-full border-transparent shadow-inner shadow shadow-primary-200:50 focus:shadow-md focus:shadow-gray-200 rounded-lg px-3 py-3 font-sans text-sm text-gray-900 placeholder:font-sans placeholder:text-sm placeholder:text-primary-900 focus:border-transparent focus:ring-0">
      <option value="1">frei</option>
      <option value="2">reserviert</option>
      <option value="3">verkauft</option>
    </select>
  </div>
</template>
<script>
export default {
  name: "FormSelect",
  props: {
    
    id: {
      type: String,
      default: "",
    },
    
    modelValue: {
      type: [String, Number],
      default: "",
    },

    type: {
      type: String,
      default: "text",
    },

    placeholder: {
      type: String,
      default: "",
    },
  },

  methods: {
    updateInput(event) {
      this.$emit("update:modelValue", event.target.value);
    }
  }
};
</script>