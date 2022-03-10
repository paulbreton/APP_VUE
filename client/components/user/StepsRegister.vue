<template>
    <div class="content-step-register">
        <el-row type="flex" justify="center">
            <h1>Inscription</h1>
        </el-row>
        <el-steps :active="active" finish-status="success">
            <el-step title="Étape 1"></el-step>
            <el-step title="Étape 2"></el-step>
            <el-step title="Étape 3"></el-step>
        </el-steps>
        <el-form v-if="active===0">
            <Register @steps="nextStep" :loading="loading"/>
        </el-form>
        <el-form v-if="active===1">
            <Personality />
        </el-form>
        <el-form v-if="active===2">
        <Congratulation /> 
        </el-form>
        <el-form v-if="active===3">
            <Login />
        </el-form>
        <el-button @click="nextStep">Next</el-button>
    </div>
</template>
<script>
import { ref, emit } from '@vue/composition-api'
import Register from './Register.vue'
import Personality from './Personnality.vue'
import Congratulation from './Congratulation.vue'
import Login from './Login.vue'

export default {
    components: {
        Register,
        Personality,
        Congratulation,
        Login,
    },
    props: {
        loading: {
            type: Boolean,
            default: false,
        },
    },
    setup(_,{emit}) {
        const active = ref(0)

        const nextStep = (user) => { 
            emit('newUser', user)
            // active.value ++
        }

        return {
            active,
            nextStep,
        }
    },
}
</script>

<style scoped>
.content-step-register, .is-process {
    color: white !important;
}
.is-process {
    border-color: none !important;
} 
h1 {
    font-weight: 600;
    font-size: 2rem;
    color: white;
    margin-bottom: 2rem;
}
@media screen and (min-width: 800px) {
    .content-step-register {
        max-width: 600px;
        margin: auto
    }
}
</style>

<style>
.el-step__head.is-process {
    border-color: var(--primary) !important;
    color: var(--primary) !important;
}
.el-step__title.is-process {
    color: white;
}
</style>