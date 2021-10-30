<template>
    <div class="row mt-3">
        <div class="col-8">
            <div class="form-group mx-md-12 mb-2">
                <input type="text" v-model="message"
                       @keyup.enter="sendMessage()"
                       class="form-control"
                       placeholder="Say Something...">
            </div>
        </div>
        <div class="col-2">
            <form id="chatForm" enctype="multipart/form-data" method="post">
                <label class="file-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                    </svg>
                    Select File
                    <input ref="files" @change="inputFiles($event)" name="images[]" id="image" accept="image/*" multiple="multiple" class="file-input" type="file" size="60" >
                </label>
            </form>
        </div>
        <div class="col-2">
            <button @click="sendMessage()" class="btn btn-primary btn-block mb-2">Send</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['room'],

        data() {
            return {
                message: '',
                files: '',
            }
        },

        mounted() {

        },

        methods: {
            sendMessage() {
                if (this.message === '') {
                    return;
                }
                axios.post('chat/'+this.room.id+'/new-message', {message: this.message, type: 'text'})
                    .then((response) => response.data)
                    .then((response) => {
                        if (response.status === true) {
                            this.message = '';
                            this.$emit('messagesend');
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            inputFiles(e) {
                const _this = this;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let form = document.getElementById('chatForm');
                let formData = new FormData(form);
                formData.append('type', 'file');
                $.ajax({
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    url: 'chat/'+this.room.id+'/new-message',
                    success: function (response) {
                        if (response.status === true){
                            _this.message = '';
                            $("#image").val('');
                            _this.$emit('messagesend');
                        }
                    },
                });
            }
        }
    }
</script>

<style scoped>
.file-label{
    padding: 6px 7px 8px 7px;
    background: #3f9ae5;
    color: #fff;
    border-radius: 5px;
    display: block;
    text-align: center;
}



.file-input{
    display: none;
}
</style>
