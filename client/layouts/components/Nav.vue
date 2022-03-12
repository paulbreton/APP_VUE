<template>
    <div class="bg-teal-500 text-white text-md">
        <nav class="container flex justify-between items-center mx-auto py-5">
            <span class="font-semibold text-2xl">Association</span>
            <div class="space-x-2">
                <template v-if="this.$auth.loggedIn">
                    <NuxtLink to="/admin/admin" class="hover:text-teal-200">
                        Admin 
                    </NuxtLink>
                    <NuxtLink to="/" exact class="hover:text-teal-200">
                        Accueil
                    </NuxtLink>
                    <a href="#" @click.prevent="logout" class="hover:text-teal-200">Déconnexion</a>
                </template>
                <template v-else>
                    <NuxtLink to="/auth/register" class="hover:text-teal-200">
                        Inscription
                    </NuxtLink>
                    <NuxtLink to="/auth/login" class="hover:text-teal-200">
                        Connexion
                    </NuxtLink>
                </template>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        methods: {
            logout() {
                this.$auth.logout()
            }
        }
    }
</script>
