<template>
<div class="note-form">
    <div class="component-header">Создать заментку</div>
    <form @submit.prevent="add">
        <input v-model="title"/>
        <button class="btn btn-info" type="submit">Создать</button>
    </form>
</div>
</template>

<script>
    export default {
        name: "CreateNote",
        data(){
            return{
                title:''
            }
        },
        methods:{
            add() {
                this.$store.dispatch('add', this.title)
                this.$router.push('/list')
                flash('заметка создана', 'success')
            }
        }
    }
</script>

<style scoped>

</style>
