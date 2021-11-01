<template>
    <div class="wrapper">
        <div class="main">
            <div id="messageBox" class="px-2 scroll">
                <template v-for="(message, index) in messages">
                    <message-item v-on:deletechat="deleteChat()" :auth="auth" :message="message"/>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    import MessageItem from './MessageItem';

    export default {
        components: {
            MessageItem,
        },

        props: ['messages', 'auth'],

        mounted() {

        },
        methods:{
            deleteChat() {
                this.$emit('deletechat');
            }
        }

    }
</script>

<style scoped>
::-webkit-scrollbar {
    width: 10px
}

::-webkit-scrollbar-track {
    background: #eee
}

::-webkit-scrollbar-thumb {
    background: #888
}

::-webkit-scrollbar-thumb:hover {
    background: #555
}


.scroll {
    overflow-y: auto;
    scroll-behavior: smooth;
    height: calc(100vh - 400px);
}
</style>
