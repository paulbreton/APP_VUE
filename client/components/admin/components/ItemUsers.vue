<template>
  <div class="item" @click="openDialog">
    <div class="pseudo">{{ user.pseudo }}</div>
    <div class="role">{{ user.role.label }}</div>
    <div class="action"><el-button type="text" class="delete" @click.stop="deleteUser"><font-awesome-icon icon="trash" /></el-button></div>
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
  setup(props, { emit }) {
    const store = useStore()
    const deleteUser = async () => await store.dispatch('user/delete', props.user.id)

    const openDialog = () => emit('open-dialog', props.user)

    return {
      deleteUser,
      openDialog,
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
  margin-bottom: 1rem;
  padding: 0.5rem;
  grid-template-areas:
    "pseudo role action";
  align-items: center;
  justify-items: center;
  cursor: pointer;
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