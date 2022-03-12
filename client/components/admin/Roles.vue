<template>
    <div>
        <el-row>
            <el-col :span="24">Les rôles</el-col>
        </el-row>
        <el-table
        :data="roles"
        height="250"
        style="width: 100%"
        v-loading="loading">
            <el-table-column
                prop="label"
                label="Nom"
                width="180">
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
// export default {
//   data:() => ({
//     roles: [],
//     loading: false,
//   }),
//   mounted() {
//     this.getRoles()
//     console.log(this.roles)
//   },
//   methods: {
//     getRoles() {
//       this.loading = true
//       this.$axios.$get('/api/roles')
//         .then((resp) => {
//           this.roles = resp.payload
//           this.loading = false
//         })
//         .catch((err) => {console.log(err)})
//     }
//   }
// }
</script>

<script>
import { defineComponent, ref, useStore, onMounted } from '@nuxtjs/composition-api'

export default defineComponent({
    setup(_, { root }) {
        let loading = false
        const store = useStore()
        onMounted(async () => {
            loading = true
            await store.dispatch('roles/fetch')
            loading = false
        })
        // const roles = store.roles.state
        // console.log(roles)

        return {
            roles: [],
            loading,
        }
    },
})
</script>
