<template>
    <div>
        <div :class="{ 'is-auth-page': showNav }"><Nav /></div>
        <div class="content"><Nuxt /></div>
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

//
// MOBILE
//
.content {
    padding: var(--padding-content-mobile);
    margin-bottom: 5rem;
}

//
// TABLET
//
@media screen and (min-width: 1024px) {
    .content {
        padding: var(--padding-content-tablet);
        margin-top: 4rem;
    }
}

//
// DESKTOP
//
@media screen and (min-width: 1280px) {
    .content {
        padding: var(--padding-content-desktop);
        margin-top: 4rem;
    }
}
</style>