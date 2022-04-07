<template>
  <div class="new-game">
    <div class="form">
      <div class="label-title">Titre</div>
      <div class="input-title">
        <el-input v-model="title" placeholder="Entrez le titre"></el-input>
      </div>
      <div class="label-terrain">Terrain</div>
      <div class="select-terrain">
        <el-select v-model="terrain" placeholder="Sélectionnez un terrain">
          <el-option v-for="terrain in listeTerrain" :key="terrain.id" :label="terrain.nom" :value="terrain.nom" :value-key="terrain.id"></el-option>
        </el-select>
      </div>
      <div class="label-organisateur">Organisateur</div>
      <div class="select-orga">
        <el-select v-model="orga" placeholder="Sélectionnez un organisateur">
          <el-option v-for="orga in listeOrga" :key="orga.id" :label="orga.nom" :value="orga.id" :value-key="orga.id"></el-option>
        </el-select>
      </div>
      <div class="label-datapicker">Date</div>
      <div class="datapicker">
        <el-date-picker type="date" placeholder="Choisissez une date" v-model="date"></el-date-picker>
      </div>
      <div class="label-heure">Heure</div>
      <div class="heure">
        <el-time-picker placeholder="heure" v-model="heure" style="width: 100%;"></el-time-picker>
      </div>
      <div class="label-desc">Description</div>
      <div class="input-desc">
        <el-input type="textarea" placeholder="Entrez votre description" v-model="desc"></el-input>
      </div>
      <div class="label-scenario">Scénario :</div>
    </div>
    <div class="scenarii">
      <div class="card-scenario btn-plus"><font-awesome-icon icon="fa-solid fa-square-plus" /></div>
    </div>
    <div class="grp-btn">
      <el-button class="cancel" @click="reset">Annuler</el-button>
      <el-button type="primary" @click="submit" class="submit">Confirmer</el-button>
    </div>
  </div>  
</template>

<script>
import { ref } from '@vue/composition-api'
import { useContext, useRouter } from '@nuxtjs/composition-api'
export default {
  components: {},
  setup() {
    const router = useRouter()
    const context = useContext()
    const desc = ref('')
    const heure = ref('')
    const date = ref('')
    const title = ref('')

    const listeTerrain = [
      { id: '1', nom: 'Mairais' },
      { id: '2', nom: 'Plouzané' },
      { id: '3', nom: 'Landerneau' },
    ]

    const listeOrga = [
      { id: '1', nom: 'Lele' },
      { id: '2', nom: 'Caca' },
      { id: '3', nom: 'Gaga' },
      { id: '6', nom: 'ADMIN' },
    ]
    const terrain = ref('')
    const orga = ref('')

    const reset = () => {
      router.push('/admin')
    }

    const submit = () => {
      const newGame = {
        title: title.value,
        description: desc.value,
        date: context.$dayjs(date.value).format('YYYY-MM-DD'),
        terrain: terrain.value,
        organisateur: orga.value,
        draft: 1,
        visibility: 0,
        nb_players: 50
      }
      context.store.dispatch('game/storeGame', newGame)
      router.push('/admin')
      
    }

    return {
      terrain,
      listeTerrain,
      orga,
      listeOrga,
      desc,
      reset,
      submit,
      heure,
      date,
      title
    }
  },
}
</script>
<style lang="scss" scoped>
.new-game {
  background-color: var(--background-secondary);
  border-radius: var(--radius-block);
  padding: 1rem;
  color: var(--text-primary);
}
.grp-btn {
  text-align: right;
  .cancel {
    background-color: var(--background);
  }
  .submit {
    background-color: var(--text-secondary);
  }
}

.scenarii {
  margin-top: 1rem;
}

.card-scenario {
  background-color: var(--background);
  width: 10rem;
  height: 10rem;
  border-radius: var(--radius-block);
}

.btn-plus {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  color: var(--text);
  cursor: pointer;
}

.form {  
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-template-rows: 1fr 1fr 1fr auto auto;
  grid-auto-columns: 1fr;
  gap: 1rem 2rem;
  grid-auto-flow: row;
  align-items: center;
  grid-template-areas:
    "label-title input-title input-title input-title"
    "label-terrain select-terrain label-organisateur select-orga"
    "label-datapicker datapicker label-heure heure"
    "label-desc input-desc input-desc input-desc"
    "label-scenario . . .";
}

.select-terrain { grid-area: select-terrain; }

.label-desc { grid-area: label-desc; }

.input-desc { grid-area: input-desc; }

.label-input { grid-area: label-input; }

.input-title { grid-area: input-title; }

.label-organisateur { 
  grid-area: label-organisateur; 
  justify-self: center;
}

.label-terrain { grid-area: label-terrain; }

.select-orga { grid-area: select-orga; }

.label-datapicker { grid-area: label-datapicker; }

.datapicker { grid-area: datapicker; }

.label-heure { 
  grid-area: label-heure;
  justify-self: center;
}

.heure { grid-area: heure; }

.label-scenario { grid-area: label-scenario; }

</style>

<style lang="scss">
.new-game {
  .el-select {
    width: 100%;
  }
  .el-input {
    .el-input__inner {
      background-color: var(--background);
      width: 100%;
    }
  }

  .el-textarea__inner:focus {
    border-color: white;
  }
}
</style>
