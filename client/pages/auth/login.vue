<template>
  <div class="container-login">
    <Login @login="login" :loading="loading" />
  </div>    
</template>

<script>
import { ref } from '@vue/composition-api'
import Login from '../../components/user/Login.vue'
import { useContext } from '@nuxtjs/composition-api'
import { error, success } from '@/assets/utils/Notification'
export default {
  middleware: 'guest',
  components: {
    Login
  },
  setup() {
    const { $auth } = useContext()
    const loading = ref(false)

    const login = async (user) => {
      loading.value = true
      try {
        await $auth.loginWith('laravelSanctum', {data: user})
        loading.value = false
        success('Bonjour ' + $auth.user.data.username)
      } catch (err) {
        loading.value = false
        error('Echec de la connexion')
      }
    }

    return {
      loading,
      login,
    }
  },
}
</script>
<style lang="css" scoped>
.container-login {
  height: calc(100vh - 76px);
  overflow: hidden;
  background-color: var(--background);
  display: flex;
  flex-direction: column;
  justify-content: center;
}
</style>