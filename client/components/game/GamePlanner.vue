<template>
  <div class="new-game">
    <el-form :rules="rules" :model="form" ref="formRef" class="form">
      <div class="label-title">Titre</div>      
      <el-form-item class="input-title" prop="title">
        <el-input 
          v-model="form.title" 
          placeholder="Entrez le titre"          
        />
      </el-form-item>
      <div class="label-terrain">Terrain</div>
      <el-form-item prop="terrain" class="select-terrain">
        <el-select v-model="form.terrain" placeholder="Sélectionnez un terrain">
          <el-option v-for="terrain in listeTerrain" :key="terrain.id" :label="terrain.nom" :value="terrain.nom" :value-key="terrain.id"></el-option>
        </el-select>
      </el-form-item>
      <div class="label-organisateur">Organisateur</div>
      <el-form-item prop="orga" class="select-orga">
        <el-select v-model="form.orga" placeholder="Sélectionnez un organisateur">
          <el-option v-for="orga in listeOrga" :key="orga.id" :label="orga.nom" :value="orga.id" :value-key="orga.id"></el-option>
        </el-select>
      </el-form-item>
      <div class="label-datapicker">Date</div>
      <el-form-item prop="date" class="datapicker">
        <el-date-picker type="date" placeholder="Choisissez une date" v-model="form.date"></el-date-picker>
      </el-form-item>
      <div class="label-heure">Heure</div>
      <div class="heure">
        <el-time-picker placeholder="heure" v-model="form.heure" style="width: 100%;"></el-time-picker>
      </div>
      <div class="label-nbPlayers">Nombre de joueur</div>      
      <el-form-item class="input-nbPlayers" prop="nbPlayers">
        <el-input 
          v-model="form.nbPlayers" 
          placeholder="Entrez le nombre de joueur"
          type="number"
          @keypress="handleNbPlayers"
        />
      </el-form-item>
      <div class="label-desc">Description</div>
      <el-form-item prop="desc" class="input-desc">
        <el-input type="textarea" placeholder="Entrez votre description" v-model="form.desc"></el-input>
      </el-form-item>
      <div class="label-scenario">Scénario :</div>
    </el-form>
    <div class="scenarii">
      <div class="card-scenario btn-plus"><font-awesome-icon icon="fa-solid fa-square-plus" /></div>
    </div>
    
    <div class="grp-btn">
      <span>Visibilité: </span>
      <el-switch v-model="form.visibility"></el-switch>
      <el-button class="cancel" @click="resetForm">Annuler</el-button>
      <el-button type="primary" @click="submitForm" class="submit">Confirmer</el-button>
    </div>
  </div>
</template>

<script>
import useForm from './functions/form'
export default {
  components: {},
  setup(_, {refs}) {
    
    const { rules, form, submitForm, resetForm, handleNbPlayers } = useForm(refs)

    const listeTerrain = [
      { id: '1', nom: 'Marais' },
      { id: '2', nom: 'Plouzané' },
      { id: '3', nom: 'Landerneau' },
    ]

    const listeOrga = [
      { id: '1', nom: 'Lele' },
      { id: '2', nom: 'Caca' },
      { id: '3', nom: 'Gaga' },
      { id: '6', nom: 'ADMIN' },
    ]

    return {
      listeTerrain,
      listeOrga,
      handleNbPlayers,
      resetForm,
      submitForm,
      rules,
      form
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
  grid-template-columns: auto auto;
  grid-template-rows: auto;
  grid-auto-columns: 1fr;
  gap: 1rem 1rem;
  grid-auto-flow: row;
  align-items: center;
  grid-template-areas:
    "label-title        input-title"
    "label-terrain      select-terrain" 
    "label-organisateur select-orga"
    "label-datapicker   datapicker"
    "label-heure        heure"
    "label-nbPlayers    input-nbPlayers"
    "label-desc         ."
    "input-desc         input-desc"
    "label-scenario     .";
}

//
// RESPONSIVE
//
@media screen and (min-width: 1024px) {
  .form {  
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr auto auto;
    grid-template-rows: 1fr 1fr 1fr auto auto;
    grid-auto-columns: 1fr;
    gap: 1rem 2rem;
    grid-auto-flow: row;
    align-items: center;
    grid-template-areas:
      "label-title input-title input-title input-title input-title input-title"
      "label-terrain select-terrain label-organisateur select-orga select-orga select-orga"
      "label-datapicker datapicker label-heure heure label-nbPlayers input-nbPlayers"
      "label-desc input-desc input-desc input-desc input-desc input-desc"
      "label-scenario . . . . .";
  }
  .label-organisateur {
    justify-self: center;
  }
  .label-heure {
    justify-self: center;
  }
}

.label-nbPlayers { grid-area: label-nbPlayers;}
.input-nbPlayers { grid-area: input-nbPlayers;}

.select-terrain { grid-area: select-terrain; }

.label-desc { grid-area: label-desc; }

.input-desc { grid-area: input-desc; }

.label-input { grid-area: label-input; }

.input-title { grid-area: input-title; }

.label-organisateur { 
  grid-area: label-organisateur;
}

.label-terrain { grid-area: label-terrain; }

.select-orga { grid-area: select-orga; }

.label-datapicker { grid-area: label-datapicker; }

.datapicker { grid-area: datapicker; }

.label-heure { 
  grid-area: label-heure;
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
