<template>
  <div v-if="total" class="pagination">
    <el-button :disabled="prev === null" @click="switchPageWithUrl(prev)" type="text" icon="el-icon-arrow-left"></el-button>
    <div class="number-page">
      <div @click="switchPageWithPage(numPage)" v-for="(numPage, index) in tabPage" :key="index" class="btn-page" :class="{ 'is-selected': numPage === currentPage }">{{ numPage }}</div>
    </div>
    <el-button :disabled="next === null" @click="switchPageWithUrl(next)" type="text" icon="el-icon-arrow-right"></el-button>
  </div>
</template>
<script>
import { useStore, computed, watch, ref } from '@nuxtjs/composition-api'
import { pagination } from './functions/Pagination'
export default {
  props: {
    module: {
      type: String,
      require: true
    },
  },
  setup(props) {
    const store = useStore()
    const state = computed(() => store.state.user.list)
    const next = computed(() => store.getters[`${props.module}/next`])
    const prev = computed(() =>store.getters[`${props.module}/prev`])
    const last = computed(() => store.getters[`${props.module}/last`])
    const lastPage = computed(() => store.getters[`${props.module}/lastPage`])
    const total = computed(() => store.getters[`${props.module}/total`])
    const currentPage = computed(() => store.getters[`${props.module}/currentPage`])

    const { threePtsEnd, threePtsStart, test } = pagination('user')

    const switchPageWithUrl = async (url) => await store.dispatch(`${props.module}/switchByUrl`, url)
    const switchPageWithPage = async (page) => page === '...' ? null : await store.dispatch(`${props.module}/switchByPage`, page)
    const tabPage = ref(test())
    watch(
      () => currentPage.value,
      () => tabPage.value = test()
    )
    
    return {
      next,
      prev,
      last,
      lastPage,
      total,
      currentPage,
      switchPageWithUrl,
      switchPageWithPage,

      threePtsEnd,
      threePtsStart,
      tabPage
    }
  }
}
</script>
<style lang="scss" scoped>
.pagination {
  display: flex;
  justify-content: space-evenly;
  width: 40rem;
  color: var(--text-primary);

  .number-page {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .btn-page {
    padding: 0.25rem 0.5rem;
    cursor: pointer;

    &.is-selected {
      border-radius: var(--radius-block);
      background-color: var(--text-secondary);
      color: var(--background);
      font-weight: 800;
    }
  } 
}
</style>