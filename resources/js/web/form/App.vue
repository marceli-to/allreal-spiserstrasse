<template>
  <form>
    <div :class="[errors.name ? 'text-red-500' : '', 'grid grid-cols-2 items-center mb-8 group']">
      <label class="col-span-1">{{ errors.name ? errors.name : 'Name'}}</label>
      <input class="col-span-1 p-0" type="text" name="name" placeholder="Name" v-model="form.name" @focus="removeValidationError('name')">
    </div>
    <div :class="[errors.firstname ? 'text-red-500' : '', 'grid grid-cols-2 items-center mb-8 group']">
      <label class="col-span-1">{{ errors.firstname ? errors.firstname : 'Vorname'}}</label>
      <input class="col-span-1 p-0" type="text" name="name" placeholder="Vorname" v-model="form.firstname" @focus="removeValidationError('firstname')">
    </div>
    <div class="grid grid-cols-2 items-center">
      <button class="col-start-2 col-span-2 p-4 border border-anthrazit text-left" @click.prevent="submit()">Submit</button>
    </div>
  </form>
</template>
<script>
import NProgress from 'nprogress';

export default {

  data() {
    return {

      form: {
        name: null,
        firstname: null,
      },

      errors: {},

      routes: {
        store: '/api/contact-form'
      }
    }
  },

  mounted() {
  },

  methods: {
    submit() {
      NProgress.start();
      this.axios.post(this.routes.store, this.form).then(response => {
        NProgress.done();
        this.reset();
      })
      .catch(error => {
        NProgress.done();
        this.handleValidationErrors(error.response.data);
      });
    },

    handleValidationErrors(data) {
      let errors = [];
      for (let key in data.errors) {
        errors[data.errors[key][0]['field']] = data.errors[key][0]['error'];
      }
      this.errors = errors;
    },

    removeValidationError(field) {
      this.errors[field] = null;
    },

    reset() {
      this.form = {
        name: null,
        firstname: null
      };
      this.errors = {};
    }
  }
}
</script>