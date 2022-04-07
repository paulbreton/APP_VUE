<template>
  <div class="padding-content">
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