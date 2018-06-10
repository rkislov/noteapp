<template>
<div>
    <div class="header-nav">
        <router-link to="/create">Создать</router-link>
        <router-link to="/list">Заметки</router-link>
        <router-link to="/favourite-list">Избранные</router-link>
        <router-view></router-view>
        <flash></flash>
    </div>
    <div class="alert alert-message messageBody"
        id="messageBody"
        style="visibility: hidden;"
    ></div>
</div>
</template>

<script>
    import axios from 'axios'
    import { mapState } from 'vuex'
    import Flash from './Flash'
    export default {
        name: "NoteApp",
        components: {
            flash: Flash
        }
    }
</script>

<style scoped>

</style>
