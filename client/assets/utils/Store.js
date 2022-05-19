export function storePagination (module) {
  
  return {
    statePage: {
      list: null,
    },
    gettersPage: {
      next: (statePage) => statePage.list ? statePage.list.links.next : null,
      prev: (statePage) => statePage.list ? statePage.list.links.prev : null,
      last: (statePage) => statePage.list ? statePage.list.links.last : null,
      first: (statePage) => statePage.list ? statePage.list.links.first : null,
      total: (statePage) => statePage.list ? statePage.list.meta.total : null,
      lastPage: (statePage) => statePage.list ? statePage.list.meta.last_page : null,
      currentPage: (statePage) => statePage.list ? statePage.list.meta.current_page : null,
      data: (statePage) => statePage.list ? statePage.list.data : [],
    },
    mutationsPage: {
      setList (statePage, list) {
        statePage.list = list
      }
    },
    actionsPage: {
      async fetch({ commit }) {
        const list = await this.$axios.get(`api/${module}`)
        commit('setList', list.data)
      }
    }
  }
}