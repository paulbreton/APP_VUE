<template>
  <div class="">
    <h1>Liste joueurs</h1>
    <Users />
  </div>
</template>
<script>
import Users from '@/components/admin/Users.vue'
export default {
  middleware: 'admin',
  components: {
    Users,
  },
  setup() {
    
  },
}
</script>
<style scoped>
h1 {
    text-align: center;
    font-size: 2rem;
    font-weight: 800;
    padding: 2rem 0;
    color: var(--text-secondary);
}
</style>