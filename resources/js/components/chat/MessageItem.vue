<template>
    <div>
        <div v-if="auth.id === message.user.id" class="d-flex align-items-center text-right justify-content-end ">
            <div class="pr-2">
                <span class="name">Me</span>
                <template v-if="message.type === 'text'">
                    <p class="msg">{{ message.message }}</p>
<!--                    <p class="msg">
                        <input type="text" class="form-control">
                    </p>-->

                </template>
                <template v-else>
                    <div>
                        <div v-if="message.files.length > 0" v-for="(file, fKey) in message.files"  class="Portfolio">
                            <a target="_blank" :href="file.url">
                                <img class="card-img" :src="file.url">
                            </a>
                            <div class="desc">
                                <small class="text-left float-left">{{ getFileSize(file.size) }}</small>
                                <span class="text-right float-right">
                                    <a class="messageDelete" @click="deleteFile(message.id, file.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <div class="dropdown">
                <img style="cursor: pointer" class="dropdown-toggle img1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" :src="'/user.png'" width="30" />
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a v-if="message.type === 'text'" class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" @click="chatDelete(message.id)">Delete</a>
                </div>
            </div>
        </div>
        <div v-else class="d-flex align-items-center">
            <div class="text-left pr-1"><img :src="'/user.png'" width="30" class="img1" /></div>
            <div class="pr-2 pl-1">
                <span class="name">{{ message.user.name }}</span>
                <template v-if="message.type === 'text'">
                    <p class="msg">{{ message.message }}</p>
                </template>
                <template v-else>
                    <div>
                        <div v-if="message.files.length > 0" v-for="(file, fKey) in message.files"  class="Portfolio">
                            <a target="_blank" :href="file.url">
                                <img class="card-img" :src="file.url">
                            </a>
                            <div class="desc">
                                <small class="text-left float-left">{{ getFileSize(file.size) }}</small>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

    </div>
</template>

<script>

    export default {
        props: ['message', 'auth'],

        data() {
            return {

            }
        },

        mounted() {

        },

        methods: {
            chatDelete(chatId) {
                var url = '/chat/'+chatId;
                axios.delete(url)
                    .then((response) => response.data)
                    .then((response) => {
                        if (response.status === true) {
                            this.$emit('deletechat');
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            deleteFile(chatId, fileId) {
                var url = '/chat/'+chatId+'/file/'+fileId;
                axios.delete(url)
                    .then((response) => response.data)
                    .then((response) => {
                        if (response.status === true) {
                            this.$emit('deletechat');
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            getFileSize(fileSizeInBytes) {
                var i = -1;
                var byteUnits = [' kB', ' MB', ' GB', ' TB', 'PB', 'EB', 'ZB', 'YB'];
                do {
                    fileSizeInBytes = fileSizeInBytes / 1024;
                    i++;
                } while (fileSizeInBytes > 1024);

                return Math.max(fileSizeInBytes, 0.1).toFixed(1) + byteUnits[i];
            }
        }
    }
</script>

<style scoped>
    .name {
        font-size: 10px
    }
    .msg{
        background-color: #fff;
        font-size: 14px;
        padding: 8px;
        border-radius: 5px;
        color: #3e3c3c;
    }
    .img1{
        width: 45px;
        margin: 0 -7px 25px -7px;
    }

    .Portfolio {
        position: relative;
        margin: 5px;
        border: 2px solid #f1f1f1;
        float: left;
        width: 180px;
        transition-duration: 0.4s;
        border-radius: 5px;
        animation: winanim 0.5s ;
        -webkit-backface-visibility:visible;
        backface-visibility:visible;
        box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 5px 8px 0 rgba(0,0,0,.14),0 1px 14px 0 rgba(0,0,0,.12)
    }

    .Portfolio:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
    }

    .Portfolio img {
        width: 100%;
        height: 100px;
        border-radius: 5px

    }

    .desc {
        padding: 5px;
        text-align: center;
        font-size: 90%;
        color:#000;
        opacity: 0.7;
    }

    .messageDelete:hover{
        color: #e1491a;
        transform:scale3d(.3,.3,.3);
        cursor: pointer;
    }

    .actionBtn {
        position: absolute;
        left: 0;
        bottom: 16px;
    }
    @keyframes winanim {
        0%{opacity:0;transform:scale3d(.3,.3,.3)}
        50%{opacity:1}

    }
</style>
