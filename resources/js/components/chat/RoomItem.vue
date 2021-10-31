<template>
    <div class="card">
        <div class="card-body">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item" v-for="(room, index) in rooms" :key="index">
                            <a style="cursor: pointer" class="nav-link" @click="selectRoom(room)">{{ room.name }}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['rooms', 'currentRoom'],

        data() {
            return {
                selected: '',
            }
        },

        created() {
            this.selected = this.currentRoom
        },
        mounted() {

        },
        methods: {
            selectRoom(room) {
                this.selected = room;
                this.$emit('roomchanged', room)
            }
        }
    }
</script>
