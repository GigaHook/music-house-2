<template>
	<v-app>
		<Header/>

		<v-main class="main">
			<v-container>
				<slot/>
  		</v-container>
		</v-main>

		<Footer class="footer"/>
	</v-app>
</template>

<script setup>
import Header from '@/Components/Header.vue'
import Footer from '@/Components/Footer.vue'
</script>

<style scoped>
.main{
	min-height: calc(100vh - 128px);
}

.footer{
	max-height: 64px !important;
}
</style>