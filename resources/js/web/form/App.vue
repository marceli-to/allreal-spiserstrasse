<template>
  <form>
    <template v-if="isSent">
      <p class="text-base text-green-500 mb-32">
        Vielen Dank für Ihre Anfrage. Wir werden diese bearbeiten und melden uns bei Ihnen.
      </p>
    </template>
    <template v-else>
      <div class="form-group">
        <h3 class="uppercase col-start-2 col-span-1 text-base mb-28">Interessent/in</h3>
      </div>
      <div :class="[errors.name ? 'text-red-500' : '', 'form-group group']">
        <label class="border-t border-t-anthrazit">{{ errors.name ? errors.name : 'Name *'}}</label>
        <input class="!border-t !border-t-anthrazit" type="text" name="name" v-model="form.name" @focus="removeValidationError('name')">
      </div>
      <div :class="[errors.firstname ? 'text-red-500' : '', 'form-group group']">
        <label>{{ errors.firstname ? errors.firstname : 'Vorname *'}}</label>
        <input type="text" name="firstname" v-model="form.firstname" @focus="removeValidationError('firstname')">
      </div>
      <div :class="[errors.street ? 'text-red-500' : '', 'form-group group']">
        <label>{{ errors.firstname ? errors.street : 'Strasse *'}}</label>
        <input type="text" name="street" v-model="form.street" @focus="removeValidationError('street')">
      </div>
      <div class="form-group group">
        <label>Hausnummer</label>
        <input type="text" name="street" v-model="form.street_number">
      </div>
      <div :class="[errors.zip ? 'text-red-500' : '', 'form-group group']">
        <label>{{ errors.firstname ? errors.zip : 'Postleitzahl *'}}</label>
        <input type="text" name="street" v-model="form.zip" @focus="removeValidationError('zip')">
      </div>
      <div :class="[errors.name ? 'text-red-500' : '', 'form-group group']">
        <label>{{ errors.firstname ? errors.city : 'Ort *'}}</label>
        <input type="text" name="street" v-model="form.city" @focus="removeValidationError('city')">
      </div>
      <div :class="[errors.phone ? 'text-red-500' : '', 'form-group group']">
        <label>{{ errors.phone ? errors.phone : 'Telefon *'}}</label>
        <input type="text" name="phone" v-model="form.phone" @focus="removeValidationError('phone')">
      </div>
      <div :class="[errors.email ? 'text-red-500' : '', 'form-group group']">
        <label>{{ errors.email ? errors.email : 'E-Mail *'}}</label>
        <input type="email" name="firstname" v-model="form.email" @focus="removeValidationError('email')">
      </div>
      <div :class="[errors.privacy_statement ? 'text-red-500' : '', 'form-group group mt-12']">
        <div class="col-span-16 flex items-center">
          <input 
            type="checkbox" 
            value="1" 
            v-model="form.privacy_statement" 
            id="accept_privacy_statement" 
            class="!ring-0 leading-none focus:!ring-0 text-anthrazit"
            @change="removeValidationError('privacy_statement')" />
          <label class="border-none ml-12" for="accept_privacy_statement">
            <template v-if="errors.privacy_statement">
              <span class="text-red-500" v-html="errors.privacy_statement"></span>
            </template>
            <template v-else>
              Ich akzeptiere die <a href="https://allreal.ch/datenschutzerklaerung/" target="_blank" class="underline underline-offset-2">Datenschutzerklärung</a><sup class="text-xxs">1</sup> von Allreal
            </template>
          </label>
        </div>
      </div>
      <div class="form-group">
        <button @click.prevent="submit()">Senden</button>
      </div>
      <div class="text-base mt-48">
        <sup class="text-xxs">1</sup>Hinweis zum Datenschutz: Ihre persönlichen Daten werden nur für die Aufnahme in unsere Interessentendatenbank verwendet und nicht an Dritte weitergegeben. Weitere Informationen finden Sie in unserer Datenschutzerklärung.
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
        email: null,
        privacy_statement: null
      },

      errors: {
        name: null,
        firstname: null,
        phone: null,
        email: null,
        privacy_statement: null
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

      if (!this.form.privacy_statement) {
        this.errors.privacy_statement = 'Bitte akzeptieren Sie die <a href="https://allreal.ch/datenschutzerklaerung/" target="_blank" class="underline underline-offset-2">Datenschutzerklärung</a> von Allreal';
      }

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
<style>
@config "../../../../tailwind.web.config.js";
.form-group {
  @apply grid grid-cols-2 gap-16 leading-none
}

.form-group label {
  @apply block col-span-1 py-8 lg:py-10 mt-1 border-b border-b-silver text-base leading-none
}

.form-group input[type=text],
.form-group input[type=email] {
  @apply block col-span-1 py-8 lg:py-10 px-0 border-t-0 border-x-0 border-b border-b-silver text-base !ring-0 leading-none
}

.form-group button {
  @apply mt-32 tracking-wider col-span-1 col-start-2 uppercase text-center border border-silver text-base text-silver leading-none py-10
}

.form-group button:hover {
  @apply border-black text-black
}
</style>