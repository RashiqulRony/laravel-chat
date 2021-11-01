<template>
    <div class="d-flex flex-column" id="messages">
        <div class="mx-auto my-2 bg-primary text-white small py-1 px-2 rounded">
            27/03/2018
        </div>

        <div class="align-self-start p-1 my-1 mx-3 rounded bg-white shadow-sm message-item">
            <div class="d-flex flex-row">
                <div class="body m-1 mr-2">have you seen infinity war?</div>
                <div class="time ml-auto small text-right flex-shrink-0 align-self-end text-muted" style="width:75px;">
                    17:23
                </div>
            </div>
        </div>

        <div class="mx-auto my-2 bg-primary text-white small py-1 px-2 rounded">
            01/10/2021
        </div>

        <div class="align-self-end self p-1 my-1 mx-3 rounded bg-white shadow-sm message-item">
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
                <div class="body m-1 mr-2">ddddddddddddddd asdf asdf asdf dsaf??</div>
                <div class="time ml-auto small text-right flex-shrink-0 align-self-end text-muted" style="width:75px;">
                    15:59<i class="far fa-check-circle"></i>
                </div>
            </div>
        </div>

        <div class="align-self-end self p-1 my-1 mx-3 rounded bg-white shadow-sm message-item">
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
                <div class="body m-1 mr-2">asdf asdf asdf asdf</div>
                <div class="time ml-auto small text-right flex-shrink-0 align-self-end text-muted"
                     style="width:75px;">
                    15:59
                    <i class="far fa-check-circle"></i>
                </div>
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


        mounted() {

        },
        methods:{

        }

    }
</script>
