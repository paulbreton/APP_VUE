<template>
    <div>
        <el-row type="flex" justify="center">
            <h3>Inscription</h3>
        </el-row>
        <p>Name</p>
        <el-input placeholder="Entrez quelque chose" v-model="name"></el-input>   
        <p>Username</p>
        <el-input placeholder="Entrez quelque chose" v-model="username"></el-input>
        <p>Email</p>
        <Input placeholder="Entrez votre email" :value.sync="email" @handle-input="inputEmail" :isValid="isCorrectEmail(email)"/>
        <p>Password</p>
        <Input placeholder="Entrez votre mot de passe" :value.sync="pass1" @handle-input="input1" :password="true" :isValid="isCorrectPassword(pass1)" class="input-space"/>
        <Input placeholder="Confirmer votre mot de passe" :value.sync="pass2" @handle-input="input2" :password="true" :isValid="bothPasswordIsSame(pass1, pass2)"/>

        <el-row type="flex" justify="end" class="btn-submit">
            <el-button type="primary" @click="submit" v-loading.fullscreen.lock="loading" :disabled="!allIsGood(email, pass1, pass2)">Valider</el-button>
        </el-row>
    </div> 
</template>

<script>
import { ref } from '@vue/composition-api'
import Input from '../form/Input.vue'

export default {
    components: {
        Input
    },
    props: {
        loading: {
            type: Boolean,
            default: false,
        },
    },
    setup(_, { emit }) {
        
        const name = ref('')
        const email = ref('')
        const username = ref('')
        const pass1 = ref('')
        const pass2 = ref('')

        const input1 = (data) => {
            pass1.value = data
        }
        const input2 = (data) => {
            pass2.value = data
        }
        const inputEmail = (data) => {
            email.value = data
        }

        const {isCorrectPassword, isCorrectEmail, bothPasswordIsSame, allIsGood} = useControlePassword(pass1, pass2, email)

        const submit = () => {
            emit('steps', {
                name: name.value,
                username: username.value,
                email: email.value,
                password: pass1.value,
                password_confirmation: pass2.value
            })
        }

        return {
            name,
            username,
            email,
            pass1,
            pass2,
            input1,
            input2,
            inputEmail,
            isCorrectPassword,
            bothPasswordIsSame,
            isCorrectEmail,
            allIsGood,
            submit,
        }
    },
}

function useControlePassword(password1, password2, email) {
    const isCorrectPassword = (password1) => {
        const correct = password1.match(/[A-Z]/g)
        return correct ? correct.length > 1 && password1.length >= 8: false
    }

    const bothPasswordIsSame = (password1, password2) => {
        return password1 === password2
    }
    
    const isCorrectEmail = (email) => {
        //TODO: ameliorer la regex
        const correct = email.match(/@/g)
        return correct ? correct.length > 0 : false

    }

    const allIsGood = (email, password1, password2) => {
        return isCorrectPassword(password1) && isCorrectEmail(email) && bothPasswordIsSame(password1, password2)
    }
    
    return {
        isCorrectPassword,
        bothPasswordIsSame,
        isCorrectEmail,
        allIsGood,
    }
}

</script>

<style lang="css" scoped>
.btn-submit {
    margin-top: 1rem;
}
.input-space {
    margin-bottom: 1rem;
}
</style>