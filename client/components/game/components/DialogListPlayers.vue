<template>
  <div class="dialog-update-game">
    <el-dialog title="Liste des participants" :visible="show" :show-close="false" :lock-scroll="true">
      <p>Liste :</p>
      <ul class="list">
        <li v-for="player in game.users" :key="player.id">{{ player.pseudo }} ({{ player.role.label }})</li>
      </ul>
      <span slot="footer" class="dialog-footer">
        <el-button @click="cancel">Fermer</el-button>
      </span>
    </el-dialog>
  </div>  
</template>

<script>
import { computed, useStore } from '@nuxtjs/composition-api'
export default {
  props: {
    show: {
      type: Boolean,
      required: true,
    },
  },
  setup(props,{ emit }) {   
    const store = useStore()

    const game = computed(() => store.state.game.game)
    
    const cancel = () => {
      emit('close-dialog')
    }

    return {
      cancel,
      game
    }
  },
}
</script>
<style lang="scss" scoped>
p {
  color: #606266;
  padding-bottom: 1rem;
}
</style>
<style lang="scss">
.dialog-update-game {

  height: 100%;
  .el-dialog {
    background-color: var(--background);
    border-radius: var(--radius-block);

    display: flex;
    flex-direction: column;
    max-height: -webkit-fill-available;

    .el-dialog__title {
      color: var(--text-secondary);
    }

    .el-dialog__body {
      color: var(--text-primary);
      overflow: auto;
      padding: 30px 0 20px 20px;
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
}

</style>