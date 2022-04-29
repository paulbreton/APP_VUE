<template>
  <div class="comment-zone">
    <div class="title">Question ?</div>
    <div class="list">
      <Comment v-for="comment in comments" :key="comment.id" :comment="comment" />
    </div>
  </div>
</template>
<script>
import Comment from './Comment.vue'
export default {
  components: {
    Comment
  },
  props: {
    comments: {
      type: Array
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
}
</style>