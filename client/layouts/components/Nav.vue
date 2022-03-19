<template>
    <div class="text-md nav-desktop">
        <nav class="fixed top-0 w-full padding-content flex justify-between items-center py-5">
            <span class="font-semibold text-2xl title">Association</span>
            <div class="space-x-2">
                <template v-if="this.$auth.loggedIn">
                    <NuxtLink to="/admin/admin">
                        Admin 
                    </NuxtLink>
                    <NuxtLink to="/" exact>
                        Accueil
                    </NuxtLink>
                    <a href="#" @click.prevent="logout">Déconnexion</a>
                </template>
                <template v-else>
                    <NuxtLink to="/auth/register">
                        Inscription
                    </NuxtLink>
                    <NuxtLink to="/auth/login">
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
<style lang="scss" scoped>
nav {
    background-color: var(--background-secondary);
}
.nav-desktop {
    padding: 1rem 0;
    color: var(--text-primary);

    a:hover {
        color: var(--text-secondary);
        
    }
    .title {
        color: var(--text-secondary);
    }
}
</style>
