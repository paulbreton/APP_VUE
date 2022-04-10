import { ref } from '@vue/composition-api'
import { useContext, useRouter } from '@nuxtjs/composition-api'
import { error, success, commonError } from '@/assets/utils/Notification'

export function useForm(refs) {

  const context = useContext()
  const router = useRouter()

  const rules = ref({
    title: [
      {required: true, message: 'le titre est requis',  trigger: 'change'}
    ],
    terrain: [
      {required: true, message: 'le terrain est requis',  trigger: 'change'}
    ],
    orga: [
      {required: true, message: 'l\'organisateur est requis',  trigger: 'change'}
    ],
    date: [
      {required: true, message: 'la date est requise',  trigger: 'change'}
    ],
    nbPlayers: [
      { required: true, message: 'le nombre de joueurs est requis', trigger: 'change'},
    ]
  })

  const handleNbPlayers = (event) => {
    console.log(event)
  }

  const form = ref({
    desc: null,
    title: null,
    heure: null,
    date: null,
    visibility: 0,
    terrain: null,
    orga: null,
    nbPlayers: 0
  })

  const resetForm = () => refs.formRef.resetFields()

  const submitForm = () => {
    refs.formRef.validate(async (valid) => {
      if (valid) {
        const newGame = {
          title: form.value.title,
          description: form.value.desc,
          date: context.$dayjs(form.value.date).format('YYYY-MM-DD'),
          terrain: form.value.terrain,
          organisateur: form.value.orga,
          visibility: form.value.visibility ? 1: 0,
          nb_players: form.value.nbPlayers
        }
        try {
          await context.store.dispatch('game/storeGame', newGame)
          router.push('/admin')
          success('Nouvelle partie créée')
        } catch (e) {
          if(e.response.data.message === 'Date already use') {
            error('Une partie est déjà programmé à cette date')
          } else if(e.response.data.errors?.date) {
            error('La date est invalide')
          } else {
            commonError()
          }
        }        
      } else {
        return false;
      }
    })
  }

  return {
    rules,
    form,
    resetForm,
    submitForm,
    handleNbPlayers
  }
}