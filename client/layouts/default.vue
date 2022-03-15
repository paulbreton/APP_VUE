<template>
    <div>
        <div :class="{ 'is-auth-page': showNav }"><Nav /></div>
        <div><Nuxt /></div>
        <div :class="{ 'is-auth-page': showNav }"><NavMobile /></div>
    </div>
</template>

<script>
import { ref, useRoute, watch } from '@nuxtjs/composition-api'
import Nav from './components/Nav.vue'
import NavMobile from './components/NavMobile.vue'
    export default {
        components: {
            Nav,
            NavMobile,
        },
        setup() {
            const route = useRoute()
            const showNav = ref(false)
            watch(
                route, 
                () => showNav.value = route.value.path === '/auth/login' || route.value.path === '/auth/register',
                { immediate: true }
            )
            
            return {
                showNav
            }
        }
    }
</script>

<style lang="scss" scoped>
.is-auth-page {
    display: none;
}
</style>