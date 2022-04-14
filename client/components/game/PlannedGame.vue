<template>
  <div class="planned-game">
    <GameResume :game="game" />
    <GameAction :game="game" />
  </div>  
</template>
<script>
import GameResume from './components/GameResume.vue'
import GameAction from './components/GameAction.vue'
import { computed, useContext } from '@nuxtjs/composition-api'
export default {
  components: {
    GameResume,
    GameAction,
  },
  setup() {
    const { store } = useContext()
       
    const game = computed(() => store.state.game.game)

    return {
      game
    }
  },
}
</script>
