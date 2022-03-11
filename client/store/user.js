export const state = () => ({
  user: null,
})

export const mutations = {
  setUser (state, user) {
    state.user = user
  }
}

export const getters = {
  get: (state) => state.user,
}

export const actions = {}
