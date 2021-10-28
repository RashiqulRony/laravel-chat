<template>
    <div>
        <div v-if="auth.id === message.user.id" class="d-flex align-items-center text-right justify-content-end ">
            <div class="pr-2"> <span class="name">Me</span>
                <p class="msg">{{ message.message }}</p>
            </div>
            <div><img :src="'/user.png'" width="30" class="img1" /></div>
        </div>
        <div v-else class="d-flex align-items-center">
            <div class="text-left pr-1"><img :src="'/user.png'" width="30" class="img1" /></div>
            <div class="pr-2 pl-1"> <span class="name">{{ message.user.name }}</span>
                <p class="msg">{{ message.message }}</p>
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
