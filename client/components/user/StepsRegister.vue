<template>
    <div class="container">
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

<style lang="css" scoped>
/* .container {
    margin: 7rem 20rem;
    padding: 2rem;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, .12), 0 0 6px rgba(0, 0, 0, .04);
    min-width: 500px;
}

@media screen and (max-width: 1000px){
    .container {
        margin: 1rem;
    }
    
} */
</style>