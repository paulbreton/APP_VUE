<template>
  <div class="users card-admin">
    <div class="title">
      Les utilisateurs
    </div>
    <List :data="users"/>
  </div>
</template>

<script>
import { computed, useStore } from '@nuxtjs/composition-api'
import { onMounted, ref } from '@vue/composition-api'
import List from './components/List.vue'

export default {
  components: {
    List,
  },
  setup() {
    const store = useStore()
    const loading = ref(false)
    const users = computed(() => store.state.user.users)

    onMounted(() =>  {
      if(users.value.length === 0){
        store.dispatch('user/fetchAllUsers')
      }
    })

    return {
      users,
      loading,
    }
  }
}
</script>

<style lang="css" scoped>
.titre {
    text-align: center;
}
.table {
  padding: 1rem;
  width: 100%;
}
.users {
  margin-top: 3rem;
}
</style>