<template>
  <div class="list">
    <ItemGame v-for="game in games" :key="game.id" :game="game"/>
  </div>
</template>

<script>
import ItemGame from './ItemGame.vue'

export default {
  components: {
    ItemGame,
  },
  props: {
    games: {
      type: Array,
      required: true,
    }
  }
}
</script>