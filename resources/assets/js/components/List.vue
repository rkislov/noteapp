<template>
<div class="card-body">
    <ul class="list-group text-center">
        <div class="component-header">Заметки {{notesLength}}</div>
        <li v-for="(note,index) in notes" class="list-group-item" v-if="notesLength">
            <div class="row">
                <div class="col-sm-7">
                    <span v-if="currentEditingId !== note.id">{{note.title}}</span>
                    <input type="text" v-if="currentEditingId ===note.id && editing"
                           :placeholder="note.title"
                           v-model="editedTitle">
                </div>
                &nbsp;
                <div class="options col-sm-4 text-right">
                    <div class="glyphicon glyphicon-trash" @click="deleteNote(note.id)" title="Удалить"></div>
                    <div class="glyphicon glyphicon-pencil" @click="edit(note.id)" title="Редактировать"
                        v-if="currentEditingId !== note.id"></div>
                    <div class="glyphicon glyphicon-ok" @click="update(note.id , note.title)"
                         v-if="currentEditingId === note.id"></div>
                    <div :class="favouriteClass(note.is_favourite)"
                         @click="toggleFavourite(note.id, note.is_favourite)"
                         :title="favouriteTitle(note.is_favourite)"></div>
                </div>
            </div>
        </li>
        <div v-else>Пока нет не одной заметки</div>
    </ul>

</div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: "List",
        data() {
            return{
                editing: false,
                currentEditingId: 0,
                editedTitle: ''
            }
        },
        mounted() {
            this.$store.dispatch('fetch')
        },
        methods: {
            deleteNote(id){
                this.$store.dispatch('deleteNote', id)
                flash('Заметка удалена')
            },
            edit(id){
                this.editing=true
                this.currentEditingId = id
            },
            update(id, previousTitle){
                this.currentEditingId = 0
                this.$store.dispatch('edit',{id: id, title: this.editedTitle ? this.editedTitle : this.previousTitle})
                this.editing=false
                flash('Заметка отредактированна')
            },
            toggleFavourite(id, is_favourite) {
                this.$store.dispatch('toggleFavourite', id);
                const message = is_favourite ? 'Убрано из избранного' :'Добавили в избранное';
                flash(message);
            },
            favouriteClass(isFavourite) {
                const heartIcon = 'glyphicon glyphicon-heart';
                return isFavourite ? heartIcon : `${heartIcon}-empty`;
            },
            favouriteTitle(isFavourite) {
                return isFavourite ? 'Убрать' : 'Отментить';
            }
        },
        computed: {
            ...mapState(['notes']),
            notesLength(){
                return this.notes.length
            }
        }
    }
</script>

<style scoped>

</style>
