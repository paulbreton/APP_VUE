<template>
  <div class="list">
    <ItemGame v-for="game in games" :key="game.id" :game="game" @open-dialog="openDialog"/>
    <Dialog :show="showDialog" :game="gameSelected" @close-dialog="closeDialog"/>
    <div v-if="games.length === 0" class="no-data">
      Aucune donnée
    </div>
  </div>
</template>

<script>
import ItemGame from './ItemGame.vue'
import Dialog from './DialogUpdateGame.vue'
import { ref } from '@vue/composition-api'
import { useStore } from '@nuxtjs/composition-api'

export default {
  components: {
    ItemGame,
    Dialog
  },
  props: {
    games: {
      type: Array,
      required: true,
    }
  },
  setup(_, { emit }) {
    const gameSelected = ref({})
    const showDialog = ref(false)

    const openDialog = (game) => {
      showDialog.value = true
      gameSelected.value = game
    }
    
    const closeDialog = (payload) => {
      showDialog.value = false
      if(payload) {
        emit('update', payload)
      }      
    }

    return {
      gameSelected,
      showDialog,
      openDialog,
      closeDialog
    }
  }
}
</script>