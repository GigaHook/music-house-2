<template>
  <Head>
    <title>Регистрация</title>
  </Head>

  <v-card-title>Регистрация</v-card-title>

  <v-card-text>
    <v-form
      ref="form"
      validate-on="blur"
      @submit.prevent="submit"
      :readonly="formData.processing"
    >
      <v-text-field
        label="Имя"
        v-model="formData.name"
        :error-messages="formData.errors.name"
        @update:model-value="formData.clearErrors('name')"
        :rules="[rules.required, rules.max, rules.rus]"
      />

      <v-text-field
        label="Фамилия"
        v-model="formData.surname"
        :error-messages="formData.errors.surname"
        @update:model-value="formData.clearErrors('surname')"
        :rules="[rules.required, rules.max, rules.rus]"
      />
      
      <v-text-field
        label="Отчество"
        v-model="formData.patronymic"
        :error-messages="formData.errors.patronymic"
        @update:model-value="formData.clearErrors('patronymic')"
        :rules="[rules.required, rules.max, rules.rus]"
      />
      
      <v-text-field
        label="Логин"
        v-model="formData.login"
        :error-messages="formData.errors.login"
        @update:model-value="formData.clearErrors('login')"
        :rules="[rules.required, rules.max, rules.eng]"
      />
      
      <v-text-field
        label="Почта"
        v-model="formData.email"
        :error-messages="formData.errors.email"
        @update:model-value="formData.clearErrors('email')"
        :rules="[rules.required, rules.max, rules.email]"
      />
      
      <v-text-field
        label="Пароль"
        v-model="formData.password"
        :error-messages="formData.errors.password"
        @update:model-value="() => {
          formData.clearErrors('password')
          confirm.length && form.items[6].validate()
        }"
        :rules="[rules.required, rules.max, rules.min]"
        type="password"
      />
      
      <v-text-field
        v-model="confirm"
        label="Подтвердите пароль"
        :rules="[rules.required, rules.max, rules.min, rules.repeat]"
        type="password"
      />

      <v-btn
        type="submit"
        text="Зарегистрироваться"
        :loading="formData.processing"
      />

      <v-btn
        variant="text"
        text="Уже есть аккаунт?"
        @click="$inertia.get(route('Auth'))"
      />
    </v-form>
  </v-card-text>
</template>

<script setup>
import { ref, defineOptions } from 'vue'
import { useForm, Head } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import FormLayout from '@/Layouts/FormLayout.vue'

defineOptions({ layout: [AppLayout, FormLayout] })

const confirm = ref('')
const form = ref()
const formData = useForm({
  name: null,
  surname: null,
  patronymic: null,
  login: null,
  email: null,
  password: null,
})

const rules = {
  required: v => !!v || 'Это поле нужно заполнить',
  min: v => v?.length >= 6 || 'Минимум 6 символов',
  max: v => v?.length <= 100 || 'Слишком длинное значение',
  email: v => !!v && /([\w]+@[\w]+\.[\w]{2,})/g.test(v) || 'Введите почту правильно',
  rus: v => !!v && /[а-яА-ЯёЁ-\s]+$/g.test(v) || 'Только русские буквы, тире и пробел',
  eng: v => !!v && /[a-zA-Z-\s]+$/g.test(v) || 'Только английские буквы, тире и пробел',
  repeat: v => !!v && v == formData.password || 'Пароли не совпадают',
}

function submit() {
  form.value.validate().then(() => {
    if (form.value.isValid) {
      formData.post(route('CreateUser'))
    }
  })
}
</script>