<template>
    <div class="row h-100">
        <div class="col-12 col-sm-4 col-md-3 d-flex flex-column" id="chat-list-area" style="position:relative; height: 100vh">
            <!-- Navbar -->
            <div class="row d-flex flex-row align-items-center p-2 navbar">
                <img :src="'/user.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2"
                     style="height:50px; cursor:pointer;" id="display-pic">
                <div class="text-white font-weight-bold" id="username"> {{ auth.name }}</div>
                <div class="nav-item dropdown ml-auto">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v text-white"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">New Group</a>
                        <a class="dropdown-item" href="#">Archived</a>
                        <a class="dropdown-item" href="#">Starred</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>
                    </div>
                </div>
            </div>
            <!-- Chat List -->
            <ChatList :users="users" v-on:changeuser="setUser($event)"/>
        </div>

        <!-- Message Area -->
        <div id="message-area" class="d-none d-sm-flex flex-column col-12 col-sm-8 col-md-9 p-0 h-100">
            <!-- Current User or Group -->
            <CurrentUser v-if="currentUser.id" :currentUser="currentUser"/>

            <MessageContainer v-if="currentUser.id" v-on:deletechat="getMessages()" :messages="messages" :auth="auth" />

            <InputMessage v-if="currentUser.id" :auth="auth" :currentUser="currentUser" v-on:messagesend="getMessages()"/>
        </div>
    </div>
</template>

<script>
import ChatList from './UserList'
import CurrentUser from './CurrentUser'
import MessageContainer from './MessageContainer'
import InputMessage from './InputMessage'

export default {
    components: {
        ChatList,
        CurrentUser,
        MessageContainer,
        InputMessage,
    },

    data() {
        return {
            users: [],
            chatRooms: [],
            currentRoom: [],
            currentUser: [],
            messages: [],
            auth: '',
        }
    },

    mounted() {

    },

    created() {
        this.getAll();
    },

    watch: {
        currentUser (val, oldVal) {
            if (oldVal.id) {
                this.disconnect(oldVal)
            }
            this.connect()
        }
    },

    methods: {
        connect() {
            if (this.currentUser.id) {
                let vm = this;
                vm.getMessages();
                window.Echo.private("chat.user")
                    .listen('NewChatMessage', e => {
                        vm.getMessages();
                    });
            }
        },

        disconnect(user) {
            window.Echo.leave("chat."+ user.id);
        },

        getAll() {
            axios.get('chat/all').then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.users = response.users;
                        this.chatRooms = response.rooms;
                        this.auth = response.auth;
                        //this.setRoom(response.rooms[0])
                    }

                })
                .catch((error) => {
                    console.log(error);
                });
        },

        setUser(user) {
            this.currentUser = user;
        },

        getMessages() {
            axios.post('chat/messages', {sender_id: this.auth.id, receiver_id: this.currentUser.id}).then((response) => response.data)
                .then((response) => {
                    if (response.status === true) {
                        this.messages = response.data;
                        setTimeout(function () {
                            var element = document.getElementById('messages');
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
