<template>
    <div>
        <div class="d-flex align-items-center text-right justify-content-end ">
            <div class="pr-2"> <span class="name">{{ message.user.name }}</span>
                <p class="msg">{{ message.message }}</p>
            </div>
            <div><img :src="'/user.png'" width="30" class="img1" /></div>
        </div>
<!--        <div class="d-flex align-items-center">
            <div class="text-left pr-1"><img :src="'/user.png'" width="30" class="img1" /></div>
            <div class="pr-2 pl-1"> <span class="name">Sarah Anderson</span>
                <p class="msg">How often should i take this?</p>
            </div>
        </div>-->
    </div>
</template>

<script>
    export default {

        props: ['message'],

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
