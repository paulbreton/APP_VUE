<template>
	<div class="container-register">
		<Steps-register @newUser="register" :loading="loading"/>
	</div>
</template>

<script>
import { ref } from '@vue/composition-api'
import StepsRegister from '../../components/user/StepsRegister.vue'
import { useContext } from '@nuxtjs/composition-api'
import { commonError, error, success } from '@/assets/utils/Notification'
export default {
	middleware: 'guest',
	components: {
		'Steps-register': StepsRegister,
	},
	setup() {
		const { $axios, $auth } = useContext()
		const loading = ref(false)

		const register = async (user) => {
			loading.value = true
			try {
				await $axios.$get('sanctum/csrf-cookie')
				await $axios.$post('/register', user)
				await $auth.loginWith('laravelSanctum', {data: user})
				success('Inscription validée')
				loading.value = false
			} catch (err) {
				console.log(err.response)
				if(err.response.data.errors.email) {
					error('Email déjà utilisé')
				} else {
					commonError()
				}
				loading.value = false
			}
		}

		return {
			loading,
			register
		}
	}
}
</script>
<style scoped>
.container-register {
	height: calc(100vh - 76px);
	background-color: var(--background);
	display: flex;
	flex-direction: column;
	justify-content: center;
	padding: 0 3rem;
}
</style>