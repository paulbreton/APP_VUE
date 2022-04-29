<template>
  <div class="planned-game">
    <div class="game">
      <GameResume :game="game" />
      <GameAction :game="game" />
    </div>
    <div class="comments">
      <GameComments :comments="[]" />
    </div>
    <SendComment />
  </div>
</template>
<script>
import GameResume from './components/GameResume.vue'
import GameAction from './components/GameAction.vue'
import GameComments from './components/GameComments.vue'
import SendComment from './components/SendComment.vue'
import { computed, useContext } from '@nuxtjs/composition-api'
export default {
  components: {
    GameResume,
    GameAction,
    GameComments,
    SendComment
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
