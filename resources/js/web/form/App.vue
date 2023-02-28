<template>
  <form>
    <template v-if="isSent">
      <p class="text-base text-green-500 mb-32">Vielen Dank für Ihre Anfrage. Wir werden diese bearbeiten und melden uns bei Ihnen.</p>
    </template>
    <template v-else>
      <div :class="[errors.name ? 'text-red-500' : '', 'grid grid-cols-2 items-center mb-8 group']">
        <label class="col-span-1">{{ errors.name ? errors.name : 'Name'}}</label>
        <input class="col-span-1 p-0" type="text" name="name" v-model="form.name" @focus="removeValidationError('name')">
      </div>
      <div :class="[errors.firstname ? 'text-red-500' : '', 'grid grid-cols-2 items-center mb-8 group']">
        <label class="col-span-1">{{ errors.firstname ? errors.firstname : 'Vorname'}}</label>
        <input class="col-span-1 p-0" type="text" name="name" v-model="form.firstname">
      </div>
      <div class="grid grid-cols-2 items-center mb-8">
        <label class="col-span-1">Strasse</label>
        <input class="col-span-1 p-0" type="text" name="street" v-model="form.street">
      </div>
      <div class="grid grid-cols-2 items-center mb-8">
        <label class="col-span-1">Hausnummer</label>
        <input class="col-span-1 p-0" type="text" name="street_number" v-model="form.street_number">
      </div>
      <div class="grid grid-cols-2 items-center mb-8">
        <label class="col-span-1">Postleitzahl</label>
        <input class="col-span-1 p-0" type="text" name="zip" v-model="form.zip">
      </div>
      <div class="grid grid-cols-2 items-center mb-8">
        <label class="col-span-1">Ort</label>
        <input class="col-span-1 p-0" type="text" name="city" v-model="form.city">
      </div>
      <div :class="[errors.phone ? 'text-red-500' : '', 'grid grid-cols-2 items-center mb-8 group']">
        <label class="col-span-1">{{ errors.phone ? errors.phone : 'Telefon'}}</label>
        <input class="col-span-1 p-0" type="text" name="phone" v-model="form.phone" @focus="removeValidationError('phone')">
      </div>
      <div :class="[errors.email ? 'text-red-500' : '', 'grid grid-cols-2 items-center mb-8 group']">
        <label class="col-span-1">{{ errors.email ? errors.email : 'E-Mail'}}</label>
        <input class="col-span-1 p-0" type="email" name="email" v-model="form.email" @focus="removeValidationError('email')">
      </div>
      <div class="grid grid-cols-2 items-center">
        <button class="col-start-2 col-span-2 p-4 border border-anthrazit text-left" @click.prevent="submit()">Submit</button>
      </div>
    </template>
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
        street: null,
        street_number: null,
        zip: null,
        city: null,
        phone: null,
        email: null
      },

      errors: {
        name: null,
        firstname: null,
        phone: null,
        email: null
      },

      routes: {
        store: '/api/form-data'
      },

      isSent: false
    }
  },

  methods: {
    submit() {
      NProgress.start();
      this.isSent = false;
      this.axios.post(this.routes.store, this.form).then(response => {
        NProgress.done();
        this.reset();
        this.isSent = true;
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
        firstname: null,
        street: null,
        street_number: null,
        zip: null,
        city: null,
        phone: null,
        email: null
      };
      this.errors = {};
    }
  }
}
</script>