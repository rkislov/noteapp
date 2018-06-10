import Vue from 'vue'
import VueRouter from 'vue-router'
import NoteApp from './components/NoteApp'
import routes from './routes'
import notesStore from './store/noteStore'

Vue.use(VueRouter)

const router = new VueRouter({
    routes
})

window.events = new Vue()

window.flash = function (message, type='success') {
    window.events.$emit('flash', message, type)
}

new Vue({
    el: '#app',
    render: h => h(NoteApp),
    router,
    store: notesStore
})
