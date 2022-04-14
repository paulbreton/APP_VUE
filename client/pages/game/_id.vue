<template>
  <planned-game v-loading.fullscreen.lock="loading" />
</template>
<script>
import PlannedGame from '@/components/game/PlannedGame'
import { onMounted, useContext, computed } from '@nuxtjs/composition-api'
export default {
  components: {
    PlannedGame
  },
  setup() {
    const { params, store } = useContext()
    const game = computed(() => store.state.game.game)
    const loading = computed(() => Object.keys(game.value).length === 0)

    onMounted(async () => await store.dispatch('game/fetchById', params.value.id))

    return {
      loading
    }
  },
}
</script>
