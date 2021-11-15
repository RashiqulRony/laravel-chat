<template>
    <div class="iframe-container">
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.0.1/css/bootstrap.css">
        <link
            type="text/css"
            rel="stylesheet"
            href="https://source.zoom.us/2.0.1/css/react-select.css"
        >

        <meta name="format-detection" content="telephone=no">
    </div>
</template>

<script>
    // import { ZoomMtg } from "@zoomus/websdk";
    // var ZoomMtg = ZoomMtgT.ZoomMtg
    // import { ZoomMtg } from "zoomus-jssdk";
    var ZoomMtg = require('@zoomus/websdk').ZoomMtg
    console.log("checkSystemRequirements");
    console.log(JSON.stringify(ZoomMtg.checkSystemRequirements()));
    ZoomMtg.setZoomJSLib('https://source.zoom.us/2.0.1/lib', '/av');
    ZoomMtg.preLoadWasm();
    ZoomMtg.prepareJssdk();

    var API_KEY = 'zah9pqfuRZqUjNEfdlnEBg';
    var API_SECRET = 'TJ2YZ0Nt5GxYAm7fyGqgnaehgSzPPbJgOA8P';

    export default {

        name: "ZoomFrame",
        data: function() {
            return {
                src: "",
                meetConfig: {},
                signature: {}
            };
        },
        props: {
            nickname: String,
            meetingId: String,
            password: String
        },
        created: function() {
            // Meeting config object
            this.meetConfig = {
                apiKey: API_KEY,
                apiSecret: API_SECRET,
                meetingNumber: this.meetingId,
                userName: this.nickname,
                passWord: this.password,
                leaveUrl: "https://zoom.us",
                role: 0
            };
            // Generate Signature function
            this.signature = ZoomMtg.generateSignature({
                meetingNumber: this.meetConfig.meetingNumber,
                apiKey: this.meetConfig.apiKey,
                apiSecret: this.meetConfig.apiSecret,
                role: this.meetConfig.role,
                success: function(res) {
                    // eslint-disable-next-line
                    console.log("success signature: " + res.result);
                }
            });
            // join function
            ZoomMtg.init({

                leaveUrl: "https://zoom.us",
                isSupportAV: true,
                debug: true,
                meetingInfo: "THis is test",

                success: () => {
                    document.getElementById("zmmtg-root").style.display = "block";
                    ZoomMtg.join({
                        meetingNumber: this.meetConfig.meetingNumber,
                        userName: this.meetConfig.userName,
                        signature: this.signature,
                        apiKey: this.meetConfig.apiKey,
                        userEmail: "rashiqulrony@gmail.com",
                        passWord: this.meetConfig.passWord,
                        success: function(res) {
                            parent.postMessage({
                                type:"event.joinSuccess"
                            },"*");
                            console.log("join meeting success");
                        },
                        error: function(res) {
                            // eslint-disable-next-line
                            console.log(res);
                        }
                    });
                },
                error: function(res) {
                    // eslint-disable-next-line
                    console.log(res);
                }
            });
        },
        mounted: function() {
            console.log(this.nickname);
        }
    }
</script>
