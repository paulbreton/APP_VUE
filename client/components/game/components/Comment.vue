<template>
  <div class="comment" :class="{ 'is-admin-response': authorIsAdmin }">
    <div class="pseudo">{{ comment.author.pseudo }}</div>
    <div class="role">({{ comment.author.role.label.toLowerCase() }})</div>
    <div class="date">{{ date }}</div>
    <div class="content">{{ comment.content }}</div>
  </div>
</template>
<script>
import { computed } from '@vue/composition-api'
import { useContext } from '@nuxtjs/composition-api'
export default {
  props: {
    comment: {
      type: Object
    }
  },
  setup(props) {
    const context = useContext()
    const date = computed(() => props.comment.created_at ? context.$dayjs(props.comment.created_at).format('HH:mm DD/MM') : 'pas de date')

    const authorIsAdmin = computed(() => props.comment.author.role.id > 2)

    return {
      date,
      authorIsAdmin
    }
  }
}
</script>
<style lang="scss" scoped>
.comment {
  width: fit-content;
  max-width: 90%;
  background-color: var(--background-secondary);
  border-radius: var(--radius-block);
  margin: 1rem 0;
  padding: 1rem;
  color: var(--text-primary);

  display: grid;
  grid-template-columns: 3fr auto auto;
  grid-template-rows: auto 1fr;
  grid-auto-columns: 1fr;
  gap: 1rem;
  grid-auto-flow: row;
  grid-template-areas:
    "pseudo role date"
    "content content content";

  &.is-admin-response {
    margin-left: auto;
  }
}

.pseudo {
  grid-area: pseudo;
  color: var(--text-secondary);
  font-weight: 800;
}

.role {
  grid-area: role;
  justify-self: end;
  font-style: italic;
  color: #606266;
}

.date {
  grid-area: date;
  justify-self: end;
  color: #606266;
  font-weight: 800;
}

.content { grid-area: content; }

</style>