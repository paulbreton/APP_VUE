<template>
   <div class="content-admin padding-content">
        <div class="stat">
            <CardStat />
        </div>
        <div class="list-user">
            <CardTable title="Utilisateur inscrit" :data="users">
                <template>
                    <el-button><span>TdB<font-awesome-icon icon="plus" /></span></el-button>
                </template>
            </CardTable>
        </div>
        <div class="list-planned-game">
            <CardTable title="Parties planifiées" :data="[]"/>
        </div>
        <div class="list-drafts-game">
            <CardTable title="Mes brouillons" :data="[]"/>
        </div>
    </div>
</template>

<script>
import { useStore } from '@nuxtjs/composition-api'
import { defineComponent, onMounted, computed } from '@vue/composition-api'
import CardStat from './components/CardStatique.vue'
import CardTable from './components/CardTable.vue'

export default defineComponent({
    components: {
        CardStat,
        CardTable,
    },
    setup() {
        const store = useStore()

        onMounted(async () => {
            await store.dispatch('user/fetchAllUsers')
        })

        const users = computed(() => store.state.user.users)

        return {
            users,
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
</style>
