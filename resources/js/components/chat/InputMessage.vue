<template>
    <div class="justify-self-end align-items-center flex-row d-flex" id="input-area">
      <form id="chatFileForm" enctype="multipart/form-data" method="post">
        <label class="file-label">
            <i class="fas fa-paperclip text-muted px-3" style="font-size:1.5rem;"></i>
            <input ref="files"  @change="inputFiles($event)" name="images[]" id="image" accept="image/*" multiple="multiple" class="file-input" type="file" size="60" >
        </label>
      </form>
        <input type="text" v-model="message"
               @keyup.enter="sendMessage()"
               placeholder="Type a message"
               class="flex-grow-1 border-0 px-3 py-2 my-3 rounded shadow-sm">
        <button @click="sendMessage()" class="btn btn-sm btn-info" style="padding: 9px 0;">
            <i class="fas fa-paper-plane text-muted px-3" style="cursor:pointer;"></i>
        </button>
    </div>
</template>

<script>
    export default {
        props: ['currentUser', 'auth'],

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
                var data = {
                    message: this.message,
                    type: 'text',
                    sender_id: this.auth.id,
                    receiver_id: this.currentUser.id,
                }
                axios.post('chat/new-message', data)
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
                let form = document.getElementById('chatFileForm');
                let formData = new FormData(form);
                formData.append('type', 'file');
                formData.append('sender_id', _this.auth.id);
                formData.append('receiver_id', _this.currentUser.id);
                $.ajax({
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    url: 'chat/new-message',
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
    padding: 10px 0 0 5px;
    cursor: pointer;
}
.file-input{
    display: none;
}
</style>
