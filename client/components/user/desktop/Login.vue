<template>
    <div class="login">
        <el-card>
            <el-row type="flex" justify="center">
                <h3>Connection</h3>
            </el-row>
            <p>Email</p>
            <el-input placeholder="Entrez quelque chose" v-model="email"></el-input>   
            <p>Mot de passe</p>
            <el-input placeholder="Entrez quelque chose" v-model="password"></el-input>   
            <el-row type="flex" justify="end" class="btn-submit">
                <el-button type="primary" v-loading.fullscreen.lock="loading" @click="submit">Connexion</el-button>
            </el-row>   
        </el-card>
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
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
}
.el-card {
    width: 400px;
}
.btn-submit {
    margin-top: 1rem;
}
</style>
