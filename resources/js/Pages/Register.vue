<template>
  <v-card>
    <v-card-title>
      Регистрация
    </v-card-title>

    <v-card-text>
      <v-form
        ref="form"
        validate-on="blur"
        @submit.prevent="submit"
      >
        <v-text-field/>
      </v-form>
    </v-card-text>
  </v-card>
</template>

<script setup>

</script>