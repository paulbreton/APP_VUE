<template>
  <div class="list">
    <slot name="item"></slot>
    <div class="is-empty" v-if="isEmpty">Aucune donnée</div>
  </div>
</template>

<script>
export default {
  props: {
    isEmpty: {
      type: Boolean,
      required: true,
    }
  }
}
</script>

<style lang="scss" scoped>
.is-empty {
  text-align: center;
  color: var(--text-secondary);
  padding: 2rem;
}
</style>