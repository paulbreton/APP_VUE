<template>
  <div class="list" v-if="data.length">
    <Item v-for="user in data" :key="user.id" :user="user" />
  </div>
  <div v-else class="no-data">
    Aucune donnée
  </div>
</template>
<script>
import Item from './Item.vue'
export default {
  components: {
    Item,
  },
  props: {
    data: {
      type: Array,
      required: true,
    },
  },
  setup() {
    
  },
}
</script>

<style lang="scss" scoped>
.no-data {
  padding: 2rem;
  text-align: center;
  color: var(--text-secondary);
}
</style>
