<template>
  <div class="dialog-update-game">
    <el-dialog title="Changement de visibilité" :visible="show" :show-close="false">
      <div class="d-body">
        <div>{{ game.title }}</div>
        <el-switch v-model="visibility"></el-switch>
      </div>
      <span slot="footer" class="dialog-footer">
        <el-button @click="cancel">Annuler</el-button>
        <el-button type="primary" @click="submit">Confirmer</el-button>
      </span>
    </el-dialog>
  </div>  
</template>

<script>
import { ref, watch } from '@vue/composition-api'
export default {
  props: {
    game: {
      type: Object,
      required: true,
    },
    show: {
      type: Boolean,
      required: true,
    },
  },
  setup(props,{ emit }) {
    const visibility = ref(false)

    watch(
      () => props.game,
      () => visibility.value = props.game.visibility === 1,
      { immediate: true }
    )
    
    const submit = () => {
      emit('close-dialog', { game: props.game, visibility: visibility.value ? 1 : 0 })      
    }

    const cancel = () => {
      emit('close-dialog')
    }

    return {
      submit,
      cancel,
      visibility
    }
  },
}
</script>
<style lang="scss" scoped>
.d-body {
  display: flex;
  justify-content: space-between;
}
</style>
<style lang="scss">
.dialog-update-game {
  .el-dialog {
    background-color: var(--background);
    border-radius: var(--radius-block);

    .el-dialog__title {
      color: var(--text-secondary);
    }

    .el-dialog__body {
      color: var(--text-primary);
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

  .el-switch__core {
    background-color: var(--background-secondary);
    border-color: var(--background-secondary);
  }
  .el-switch.is-checked .el-switch__core {
    background-color: var(--text-secondary);
    border-color: var(--text-secondary);
  }
}

</style>