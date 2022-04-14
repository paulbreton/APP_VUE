<template>
  <div class="game-info">
    <div class="title">{{ $dayjs(game.date).format('DD/MM') }} - {{ game.title }}</div>
    <div class="game-info-grid">
      <div class="description">
        <div class="block-info">
          <div class="title-info">description</div>
          <div class="body-info">
            {{ description }}
          </div>
        </div>
      </div>
      <div class="adresse">
        <div class="block-info">
          <div class="title-info">Adresse &amp; organisateur </div>
          <div class="body-info">
            <ul>
              <li><span class="info">Terrain </span>: {{ terrain }}</li>
              <li class="li-margin"><span class="info orga">Organisateur </span>: {{ orgaPseudo }}</li>
              <li><span class="info">Date </span>: {{ $dayjs(date).format('DD/MM') }}</li>
              <li class="li-margin"><span class="info">Heure </span>: pas définie</li>
              <li><span class="info">Nombre de joueurs </span>: {{ player }} / {{ nbPlayers }}</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="scenario">
        <div class="block-info">
          <div class="title-info">Scénario</div>
          <div class="body-info">
            Pas de scénario
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { computed } from '@vue/composition-api'
export default {
  props: {
    game: {
      type: Object,
      required: true
    }
  },
  setup(props) {
    const description = computed(() => props.game.description ? props.game.description: 'Pas de description' )
    const terrain = computed(() => props.game.terrain)
    const date = computed(() => props.game.date)
    const orgaPseudo = computed(() => props.game.organisateur ? props.game.organisateur.pseudo : '')
    const nbPlayers = computed(() => props.game.nb_players)
    const player = computed(() => props.game.users ? props.game.users.length : 0)

    return {
      description,
      terrain,
      orgaPseudo,
      date,
      nbPlayers,
      player
    }
  },
}
</script>
<style lang="scss" scoped>
.game-info {
  background-color: var(--background-secondary);
  border-top-left-radius: var(--radius-block);
  border-top-right-radius: var(--radius-block);
  padding: 1rem;

  .title {
    text-align: center;
    color: var(--text-secondary);
    margin: 1rem 0 2rem 0;
    font-weight: 800;
    font-size: 1.25rem;
  }

  .block-info {
    background-color: var(--background);
    border-radius: var(--radius-block);
    padding: 1rem;
    color: var(--text-primary);
    height: 100%;

    .title-info {
      text-align: center;
      color: var(--text-secondary);
      font-weight: 800;
      margin-bottom: 0.5rem;
    }
    .info {
      text-decoration: underline;
    }
    .li-margin {
      margin-bottom: 0.5rem;
    }

    .body-info {
      display: flex;
      align-items: center;
      justify-content: center;
    }
  }

}
.title {
  text-align: center;
}
.game-info-grid {
  display: grid; 
  grid-auto-columns: 1fr; 
  grid-template-columns: auto ; 
  grid-template-rows: auto auto auto; 
  gap: 1rem; 
  grid-template-areas: 
    "adresse"
    "description"
    "scenario"; 
}
.adresse { grid-area: adresse; }
.description { grid-area: description; }
.scenario { 
  grid-area: scenario;
}

//
// TABLET & desktop
@media screen and (min-width: 1024px) {
  .game-info-grid {
    display: grid;
    grid-auto-columns: 1fr;
    grid-template-columns: auto 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    gap: 1rem;
    grid-template-areas:
      "adresse scenario scenario"
      "description scenario scenario";
  }
}
</style>