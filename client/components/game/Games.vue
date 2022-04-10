<template>
  <div class="card-admin">
    <List :games="games" />
  </div>  
</template>

<script>
import { onMounted, computed, useStore } from '@nuxtjs/composition-api'
import List from './components/List.vue'
export default {
  components: {
    List,
  },
  setup() {
    const store = useStore()
    const games = computed(() => store.state.game.gamesVisible)

    onMounted(() => store.dispatch('game/fetchVisible'))

    return {
      games,
    }
  },
}
</script>