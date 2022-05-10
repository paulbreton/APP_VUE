<template>
	<div class="text-md nav-desktop">
		<nav class="fixed top-0 w-full flex justify-between items-center py-5">
			<span class="font-semibold text-2xl title">Association</span>
			<div class="space-x-2">
				<template v-if="this.$auth.loggedIn">
					<NuxtLink to="/admin" v-if="hasRole">
							Admin 
					</NuxtLink>
					<NuxtLink to="/" exact>
							Accueil
					</NuxtLink>
					<NuxtLink to="/game/" exact>
							Partie
					</NuxtLink>
					<a href="#" @click.prevent="logout">Déconnexion</a>
				</template>
				<template v-else>
					<NuxtLink to="/auth/register">
							Inscription
					</NuxtLink>
					<NuxtLink to="/auth/login">
							Connexion
					</NuxtLink>
				</template>
			</div>
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
    background-color: var(--background-secondary);
    z-index: 1;
}
.nav-desktop {
    padding: 1rem 0;
    color: var(--text-primary);

    a:hover {
      color: var(--text-secondary);
        
    }
    .title {
      color: var(--text-secondary);
    }
}
//
// TABLET
//
@media screen and (min-width: 1024px) {
    nav {
        padding: var(--padding-content-tablet);
    }
}

//
// DESKTOP
//
@media screen and (min-width: 1280px) {
    nav {
        padding: var(--padding-content-desktop);
    }
}
</style>
