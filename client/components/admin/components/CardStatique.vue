<template>
  <div class="card-stat card-admin">
    <div class="content">
      <div class="label">250</div>
      <div class="icon"><font-awesome-icon icon="user-check" /></div>
    </div>
    <div class="content">
      <div class="label">22</div>
      <div class="icon"><font-awesome-icon icon="user-plus" /></div>
    </div>  
    <div class="content">
      <div class="label">1200</div>
      <div class="icon"><font-awesome-icon icon="euro-sign" /></div>
    </div>    
  </div>
</template>
<script>

export default {
  setup() {
    
  },
}
</script>

<style lang="scss" scoped>
.card-stat {
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  flex-wrap: wrap;
  width: 100%;
  background-color: var(--background-secondary);
  color: var(--text-primary);

  .content {
    display: flex;
    align-items: baseline;
    height: 8rem;
    padding: 1rem 2rem;
  }

  .label {
    height: fit-content;
    font-size: 4rem;
    font-weight: 800;
    margin-right: 0.5rem;
  }
  .icon {
    font-size: 1.5rem;
    color: var(--text-secondary);
  }
}
</style>
