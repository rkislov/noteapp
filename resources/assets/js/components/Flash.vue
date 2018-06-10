<template>
<transition name="fade">
    <div class="alert alert-flash"
         :class="'alert-' + type"
         role="alert"
         v-if="show"
         v-text="messageBoby"></div>
</transition>
</template>

<script>
    export default {
        name: "Flash",
        data () {
            return {
                messageBoby: '',
                show: false,
                type: ''
            }
        },
        created(){
            window.events.$on('flash', (messageBoby, type) =>{
                this.messageBoby = messageBoby
                this.type = type
                this.show = true
                setTimeout(() =>{
                    this.show =false
                }, 1000)
            })
        }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>
