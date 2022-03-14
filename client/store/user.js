export const state = () => ({
  users: [],
})

export const mutations = {
  setUsers (state, users) {
    state.users = users
  }
}

export const getters = {
  get: (state) => state.user,
}

export const actions = {
  async fetchAllUsers({ commit }) {
    const users = await this.$axios.$get('api/users')
    commit('setUsers', users.users)
  },
}
