<template>
  <div class="send">
    <Input placeholder="Envoyer une question" :value.sync="comment" @handle-focus="progressOn" @handle-blur="progressOff" @handle-input="handleComment" @keyup.enter="send()"/>
    <font-awesome-icon icon="fa-solid fa-paper-plane" class="icon-send" :class="{ disabled: comment === '' }" @click="send" />
  </div>
</template>
<script>
import Input from '@/components/form/Input'
import { ref } from '@vue/composition-api'
import { useContext, useStore } from '@nuxtjs/composition-api'

export default {
  components: {
    Input
  },
  setup(props) {
    const context = useContext()
    const store = useStore()
    const comment = ref('')
    const handleComment = (value) => {
      comment.value = value
    }

    const send = async () => {
      await store.dispatch('game/postComment', { gameId: store.state.game.game.id, content: comment.value })
      comment.value = ''
    }

    const progressOn = () => {
      console.log('is focus')
    }

    const progressOff = () => {
      console.log('is blur')
    }

    return {
      send,
      comment,
      handleComment,
      progressOn,
      progressOff
    }
  }
}
</script>
<style lang="scss" scoped>
.send {
  margin-top: 2rem;
  display: flex;
  align-items: center;
  .icon-send {
    color: var(--text-secondary);
    padding: 1rem 0 1rem 1rem;
    cursor: pointer;

    &.disabled {
      color: var(--background-secondary);
    }
  }
}
</style>