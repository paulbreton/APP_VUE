<template>
  <div class="container max-w-6xl mx-auto mt-48 sm:px-6 lg:px-8">
      <div class="flex justify-center items-center bg-teal-200 h-56 test">
          <span class="text-5xl">Planned'Zone</span>
      </div>
  </div>
</template>

<script>
export default {
    middleware: 'guest',
}
</script>

<style lang="scss" scoped>
.test {
    background-color: var(--background);
    color: var(--text-secondary);
}
</style>
