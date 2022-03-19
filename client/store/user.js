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
    commit('setUsers', users)
  },
  async delete({ dispatch }, id) {
    await this.$axios.$delete(`api/user/${id}`)
    dispatch('fetchAllUsers')
  },
  async update({ dispatch }, params) {
    await this.$axios.$put(`api/user/${params.userId}`, { 
      'role_id': params.roleId,
     })
    dispatch('fetchAllUsers')
  }
}
