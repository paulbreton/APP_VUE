<template>
    <div class="content-grid content-step-register">
        <div class="label-name">Nom</div>
        <div class="input-name">
            <el-input placeholder="Nom" v-model="name"></el-input>
        </div>
        <div class="label-user">Prénom</div>
        <div class="input-user">
            <el-input placeholder="Prenom" v-model="username"></el-input>
        </div>
        <div class="label-email">
            Email
        </div>
        <div class="input-email">
            <Input placeholder="Email" :value.sync="email" @handle-input="inputEmail" :isValid="isCorrectEmail(email)"/>
        </div>
        <div class="label-password input-margin">
            Mot de passe
        </div>
        <div class="input-pass-1">
            <Input placeholder="Mot de passe" :value.sync="pass1" @handle-input="input1" :password="true" :isValid="isCorrectPassword(pass1)" class="input-space"/>
        </div>
        <div class="input-pass-2">
            <Input placeholder="Confirmation mot de passe" :value.sync="pass2" @handle-input="input2" :password="true" :isValid="bothPasswordIsSame(pass1, pass2)"/>
        </div>
        <el-row type="flex" justify="end" class="btn-submit">
            <el-button @click="submit" v-loading.fullscreen.lock="loading" :disabled="!allIsGood(email, pass1, pass2)">Valider</el-button>
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
.input-margin {
    margin: 1rem 0 1rem 0;
}

.content-step-register {
    padding-top: 1rem;
}
@media screen and (min-width: 800px) {
    .content-step-register {
        max-width: 600px;
        margin: auto
    }
}
</style>

<style scoped>
.content-grid {
  display: grid; 
  grid-template-columns: 1fr 2fr 1fr 2fr; 
  grid-template-rows: 1fr 1fr auto 1fr 1fr 1fr; 
  gap: 0 1rem; 
  grid-template-areas: 
    "label-name input-name label-user input-user"
    "label-email input-email input-email input-email"
    "label-password label-password label-password label-password"
    "input-pass-1 input-pass-1 input-pass-1 input-pass-1"
    "input-pass-2 input-pass-2 input-pass-2 input-pass-2"
    "btn-submit btn-submit btn-submit btn-submit"; 
}
.label-name { 
    grid-area: label-name; 
    align-self: center;
}
.input-name { 
    grid-area: input-name;
    align-self: center;
}
.label-user { 
    grid-area: label-user;
    align-self: center;
    justify-self: center;
}
.input-user { 
    grid-area: input-user;
    align-self: center;
}
.label-email { 
    grid-area: label-email;
    align-self: center;
}
.input-email { 
    grid-area: input-email;
    align-self: center;
}
.btn-submit {
    grid-area: btn-submit;
    justify-self: right;
}
.label-password { grid-area: label-password; }
.input-pass-1 { grid-area: input-pass-1; }
.input-pass-2 { grid-area: input-pass-2; }
</style>