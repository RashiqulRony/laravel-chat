<template>
    <div>
        <div v-if="auth.id === message.user.id" class="d-flex align-items-center text-right justify-content-end ">
            <div class="pr-2"> <span class="name">Me</span>
                <template v-if="message.type === 'text'">
                    <p v-if="message.type === 'text'" class="msg">{{ message.message }}</p>
                </template>
                <template v-else>
                    <div class="row justify-content-end">
                        <div v-if="message.files.length > 0" v-for="(file, fKey) in message.files" class="col-2">
                            <img class="img-thumbnail img-fluid" :src="file.url" >
                        </div>
                    </div>
                </template>
            </div>
            <div><img :src="'/user.png'" width="30" class="img1" /></div>
        </div>
        <div v-else class="d-flex align-items-center">
            <div class="text-left pr-1"><img :src="'/user.png'" width="30" class="img1" /></div>
            <div class="pr-2 pl-1">
                <span class="name">{{ message.user.name }}</span>
                <template v-if="message.type === 'text'">
                    <p class="msg">{{ message.message }}</p>
                </template>
                <template v-else>
                    <div class="row">
                        <div v-if="message.files.length > 0" v-for="(file, fKey) in message.files" class="col-2">
                            <img class="img-thumbnail img-fluid" :src="file.url" >
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
</style>
