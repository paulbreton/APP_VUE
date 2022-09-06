import { useStore, computed } from '@nuxtjs/composition-api'

export function pagination(module) {
  const store = useStore()
  // 1    2   3   4   5   6   7

  // 1    2   3   4   5   ... 20

  // 1    ... 5   6   7   ...   10

  // 1    ... 3   4   5   6   7   8

  

  const threePtsEnd = computed(() => (store.getters[`${module}/lastPage`] - store.getters[`${module}/currentPage`]) >= 4)
  const threePtsStart = computed(() => store.getters[`${module}/currentPage`] >= 4 )
  const maxSize = computed(() => store.getters[`${module}/lastPage`] > 7)

  const test = () => {
    const current = computed(() => store.getters[`${module}/currentPage`])
    const first = computed(() => store.getters[`${module}/firstPage`])
    const last = computed(() => store.getters[`${module}/lastPage`])
    
    let tab=[]

    if(!maxSize.value) {
      for(let i=1; i<last.value; i++) {
        tab.push(i)
      }
    }    
    if(threePtsEnd.value && threePtsStart.value && maxSize.value) {
      tab.push('...', current.value - 1, current.value, current.value + 1, '...')
    } else if (threePtsEnd.value) {
      
      tab.push('...')
    } 
    
    
    if (threePtsStart.value) {
      tab.push('...', last.value - 4, last.value - 3, last.value - 2, last.value - 1)
    }
    
    if(last.value > 1) tab.push(last.value)

    console.log(tab)

    return tab
  }
  return {
    threePtsEnd,
    threePtsStart,
    test
  }
  
}