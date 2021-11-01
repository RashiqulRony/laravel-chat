<template>
    <div>

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
