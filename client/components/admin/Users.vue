<template>
  <div class="users card-admin">
    <List :data="users">
      <template v-slot:pagination>
        <PaginationAdmin />
      </template>
    </List>
  </div>
</template>

<script>
import { computed, useStore } from '@nuxtjs/composition-api'
import { onMounted, ref } from '@vue/composition-api'
import List from './components/List.vue'
import PaginationAdmin from '../shared/paginations/PaginationAdmin.vue'

export default {
  components: {
    List,
    PaginationAdmin,
  },
  setup() {
    const store = useStore()
    const users = computed(() => store.getters['user/data'])

    onMounted(() => {
      if(users.value.length === 0) {
        store.dispatch('user/fetch')
      }
    })

    return {
      users
    }
  }
}
</script>

<style lang="css" scoped>
.table {
  padding: 1rem;
  width: 100%;
}
</style>