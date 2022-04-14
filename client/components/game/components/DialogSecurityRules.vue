<template>
  <div class="dialog-update-game">
    <el-dialog title="Les consignes de sécurités" :visible="show" :show-close="false">
      <div class="list-rules">
        <div class="rule">
          <p>Distance engagement:</p>
          <div>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
        </div>
        <div class="rule">
          <p>Lunette autorisées:</p>
          <div> unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</div>
        </div>
        <div class="rule">
          <p>Lieu de rendez-vous:</p>
          <div>texte</div>
        </div>
      </div>
      
      <span slot="footer" class="dialog-footer">
        <el-button @click="cancel">Fermer</el-button>
      </span>
    </el-dialog>
  </div>  
</template>

<script>
export default {
  props: {
    show: {
      type: Boolean,
      required: true,
    },
  },
  setup(_,{ emit }) {
    
    const cancel = () => {
      emit('close-dialog')
    }

    return {
      cancel,
    }
  },
}
</script>
<style lang="scss" scoped>
.list-rules {
  display: flex;
  flex-wrap: wrap;
  .rule {
    background-color: var(--background-secondary);
    padding: 2rem;
    border-radius: var(--radius-block);
    margin: 1rem;
    p {
      color: var(--text-secondary);
      white-space: nowrap
    }
  }
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