<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chat Component</div>

                <div class="card-body">
                    I'm an example component.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                rooms: []
            }
        },

        mounted() {
            this.getRooms();
        },

        methods: {
            getRooms() {
                axios.get('chat/rooms').then((response) => response.data)
                    .then((response) => {
                        if (response.status === true) {
                            this.rooms = response.data;
                        }

                    }).catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
</script>
