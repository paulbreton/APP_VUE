<template>
	<div class="text-md nav-mobile">
		<!-- fixed nav -->
		<nav class="fixed bottom-0 inset-x-0 bg-blue-100 flex justify-between text-sm text-blue-900 uppercase font-mono">
			<template v-if="this.$auth.loggedIn">
				<NuxtLink to="/admin" v-if="hasRole" class="w-full block py-5 px-3 text-center link">
					<font-awesome-icon icon="sliders" class="nav-icon" />
					Admin 
				</NuxtLink>
				<NuxtLink to="/" exact class="w-full block py-5 px-3 text-center link">
					<font-awesome-icon icon="house-chimney" class="nav-icon" />
					Accueil
				</NuxtLink>
				<NuxtLink to="/game/" exact class="w-full block py-5 px-3 text-center link">
					<font-awesome-icon :icon="['fas', 'calendar-plus']" class="nav-icon"/>
					Partie
				</NuxtLink>
				<a href="#" @click.prevent="logout" class="w-full block py-5 px-3 text-center link"> 
					<font-awesome-icon icon="arrow-right-from-bracket" class="nav-icon" />
					Déconnexion
				</a>
			</template>
			<template v-else>
				<NuxtLink to="/auth/register" class="w-full block py-5 px-3 text-center link">
					<font-awesome-icon icon="arrow-up-right-from-square" class="nav-icon" />
					Inscription
				</NuxtLink>
				<NuxtLink to="/auth/login" class="w-full block py-5 px-3 text-center link">
					<font-awesome-icon icon="arrow-right-to-bracket" class="nav-icon"/>
					Connexion
				</NuxtLink>
			</template>
		</nav>
	</div>
</template>

<script>
import { computed, useContext } from '@nuxtjs/composition-api'
export default {
setup() {
		const context = useContext()

		const hasRole = computed(() => context.$auth.user ? context.$auth.user.data.role.id > 2 : false)

		const logout = () => context.$auth.logout()

		return {
			hasRole,
			logout
		}
	}
}
</script>
<style lang="scss" scoped>
nav {
	border-top-right-radius: 1rem;
	border-top-left-radius: 1rem;
	background-color: var(--background-secondary);
	color: var(--text-primary);
	.link {
		display: flex;
		align-items: center;
		justify-content: space-between;
		flex-direction: column;
	}
	.nav-icon {
		margin-bottom: 0.5rem;
	}

	a:hover {
		color: var(--text-secondary);
	}
}
</style>
