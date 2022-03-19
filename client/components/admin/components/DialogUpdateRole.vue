<template>
  <el-dialog title="Changement de role" :visible="show" :show-close="false">
    <p>Role</p>
    <el-select v-model="newRole" placeholder="Sélectionnez un role">
      <el-option v-for="role in listRoles" :key="role.id" :label="role.label" :value="role.id" :value-key="role.id"></el-option>
    </el-select>
    <span slot="footer" class="dialog-footer">
      <el-button @click="cancel">Annuler</el-button>
      <el-button :disabled="btnDisabled" type="primary" @click="submit">Confirmer</el-button>
    </span>
  </el-dialog>
</template>

<script>
import { computed, ref, watch } from '@vue/composition-api'
import { useStore } from '@nuxtjs/composition-api'
export default {
  props: {
    user: {
      type: Object,
      required: true,
    },
    show: {
      type: Boolean,
      required: true,
    },
  },
  setup(props, { emit }) {
    const store = useStore()
    const newRole = ref(null)
    const listRoles = computed(() => store.state.roles.roles)

    const btnDisabled = computed(() => newRole.value === null || (props.user.role && props.user.role.id === newRole.value))

    const submit = () => {
      emit('close-dialog', { roleId: newRole.value, userId: props.user.id })
      newRole.value = null
    }

    const cancel = () => {
      emit('close-dialog')
      newRole.value = null
    }

    return {
      listRoles,
      newRole,
      submit,
      cancel,
      btnDisabled,
    }
  },
}
</script>

<style lang="scss">
.el-dialog {
  background-color: var(--background);
  border-radius: 1rem;

  .el-dialog__title {
    color: var(--text-secondary);
  }

  .el-button:focus {
    outline: none;
  }
  .el-button--default {
    background-color: var(--background-secondary);
    color: var(--text-primary);
    border: none;
  }
  .el-button--primary {
    background-color: var(--text-secondary);
    border: none;

    &.is-disabled {
      background-color: var(--text-secondary-disabled);
    }
  }
}
</style>