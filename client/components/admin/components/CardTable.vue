<template>
  <div class="card-admin">
    <div class="title">{{ title }}</div>
    <div class="list">
      <slot name="list"></slot>
    </div>
    <div class="actions">
      <slot></slot>
    </div>
  </div>
</template>

<script>
import List from './List.vue'
export default {
  components: {
    List,
  },
  props: {
    title: {
      type: String,
      required: true,
    },
    data: {
      type: Array,
      required: true,
    },
  },
}
</script>

<style lang="scss" scoped>
.actions {
  color: var(--text-primary);
  margin: 1rem;
  text-align: right;  
}
</style>