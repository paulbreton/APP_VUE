<template>
    <div class="bg-teal-500 text-white text-md">
        <nav class="container flex justify-between items-center mx-auto py-5">
            <span class="font-semibold text-2xl">Association</span>
            <div class="space-x-2">
                <template v-if="this.$auth.loggedIn">
                    <NuxtLink to="/admin/admin" class="hover:text-teal-200">
                        Admin 
                    </NuxtLink>
                    <NuxtLink to="/dashboard" class="hover:text-teal-200">
                        Dashbord
                    </NuxtLink>
                    <NuxtLink to="index" class="hover:text-teal-200">
                        Accueil
                    </NuxtLink>
                    <a href="#" @click.prevent="logout" class="hover:text-teal-200">LOGOUT</a>
                </template>
                <template v-else>
                    <NuxtLink to="/auth/register" class="hover:text-teal-200">
                        REGISTER
                    </NuxtLink>
                    <NuxtLink :to="`/auth/${device}/login`" class="hover:text-teal-200">
                        LOGIN
                    </NuxtLink>
                </template>
            </div>
        </nav>
    </div>
</template>

<script>
import { isMobile } from 'mobile-device-detect'

    export default {
        data: ()=>({
            device: 'mobile',
        }),
        methods: {
            logout() {
                this.$auth.logout()
            }
        }
    }
</script>
