<template>
    <div class="content-step-register">
        <el-row type="flex" justify="center">
            <h1>Inscription</h1>
        </el-row>

        <Register @steps="nextStep" :loading="loading"/>
    </div>
</template>
<script>
import { ref, emit } from '@vue/composition-api'
import Register from './Register.vue'

export default {
    components: {
        Register,
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
    color: var(--text-secondary);
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