<template>
  <div class="item game" @click="openDialog">
    <div class="date">{{ day }} {{ date}}:</div>
    <div class="status"><div class="badge" :class="{ negative: !isVisible}"></div></div>
    <div class="terrain">{{ game.terrain }}</div>
    <div class="nbPlayer">{{ game.users.length }} / {{ game.nb_players }}</div>
    <div class="organisateur">Organisateur: {{ game.organisateur.pseudo }}</div>
  </div>
</template>
<script>
import { useContext, useRouter } from '@nuxtjs/composition-api'
import { computed } from '@vue/composition-api'
import isToday from 'dayjs/plugin/isToday'
export default {
  props: {
    game: {
      type: Object,
      required: true,
    }
  },
  setup(props, { emit }) {
    const context = useContext()
    const router = useRouter()
    // TODO: utiliser i18n !
    const dayList = [
      'Dimanche',
      'Lundi',
      'Mardi',
      'Mercredi',
      'Jeudi',
      'Vendredi',
      'Samedi'
    ]

    const gameDate = context.$dayjs(props.game.date)
    const date = gameDate.format('DD/MM')

    const day = dayList[gameDate.day()]

    context.$dayjs.extend(isToday)

    // TODO: CRON
    const isPassed = gameDate.isBefore(context.$dayjs())

    const isVisible = computed(() => props.game.visibility)

    const openDialog = () => {
      if (context.route.value.name === 'admin') {
        emit('open-dialog', props.game)
      } else {
        router.push(`${props.game.id}`)
      }
    }
    
    return {
      date,
      day,
      isPassed,
      isVisible,
      openDialog
    }
  }
}
</script>
<style lang="scss" scoped>
.game {
  display: grid;
  grid-template-columns: auto 1fr auto;
  grid-template-rows: 1fr 1fr;
  grid-auto-columns: 1fr;
  gap: 0.5rem 0.5rem;
  grid-auto-flow: row;
  grid-template-areas:
    "date terrain status"
    "organisateur organisateur nbPlayer";
}

.badge {
  width: 3rem;
  height: 1rem;
  background-color: var(--positive);
  border-radius: var(--radius-block);
  margin-left: 0.5rem;

  &.negative {
    background-color: var(--negative);
  }
}

.date { 
  grid-area: date;
  font-weight: 800;
}

.status { 
  grid-area: status;
  display: flex;
  align-items: center;
  justify-content: flex-end;
}

.terrain { grid-area: terrain; }

.nbPlayer { 
  grid-area: nbPlayer;
  text-align: right;
}

.organisateur { grid-area: organisateur; }

</style>