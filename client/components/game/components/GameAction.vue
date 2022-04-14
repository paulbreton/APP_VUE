<template>
  <div class="action">
    <div class="participate btn" @click="iParticipate">{{ messageBtnParticipe }}</div>
    <div class="list-player btn" @click="openList">Liste des joueurs</div>
    <div class="security-rule btn" @click="openRules">Règle de sécurité</div>
    <DialogListPlayers :show="showList" @close-dialog="closeList"/>
    <DialogSecurityRules :show="showRules" @close-dialog="closeRules"/>
  </div>
</template>
<script>
import { computed, useStore, ref } from '@nuxtjs/composition-api'
import DialogListPlayers from './DialogListPlayers.vue'
import DialogSecurityRules from './DialogSecurityRules.vue'
import { error, success, commonError } from '@/assets/utils/Notification'
export default {
  components: {
    DialogListPlayers,
    DialogSecurityRules
  },
  props: {
    game: {
      type: Object,
      required: true
    }
  },
  setup(props) {
    const store = useStore()

    const showList = ref(false)
    const showRules = ref(false)

    const userId = computed(() => store.state.auth.user ? store.state.auth.user.data.id: -1)

    const registerInGame = computed(() => props.game.users ? props.game.users.map((player) => player.id).includes(userId.value):false)

    const messageBtnParticipe = computed(() => registerInGame.value ? 'Je ne participe plus !' : 'Je participe !')

    const iParticipate = async () => {
      if(registerInGame.value) {
        try {
          await store.dispatch('game/quiteGame', {gameId: props.game.id, userId: userId.value })
          success('Desinscription à la partie confirmée')
        } catch (e) {     
          commonError()
        }
      } else {
        try {
          await store.dispatch('game/participateGame', {gameId: props.game.id, userId: userId.value })
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

    const openList = () => showList.value = true
    const closeList = () => showList.value = false
    
    const openRules = () => showRules.value = true
    const closeRules = () => showRules.value = false

    return {
      iParticipate,
      registerInGame,
      messageBtnParticipe,
      openList,
      closeList,
      showList,
      openRules,
      closeRules,
      showRules,
      userId
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