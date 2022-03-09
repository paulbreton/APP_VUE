<template>
    <div class="login">
        <el-row type="flex" justify="center">
            <h1>Connection</h1>
        </el-row>
        <el-input class="input" placeholder="Email" v-model="email"></el-input>
        <el-input class="input" placeholder="Mot de passe" v-model="password"></el-input>   
        <el-row type="flex" justify="center" class="btn-submit">
            <el-button v-loading.fullscreen.lock="loading" @click="submit">Connexion</el-button>
        </el-row>
    </div> 
</template>

<script>
import { defineComponent, ref } from '@vue/composition-api'

export default defineComponent({
    props: {
        loading: {
            type: Boolean,
            default: false,
        }
    },
    setup(_,{emit}) {
        const password = ref('')
        const email = ref('')

        const submit = () => {
            emit('login', {
                email: email.value,
                password: password.value
            })
        }

        return {
            email,
            password,
            submit,
        }
    },
})
</script>

<style lang="css" scoped>
.login {
    background-color: var(--primary);
    padding: 4rem 4rem 3rem 4rem;
    color: white;
}

@media screen and (min-width: 800px) {
    .login {
        max-width: 600px;
        margin: auto
    }
}
.input {
    margin-top: 2rem;
}
.btn-submit {
    margin-top: 2rem;
}
h1 {
    font-weight: 600;
    font-size: 2rem;
}
button {
    background-color: white;
    color: var(--primary)
}
</style>
