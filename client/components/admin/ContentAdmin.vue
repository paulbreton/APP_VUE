<template>
  <div class="content-admin padding-content">
		<div class="stat">
			<CardStat />
		</div>
		<div class="list-user">
			<CardTable title="Utilisateur inscrit">
				<template v-slot:list>
					<ListUser :data="users" />
				</template>
				<template>
					<NuxtLink to="/admin/users">
						<el-button icon="el-icon-plus">TdB Utilisateurs</el-button>
					</NuxtLink>
				</template>                
			</CardTable>
		</div>
		<div class="list-planned-game">
			<CardTable title="Parties planifiées">
				<template v-slot:list>
					<ListGame :games="gamesNoDraft" @update="updateGame" />
				</template>
			</CardTable>
		</div>
		<div class="list-drafts-game">
			<CardTable title="Parties caché">
				<template v-slot:list>
					<ListGame :games="gamesMyDraft" @update="updateGame"/>
				</template>
				<template>
					<NuxtLink to="game/new" exact>
						<el-button icon="el-icon-plus">Ajouter</el-button>
					</NuxtLink>
				</template>                
			</CardTable>
		</div>
  </div>
</template>

<script>
import { useStore } from '@nuxtjs/composition-api'
import { defineComponent, onMounted, computed } from '@vue/composition-api'
import CardStat from './components/CardStatique.vue'
import CardTable from './components/CardTable.vue'
import ListUser from './components/List.vue'
import ListGame from '@/components/game/components/List.vue'

import ItemGame from '@/components/game/components/ItemGame.vue'
import CardList from '@/components/shared/cards/CardList.vue'

export default defineComponent({
	components: {
		CardStat,
		CardTable,
		ListUser,
		ListGame,
		CardList,
		ItemGame,
	},
	setup() {
			const store = useStore()

			onMounted(async () => {
				await store.dispatch('user/fetchAllUsers')
				await store.dispatch('roles/fetch')
				await store.dispatch('game/fetchMyDraft',  store.state.auth.user.data.id)
				await store.dispatch('game/fetchGameNoDraft')
			})

			const users = computed(() => store.state.user.users)
			const gamesMyDraft = computed(() => store.state.game.gamesMyDraft)
			const gamesNoDraft = computed(() => store.state.game.gamesNoDraft)

			const updateGame = async (payload) => {
				await store.dispatch('game/updateGame', { game: payload.game, visibility: payload.visibility })
			}

			return {
				users,
				gamesMyDraft,
				gamesNoDraft,
				updateGame
			}
	},
})
</script>

<style lang="scss" scoped>
.content-admin {
    display: grid;
    gap: 2rem;
    grid-auto-flow: row;
}

.stat { grid-area: stat; }

.list-user { grid-area: list-user; }

.list-planned-game { grid-area: list-planned-game; }

.list-drafts-game { grid-area: list-drafts-game; }

.list-drafts-game,
.list-planned-game,
.list-user {
    height: fit-content;
}
</style>
