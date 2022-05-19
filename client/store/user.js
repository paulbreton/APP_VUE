import { storePagination } from "~/assets/utils/Store"

let { statePage, gettersPage, mutationsPage, actionsPage } = storePagination('users') 

export const state = () => ({
  ...statePage,
  user: null,
})

export const mutations = {
  ...mutationsPage,
  setUsers (state, users) {
    state.users = users
  },
  setUser (state, user) {
    state.user = user
  }
}

export const getters = {
  ...gettersPage,
  get: (state) => state.user,
}

export const actions = {
  ...actionsPage,
  async fetchUser({ commit }, user) {
    commit('setUser', user)
  },
  async delete({ dispatch }, id) {
    await this.$axios.$delete(`api/user/${id}`)
    dispatch('fetch')
  },
  async update({ dispatch }, params) {
    await this.$axios.$put(`api/user/${params.userId}`, { 
      'role_id': params.roleId,
     })
    dispatch('fetch')
  }
}
