<template>
    <Login @login="login" :loading="loading"/>
</template>

<script>
import Login from '../../../components/user/mobile/Login.vue'
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
                    if (err.response.status = 422) {
                        this.errors = 'Could not sign you in with those credentials.'
                    }
                }
            }
        }
    }
</script>
