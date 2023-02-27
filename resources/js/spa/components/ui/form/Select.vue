<template>
  <div>
    <select 
      @change="updateInput"
      v-model="modelValue"
      class="relative block w-full border-transparent shadow-inner shadow shadow-primary-200:50 focus:shadow-md focus:shadow-gray-200 rounded-lg px-3 py-3 font-sans text-sm text-gray-900 placeholder:font-sans placeholder:text-sm placeholder:text-primary-900 focus:border-transparent focus:ring-0">
      <option v-for="(option, index) in options" :key="index" :value="option.key">
        {{ option.value }}
      </option>
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

    options: {
      type: Object
    }
  },

  methods: {
    updateInput(event) {
      this.$emit("update:modelValue", event.target.value);
    }
  }
};
</script>