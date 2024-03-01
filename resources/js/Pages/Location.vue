<template>
  <Head>
    <title>Где нас найти?</title>
  </Head>

  <v-row justify="center">
    <v-col cols="6">
      <v-row justify="center">
        <v-col cols="10" class="text-h5">
          Вы можете найти нас по слеюующим адресам
        </v-col>
      
        <v-col cols="3">
          <div class="text-h5">
            Город
          </div>
        
          <div class="text-h6">
            Москва
          </div>
        
          <div class="text-h6">
            Санкт-питербург
          </div>
        
          <div class="text-h6">
            Казань
          </div>
        </v-col>
      
        <v-col cols="3">
          <div class="text-h5">
            Улица
          </div>
        
          <div class="text-h6">
            ул. Ленина
          </div>
          
          <div class="text-h6">
            ул. Пушкина
          </div>
        
          <div class="text-h6">
            ул. Ленина
          </div>
        </v-col>
      
        <v-col cols="2">
          <div class="text-h5">
            Дом
          </div>
        
          <div class="text-h6">
            д. 1
          </div>
          
          <div class="text-h6">
            д. 2
          </div>
        
          <div class="text-h6">
            д. 4
          </div>
        </v-col>
      
        <v-col cols="2">
          <div class="text-h5">
            Квартира
          </div>
        
          <div class="text-h6">
            кв. 12
          </div>
          
          <div class="text-h6">
            кв. 34
          </div>
        
          <div class="text-h6">
            кв. 28
          </div>
        </v-col>
      </v-row>
    </v-col>
  </v-row>
</template>
  
  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue'
  import { Head } from '@inertiajs/vue3'
  
  defineOptions({ layout: AppLayout })
  </script>