<template>
  <div class="action">
    <div class="participate btn" @click="iParticipate">{{ messageBtnParticipe }}</div>
    <div class="list-player btn">Liste des joueurs</div>
    <div class="security-rule btn">Règle de sécurité</div>
  </div>
</template>
<script>
import { computed, useStore } from '@nuxtjs/composition-api'
import { error, success, commonError } from '@/assets/utils/Notification'
export default {
  props: {
    game: {
      type: Object,
      required: true
    }
  },
  setup(props) {
    const store = useStore()

    const userId = store.state.auth.user.data.id

    const registerInGame = computed(() => props.game.users ? props.game.users.map((player) => player.id).includes(userId):false)

    const messageBtnParticipe = computed(() => registerInGame.value ? 'Je ne participe plus !' : 'Je participe !')

    const iParticipate = async () => {
      if(registerInGame.value) {
        try {
          await store.dispatch('game/quiteGame', {gameId: props.game.id, userId: userId })
          success('Desinscription à la partie confirmée')
        } catch (e) {     
          commonError()
        }
      } else {
        try {
          await store.dispatch('game/participateGame', {gameId: props.game.id, userId: userId })
          success('Inscription à la partie confirmée')
        } catch (e) {
          if(e.response.data.message === 'Game is full') {
            error('La partie est complète !')
          } else {
            commonError()
          }          
        }
      }
    }

    return {
      iParticipate,
      registerInGame,
      messageBtnParticipe,
    }
  }
}
</script>
<style lang="scss" scoped>
.action {
  display: flex;
  background-color: var(--background-secondary);
  color: var(--text-primary);
  border-bottom-left-radius: var(--radius-block);
  border-bottom-right-radius: var(--radius-block);
  border: 1px solid var(--background-secondary);

  .btn {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 4rem;
    cursor: pointer;

    &:hover {
      color: var(--text-secondary);
    }
  }
}
</style>