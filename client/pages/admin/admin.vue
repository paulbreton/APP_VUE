<template>
    <div class="container-desktop-admin">
        <h1>Administration</h1>
        <div class="box group-btn">
            <el-button type="primary" class="btn-admin">Parties</el-button>
            <el-button type="primary" class="btn-admin">Mails</el-button>
            <el-button type="primary" class="btn-admin">Finances</el-button>
        </div>
        <div class="box">
            <ContentAdmin />
        </div>
    </div>
</template>

<script>
import ContentAdmin from '../../components/admin/ContentAdmin.vue'

export default {
    middleware: 'auth',
    components: {
        ContentAdmin
    },
}
</script>
<style lang="css" scoped>
h1 {
    text-align: center;
}
.group-btn {
    display: flex;
    justify-content: space-around;
}
</style>