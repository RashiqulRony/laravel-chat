<template>
    <div class="row h-100">
        <div class="col-12 col-sm-5 col-md-4 d-flex flex-column" id="chat-list-area" style="position:relative; height: 100vh">
            <!-- Navbar -->
            <div class="row d-flex flex-row align-items-center p-2 navbar">
                <img :src="'/user.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2"
                     style="height:50px; cursor:pointer;" id="display-pic">
                <div class="text-white font-weight-bold" id="username"> User Name</div>
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
            <ChatList/>
        </div>

        <!-- Message Area -->
        <div id="message-area" class="d-none d-sm-flex flex-column col-12 col-sm-7 col-md-8 p-0 h-100">
            <!-- Current User or Group -->
            <CurrentUser />

            <MessageContainer/>

            <InputMessage/>
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
        return {}
    },

    mounted() {

    },

    created() {

    },

    watch: {},

    methods: {}
}
</script>
