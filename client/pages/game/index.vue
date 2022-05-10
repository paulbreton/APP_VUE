<template>
  <div class="container-admin padding-content">
    <h1>Liste des Parties</h1>
    <Games />
  </div>
</template>
<script>
import Games from '@/components/game/Games.vue'
export default {
  components: {
    Games,
  },  
}
</script>
<style lang="css" scoped>
h1 {
  text-align: center;
  font-size: 2rem;
  font-weight: 800;
  padding: 2rem 0;
  color: var(--text-secondary);
}
.container-admin {
  margin-top: 3rem;
  display: flex;
  flex-direction: column;
  background-color: var(--background);
}
</style>