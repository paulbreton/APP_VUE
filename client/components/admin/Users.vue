<template>
  <div>
    <el-row>
      <el-col :span="24"><h3 class="titre">Les utilisateurs</h3></el-col>
    </el-row>
    <el-table
      :data="users"
      height="250"
      style="width: 100%"
      v-loading="loading">
      <el-table-column
        prop="name"
        label="Nom"
        width="180">
      </el-table-column>
      <el-table-column
        prop="username"
        label="Username"
        width="180">
      </el-table-column>
      <el-table-column
        prop="email"
        label="Email">
      </el-table-column>
    </el-table>
  </div>
</template>

<script>

export default {
  data:() => ({
    users: [],
    loading: false,
  }),
  mounted() {
    this.getUsers()
  },
  methods: {
    getUsers() {
      this.loading = true
      this.$axios.$get('/api/users')
        .then((resp) => {
          this.users = resp.users
          this.loading = false
        })
        .catch((err) => {console.log(err)})
    }
  }
}
</script>

<style lang="css" scoped>
.titre {
    text-align: center;
}
</style>