<template>
    <div id="chat-list" class="row" style="overflow: auto;">
        <div v-for="(user, index) in users" class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" :class="user.id === (selected ? selected.id: 0) ? 'active' : '' " @click="selectUser(user)">
            <img :src="'/user.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px;">
            <div class="w-50">
                <div class="name">{{ user.name }}</div>
                <div class="small last-message">
                    <i class="fas fa-check-circle mr-1"></i>
                    {{ user.email }}
                </div>
            </div>
            <div class="flex-grow-1 text-right">
                <div class="small time">27/03/2018</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['users', 'currentUser'],

        components: {

        },

        data() {
            return {
                selected: ''
            }
        },

        mounted() {

        },

        created() {
            this.selected = this.currentUser
        },

        watch: {

        },

        methods: {
            selectUser(user) {
                this.selected = user;
                this.$emit('changeuser', user)
            }
        }
    }
</script>
