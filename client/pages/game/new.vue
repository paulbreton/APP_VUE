<template>
  <div class="container-page padding-content">
    <h1>Nouvelle partie</h1>
    <GamePlanner />
  </div>
</template>

<script>
import GamePlanner from '@/components/game/GamePlanner'
export default {
  middleware: 'admin',
  components: {
    GamePlanner
  }
}
</script>
<style lang="scss" scoped>
h1 {
  text-align: center;
  font-size: 2rem;
  font-weight: 800;
  padding: 2rem 0;
  color: var(--text-secondary);
}
</style>