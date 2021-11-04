<template>
    <div class="d-flex flex-column" id="messages">
      <div v-if="message.user_id === auth.id" class="align-self-end self p-1 my-1 mx-3 rounded bg-white shadow-sm message-item">
        <div class="options">
          <div class="nav-item dropdown ml-auto">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-angle-down text-muted px-2"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#">Edit</a>
              <a class="dropdown-item" href="#">Delete</a>
            </div>
          </div>
        </div>

        <div class="d-flex flex-row">
          <div class="body m-1 mr-2">{{ message.message }}</div>
          <div class="time ml-auto small text-right flex-shrink-0 align-self-end text-muted" style="width:75px;">
            <!--                        {{ message.created_at }}-->
            {{ message.created_at | moment("h:mm a") }}
            <i class="far fa-check-circle"></i>
          </div>
        </div>
      </div>
      <div v-else class="align-self-start p-1 my-1 mx-3 rounded bg-white shadow-sm message-item">
        <div class="d-flex flex-row">
          <div class="body m-1 mr-2">{{ message.message }}</div>
          <div class="time ml-auto small text-right flex-shrink-0 align-self-end text-muted" style="width:75px;">
            {{ message.created_at | moment("h:mm a") }}
          </div>
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
            chatDelete(chatId) {
                var url = '/chat/'+chatId;
                axios.delete(url)
                    .then((response) => response.data)
                    .then((response) => {
                        if (response.status === true) {
                            this.$emit('deletechat');
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            deleteFile(chatId, fileId) {
                var url = '/chat/'+chatId+'/file/'+fileId;
                axios.delete(url)
                    .then((response) => response.data)
                    .then((response) => {
                        if (response.status === true) {
                            this.$emit('deletechat');
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            getFileSize(fileSizeInBytes) {
                var i = -1;
                var byteUnits = [' kB', ' MB', ' GB', ' TB', 'PB', 'EB', 'ZB', 'YB'];
                do {
                    fileSizeInBytes = fileSizeInBytes / 1024;
                    i++;
                } while (fileSizeInBytes > 1024);

                return Math.max(fileSizeInBytes, 0.1).toFixed(1) + byteUnits[i];
            }
        }
    }
</script>
