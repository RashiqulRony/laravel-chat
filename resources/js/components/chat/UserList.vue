<template>
    <div id="chat-list" class="row" style="overflow: auto;">
        <div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom">
            <img src="chat-asset/images/0923102932_aPRkoW.jpg" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px;">
            <div class="w-50">
                <div class="name">Programmers</div>
                <div class="small last-message">+91 98232 37261:  yeah, i'm online</div>
            </div>
            <div class="flex-grow-1 text-right">
                <div class="small time">28/03/2018</div>
                <div class="badge badge-success badge-pill small d-none" id="unread-count">2</div>
            </div>
        </div>

        <div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom">
            <img src="chat-asset/images/dsaad212312aGEA12ew.png" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px;">
            <div class="w-50">
                <div class="name">Dee</div>
                <div class="small last-message"><i class="fas fa-check-circle mr-1"></i> if you go to the movie, then give me a call</div>
            </div>
            <div class="flex-grow-1 text-right">
                <div class="small time">27/03/2018</div>
            </div>
        </div>

        
    </div>
</template>

<script>
    export default {
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
