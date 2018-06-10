<template>
<div>
    <ul class="list-group text-center">
        <div class="component-header">Избранные заметки ({{favouriteCount}})</div>
        <div v-if="favouriteCount">
            <li v-for="(note, index) in favouriteNotes" class="list-group-item">
                <span>{{note.title}}</span>
            </li>
        </div>
    </ul>
</div>
</template>


<script>
    import { mapState } from 'vuex'

    export default {
        name: "FavouriteList",
        mounted(){
            this.fetchFavourites()
        },
        computed: {
            ...mapState([
                'favouriteNotes'
            ]),

            favouriteCount(){
                return this.favouriteNotes.length
            }
        },
        methods: {
            fetchFavourites() {
                this.$store.dispatch('fetchFavourites')
            }
        }

    }
</script>

<style scoped>

</style>
