<template>
    <div class="container-login">
        <Login @login="login" :loading="loading" />
    </div>    
</template>

<script>
import Login from '../../components/user/Login.vue'
export default {
    middleware: 'guest',
    head: {
        title: '',
        meta: [
            { hid: 'description', name: 'description', content: 'Login page' }
        ],
    },
    components: {
        Login
    },
    data: function () {
        return {
            loading: false,
        }
    },
    methods: {
        async login(user) {
            this.loading = true
            try {
                await this.$auth.loginWith('laravelSanctum', {data: user})
                this.loading = false
            } catch (err) {
                this.loading = false
                this.$message.error('Echec de la connexion');
                if (err.response.status = 422) {
                    this.errors = 'Could not sign you in with those credentials.'
                }
            }
        }
    }
}
</script>
<style lang="css" scoped>
.container-login {
    height: calc(100vh - 76px);
    overflow: hidden;
    background-color: var(--primary);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-bottom: 8rem;
}

</style>