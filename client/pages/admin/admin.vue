<template>
    <div class="container-admin">
        <h1>Administration</h1>
        <Content />
    </div>
</template>

<script>
import Content from '@/components/admin/ContentAdmin.vue'

export default {
    middleware: 'auth',
    components: {
        Content,
    }
}
</script>
<style lang="css" scoped>
h1 {
    text-align: center;
    font-size: 2rem;
    font-weight: 800;
    padding: 2rem 0;
    color: var(--text-secondary);
}
.container-admin {
    display: flex;
    flex-direction: column;
    background-color: var(--background);
}
</style>