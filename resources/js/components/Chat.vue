<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <room-item v-if="currentRoom.id" :rooms="chatRooms" :currentRoom="currentRoom" v-on:roomchanged="setRoom($event)"/>
            <div class="card mt-5">
                <div class="card-header">{{ currentRoom.name }}</div>

                <div class="card-body" style="background-color: #EEEEEE;     min-height: calc(100vh - 300px);">
                    <message-container v-on:deletefile="getMessages()" :messages="messages" :auth="auth" />
                    <input-message :room="currentRoom" v-on:messagesend="getMessages()" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MessageContainer from "./MessageContainer";
    import InputMessage from "./InputMessage";
    import RoomItem from "./RoomItem";

    export default {
        components: {
            MessageContainer,
            InputMessage,
            RoomItem,
        },

        data() {
            return {
                chatRooms: [],
                currentRoom: [],
                messages: [],
                auth: '',
            }
        },

        mounted() {

        },

        created() {
            this.getRooms();
        },

        watch: {
            currentRoom (val, oldVal) {
                if (oldVal.id) {
                    this.disconnect(oldVal)
                }
                this.connect()
            }
        },

        methods: {
            connect() {
                if (this.currentRoom.id) {
                    let vm = this;
                    vm.getMessages();
                    window.Echo.private("chat."+ vm.currentRoom.id)
                    .listen('NewChatMessage', e => {
                        vm.getMessages();
                    });
                }
            },

            disconnect( room ) {
                window.Echo.leave("chat."+ room.id);
            },

            getRooms() {
                axios.get('chat/rooms').then((response) => response.data)
                    .then((response) => {
                        if (response.status === true) {
                            this.chatRooms = response.data;
                            this.auth = response.auth;
                            this.setRoom(response.data[0])
                        }

                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            setRoom(room) {
                this.currentRoom = room;
            },

            getMessages() {
                axios.get('chat/'+this.currentRoom.id+'/messages').then((response) => response.data)
                    .then((response) => {
                        if (response.status === true) {
                            this.messages = response.data;
                            setTimeout(function () {
                                var element = document.getElementById('messageBox');
                                element.scrollTop = element.scrollHeight;
                            }, 1000)
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
</script>
