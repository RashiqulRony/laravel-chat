<template>
    <div class="row d-flex flex-row align-items-center p-2 m-0 w-100 navbar">
        <a href="#">
            <img :src="'/user.png'" alt="Profile Photo" id="pic" class="img-fluid rounded-circle mr-2" style="height: 50px;">
        </a>
        <div class="d-flex flex-column">
            <div id="name" class="text-white font-weight-bold">{{ currentUser.name }}</div>
            <div id="details" class="text-white small">{{ currentUser.email }}</div>
        </div>

        <div class="d-flex flex-row align-items-center ml-auto">
            <a href="#"><i class="fas fa-paperclip mx-3 text-white d-none d-md-block"></i></a>
            <a href="#"><i class="fas fa-ellipsis-v mr-2 mx-sm-3 text-white"></i></a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['currentUser'],

        components: {

        },

        data() {
            return {

            }
        },

        mounted() {

        },

        created() {

        },

        watch: {

        },

        methods: {

        }
    }
</script>
