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
    components: {
        ContentAdmin
    }
    
}
</script>
<style lang="css" scoped>
h1 {
    text-align: center;
}
/* .container {
    margin: 3rem 15rem; 
}*/ 
/* .box {
    padding: 1rem;
    margin-bottom: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, .12), 0 0 6px rgba(0, 0, 0, .04)
} */
.group-btn {
    display: flex;
    justify-content: space-around;
}
.btn-admin {
    padding: 4rem;
}
</style>