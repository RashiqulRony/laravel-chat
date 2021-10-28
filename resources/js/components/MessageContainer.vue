<template>
    <div class="wrapper">
        <div class="main">
            <div class="px-2 scroll">
                <template v-for="(message, index) in messages">
                    <message-item :message="message"/>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    import MessageItem from './MessageItem';

    export default {
        components: {
            MessageItem,
        },

        props: ['messages'],

        mounted() {

        }
    }
</script>

<style scoped>
::-webkit-scrollbar {
    width: 10px
}

::-webkit-scrollbar-track {
    background: #eee
}

::-webkit-scrollbar-thumb {
    background: #888
}

::-webkit-scrollbar-thumb:hover {
    background: #555
}


.scroll {
    overflow-y: scroll;
    scroll-behavior: smooth;
    height: 325px
}

.name {
    font-size: 8px
}

.msg {
    background-color: #fff;
    font-size: 11px;
    padding: 5px;
    border-radius: 5px;
    font-weight: 500;
    color: #3e3c3c
}

.between {
    font-size: 8px;
    font-weight: 500;
    color: #a09e9e
}

.navbar {
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}

.form-control {
    font-size: 12px;
    font-weight: 400;
    width: 230px;
    height: 30px;
    border: none
}


.form-control:focus {
    box-shadow: none !important
}

.icon1 {
    color: #7C4DFF !important;
    font-size: 18px !important;
    cursor: pointer
}

.icon2 {
    color: #512DA8 !important;
    font-size: 18px !important;
    position: relative;
    left: 8px;
    padding: 0px;
    cursor: pointer
}

.icondiv {
    border-radius: 50%;
    width: 15px;
    height: 15px;
    padding: 2px;
    position: relative;
    bottom: 1px
}
</style>
