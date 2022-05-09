<template>
  <div class="comment-zone">
    <div class="title">Commentaires</div>
    <div class="list">
      <Comment v-for="comment in comments.data" :key="comment.id" :comment="comment" />
    </div>
    <div class="pagination">
      <div>
        <el-button @click="first" type="text" :disabled="hasPrevious" icon="el-icon-d-arrow-left"></el-button>
        <el-button @click="previous" type="text" :disabled="hasPrevious" icon="el-icon-arrow-left">Précédent</el-button>
      </div>
      <div>{{ currentPage }} / {{ total }}</div>
      <div>
        <el-button @click="next" type="text" :disabled="hasNext">Suivant <i class="el-icon-arrow-right"></i></el-button>
        <el-button @click="last" type="text" :disabled="hasNext" icon="el-icon-d-arrow-right"></el-button>
      </div>
    </div>
  </div>
</template>
<script>
import { computed } from '@vue/composition-api'
import Comment from './Comment.vue'
import { useStore } from '@nuxtjs/composition-api'
export default {
  components: {
    Comment
  },
  props: {
    comments: {
      type: [Object, Array]
    }
  },
  setup(props) {
    const store = useStore()

    const total = computed(() => props.comments.meta ? props.comments.meta.last_page : 0)
    const currentPage = computed(() => props.comments.meta ? props.comments.meta.current_page: 0)

    const hasNext = computed(() => props.comments.links && props.comments.links.next ? false : true)
    const hasPrevious = computed(() => props.comments.links && props.comments.links.prev ? false : true)

    const first = () => store.dispatch('game/changePageComments', props.comments.links.first)
    const previous = () => store.dispatch('game/changePageComments', props.comments.links.prev)
    const next = () => store.dispatch('game/changePageComments', props.comments.links.next)
    const last = () => store.dispatch('game/changePageComments', props.comments.links.last)

    return {
      next,
      previous,
      last,
      first,
      hasNext,
      hasPrevious,
      total,
      currentPage
    }
  }
}
</script>
<style lang="scss" scoped>
.comment-zone {
  margin-top: 2rem;
  .title {
    color: var(--text-secondary);
    font-size: 1.5rem;
    font-weight: 800;
    text-align: center;
  }

  .pagination {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    color: var(--text-primary);
    div {
      padding: 0.5rem;
    }
    button {
      color: var(--text-secondary);

      &.is-disabled {
        color: var(--text-primary-disabled);
      }
    }
    button:focus {
      font-weight: 800;
    }
  }
}
</style>