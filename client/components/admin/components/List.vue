<template>
  <div class="list" v-if="data && data.length" v-loading="!loading">
    <Item v-for="user in data" :key="user.id" :user="user" @open-dialog="openDialog" />
    <Dialog :show="showDialog" :user="userSelected" @close-dialog="closeDialog"/>
    <div class="pagination">
      <slot name="pagination"></slot>
    </div>
  </div>
  <div v-else class="no-data">
    Aucune donnée
  </div>
</template>
<script>
import { computed, ref } from '@vue/composition-api'
import Item from './ItemUsers.vue'
import Dialog from './DialogUpdateRole.vue'
import { useStore } from '@nuxtjs/composition-api'

export default {
  components: {
    Item,
    Dialog,
  },
  props: {
    data: {
      type: Array,
      required: true,
    },
  },
  setup(props) {
    const store = useStore()
    const loading = computed(() => props.data && props.data.length)
    const showDialog = ref(false)

    const userSelected = ref({})

    const openDialog = (user) => {
      showDialog.value = true
      userSelected.value = user
    }
    

    const closeDialog = (params) => {
      if(params) {
        store.dispatch('user/update', params)
      }
      showDialog.value = false
      userSelected.value = {}
    }

    return {
      loading,
      showDialog,
      openDialog,
      closeDialog,
      userSelected,
    }
  }
}
</script>

