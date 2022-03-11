<template>
    <div class="container-register">
        <Steps-register @newUser="register" :loading="loading"/>
    </div>
</template>

<script>
import StepsRegister from '../../components/user/StepsRegister.vue'

    export default {
        middleware: 'guest',
        head: {
            title: ' | Register',
            meta: [
                { hid: 'description', name: 'description', content: 'Registration page' }
            ],
        },
        components: {
            'Steps-register': StepsRegister,
        },
        data: ()=> ({
            errors: [],
            loading: false,
        }),
        methods: {
            async register(user) {
                this.loading = true
                try {
                    let errors = []
                    await this.$axios.$get('sanctum/csrf-cookie')
                    await this.$axios.$post('/register', user)
                        .then((resp) => {})
                        .catch((err) => {
                            if (err.response.status = 422) {
                                errors = err.response.data.errors
                            }
                        })
                        this.errors = errors
                    await this.$auth.loginWith('laravelSanctum', {data: this.form})
                    this.loading = false
                } catch (error) {
                    this.loading = false
                }
            }
        }
    }
</script>
<style scoped>
.container-register {
    height: calc(100vh - 76px);
    background-color: var(--primary);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 0 3rem;
}

</style>