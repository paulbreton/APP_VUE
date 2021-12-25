<template>
   <el-tabs tab-position="left">
    <el-tab-pane label="User"> 
        <Users />
    </el-tab-pane>
    <el-tab-pane label="Role">
        <Roles />
    </el-tab-pane>
    <el-tab-pane label="Medias">
        <Medias />
    </el-tab-pane>
  </el-tabs> 
</template>

<script>
import { defineComponent } from '@vue/composition-api'
import Medias from './Medias.vue'
import Users from './Users.vue'
import Roles from './Roles.vue'

export default defineComponent({
    components: {
        Medias,
        Users,
        Roles,
    },
    setup() {
        
    },
})
</script>
