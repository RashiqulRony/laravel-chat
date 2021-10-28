<template>
    <div class="row mt-3">
        <div class="col-10">
            <div class="form-group mx-md-12 mb-2">
                <input type="text" v-model="message"
                       @keyup.enter="sendMessage()"
                       class="form-control"
                       placeholder="Say Something...">
            </div>
        </div>

        <div class="col-2">
            <button type="submit" @click="sendMessage()" class="btn btn-primary btn-block mb-2">Send</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['room'],

        data() {
            return {
                message: '',
            }
        },

        mounted() {

        },

        methods: {
            sendMessage() {
                if (this.message === '') {
                    return;
                }

                axios.post('chat/'+this.room.id+'/new-message', {message: this.message})
                    .then((response) => response.data)
                    .then((response) => {
                        this.message = '';
                        this.$emit('messagesend');
                        setTimeout(function () {
                            var element = document.getElementById('messageBox');
                            element.scrollTop = element.scrollHeight;
                        }, 1000)
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
</script>
