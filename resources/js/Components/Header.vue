<template>
  <v-app-bar>
		<v-app-bar-title>
			Music House
		</v-app-bar-title>

		<v-btn
			@click="$inertia.get(route('Home'))"
			:active="$page.url == '/'"
			text="Каталог"
		/>

		<v-btn
			@click="$inertia.get(route('About'))"
			:active="$page.url == route('About')"
			text="О нас"
		/>

		<v-btn
			@click="$inertia.get(route('Location'))"
			:active="$page.url == route('Location')"
			text="Где нас найти?"
		/>

		<template v-if="!$page.props.user">
			<v-btn
				@click="$inertia.get(route('Auth'))"
				:active="$page.url == route('Auth')"
				text="Войти"
			/>

			<v-btn
				@click="$inertia.get(route('Register'))"
				:active="$page.url == route('Register')"
				text="Регистрация"
			/>
		</template>

		<template v-else>
			<v-btn
				@click="$inertia.get(route('Logout'))"
				:active="$page.url == route('Logout')"
				text="Выйти"
			/>
		</template>
	</v-app-bar>
</template>

<script setup>

</script>