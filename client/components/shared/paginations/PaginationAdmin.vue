<template>
  <div class="pagination" v-if="hasComments">
    <div>
      <el-button @click="first" type="text" :disabled="hasPrevious" icon="el-icon-d-arrow-left"></el-button>
      <el-button @click="previous" type="text" :disabled="hasPrevious" icon="el-icon-arrow-left">Précédent</el-button>
    
      <div v-show="showPage">{{ currentPage }} / {{ total }}</div>
    
      <el-button @click="next" type="text" :disabled="hasNext">Suivant <i class="el-icon-arrow-right"></i></el-button>
      <el-button @click="last" type="text" :disabled="hasNext" icon="el-icon-d-arrow-right"></el-button>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    pagination: {
      type: Object,
      require: true
    },
    showPage: {
      type: Boolean,
      require: false,
      default: false
    }
  },
  setup(props) {

    return {
      hasNext: false,
      hasPrevious: false,
      hasComments: false,
      total: 0,
      currentPage: 0
    }
  }
}
</script>