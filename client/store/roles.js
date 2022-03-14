export const state = {
  roles: [
    { id: null, label: 'Aucun'},
    { id: 1, label: 'Admin', value: 'ADMIN' },
    { id: 2, label: 'Superadmin', value: 'SUPERADMIN' },
    { id: 3, label: 'Membre', value:'MEMBER' },
    { id: 4, labal: 'Free', value: 'FREE' },
  ],
}

export const getters = {
  getById: (state) => (id) => state.roles.find((role) => role.id === id)
}

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
