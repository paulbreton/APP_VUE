<template>
  <div class="card">
    <div class="title" v-if="title != ''">{{ title }}</div>
    <List :isEmpty="isEmpty">
      <template v-slot:item> 
        <slot name="item"></slot>         
      </template>
    </List>
    <div class="actions" v-if="!isEmpty">
      <slot name="action"></slot>
    </div>
  </div>
</template>

<script>
import List from '@/components/shared/list/List.vue'
export default {
  components: {
    List,
  },
  props: {
    title: {
      type: String,
      default: () => '',
    },
    isEmpty: {
      type: Boolean,
      default: true,
    }
  },
}
</script>

<style lang="scss" scoped>

.card {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  border-radius: var(--radius-block);
  background-color: var(--background-secondary);
  padding: 0 2rem;

  width: 100%;
  height: 100%;
  min-width: 20rem;
  
  .title {
    text-align: center;
    color: var(--text-primary);
    padding: 1rem 0;
    font-weight: 800;
    font-size: 1.25rem;
  }
  .actions {
    color: var(--text-primary);
    margin: 1rem;
    text-align: right; 
    .el-button {
      background-color: var(--background-secondary);
      border: none;
      outline: none;
      color: var(--text-primary);
    }
    .el-button i,
    button:hover  {
      color: var(--text-secondary);
      outline: none;
    }
  }    
}

</style>