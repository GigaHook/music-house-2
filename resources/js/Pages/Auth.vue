<template>
  <Head>
    <title>Войти</title>
  </Head>

  <v-card-title>Авторизация</v-card-title>

  <v-card-text>
    <v-form
      ref="form"
      validate-on="blur"
      @submit.prevent="submit"
      :readonly="formData.processing"
    >
      <v-text-field
        label="Логин"
        v-model="formData.login"
        :error-messages="formData.errors.login"
        @update:model-value="formData.clearErrors('login')"
        :rules="[rules.required, rules.max, rules.eng]"
      />

      <v-text-field
        label="Пароль"
        v-model="formData.password"
        :error-messages="formData.errors.password"
        @update:model-value="formData.clearErrors('password')"
        :rules="[rules.required, rules.max, rules.min]"
        type="password"
      />

      <v-btn
        type="submit"
        text="Войти"
        :loading="formData.processing"
      />

      <v-btn
        variant="text"
        text="Ещё нет аккаунта?"
        @click="$inertia.get(route('Register'))"
      />
    </v-form>
  </v-card-text>
</template>

<script setup>
import { ref } from 'vue'
import { useForm, Head } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import FormLayout from '@/Layouts/FormLayout.vue'

defineOptions({ layout: [AppLayout, FormLayout] })

const rules = {
  required: v => !!v || 'Это поле нужно заполнить',
  min: v => v?.length >= 6 || 'Минимум 6 символов',
  max: v => v?.length <= 100 || 'Слишком длинное значение',
  eng: v => !!v && /[a-zA-Z-\s]+$/g.test(v) || 'Только английские буквы, тире и пробел',
}

const form = ref()
const formData = useForm({
  login: null,
  password: null,
})

function submit() {
  form.value.validate().then(() => {
    if (form.value.isValid) {
      formData.post(route('Login'))
    }
  })
}
</script>