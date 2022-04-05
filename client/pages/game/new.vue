<template>
  <div class="container-page padding-content">
      <h1>Nouvelle partie</h1>
      <GamePlanner />
  </div>
</template>

<script>
import GamePlanner from '@/components/game/GamePlanner'
export default {
  components: {
    GamePlanner
  },
  setup() {
    
  },
}
</script>
<style lang="scss" scoped>
.container-page {
  margin-top: 3rem;
}
h1 {
    text-align: center;
    font-size: 2rem;
    font-weight: 800;
    padding: 2rem 0;
    color: var(--text-secondary);
}
</style>