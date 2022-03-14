<template>
  <div class="item">
    <div class="pseudo">{{ user.pseudo }}</div>
    <div class="role">{{ role(user.role_id) }}</div>
    <div class="action"><el-button type="text" class="delete" @click="deleteUser"><font-awesome-icon icon="trash" /></el-button></div>
  </div>
</template>
<script>
import { useStore } from '@nuxtjs/composition-api'
export default {
  props: {
    user: {
      type: Object,
      required: true, 
    },
  },
  setup({ props }) {
    const store = useStore()
    const role = (id) => (store.getters['roles/getById'](id)).label

    const deleteUser = async () => await store.dispatch('user/delete', props.user)

    return {
      role,
      deleteUser,
    }
  },
}
</script>
<style lang="scss" scoped>
.item {  
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 1fr;
  grid-auto-columns: 1fr;
  gap: 0px 0px;
  grid-auto-flow: row;
  background-color: var(--background);
  color: var(--text-primary);
  border-radius: 5px;
  margin: 1rem;
  padding: 0.5rem;
  grid-template-areas:
    "pseudo role action";
  align-items: center;
  justify-items: center;
}

.pseudo { 
  grid-area: pseudo;  
}

.role { grid-area: role; }

.action { 
  grid-area: action;
  .delete {
    color: var(--negative)
  }
}

</style>