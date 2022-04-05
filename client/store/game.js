export const state = {
  games: [],
}

export const mutations = {
  setGames(state, games) {
    state.games = [...games]
  },
}

export const actions = {
  async fetch({ commit }) {
    const game = await  this.$axios.$get('/api/game')
    commit('setGames', game.payload)
  },
}
