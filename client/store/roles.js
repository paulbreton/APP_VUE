export const state = {
  roles: [],
}

export const getters = {}

export const mutations = {
  setRoles(state, roles) {
    if (!Array.isArray(roles)) {
      throw new Error(`${roles} is not an Array`)
    }

    state.roles = [...roles]
  },
}

export const actions = {
  async fetch({ commit }) {
    const data = await  this.$axios.$get('/api/roles')
    commit('setRoles', data.payload)
  },
}
