<template>
    <div>
        <div class="central-meta">
            <ul class="photos">
                <li v-for="(userVideo, index) in userVideos" style="margin-right: 5px; height: 100px; width: 100px;">
                    <a v-if="userVideo.video" :href="userVideo.video" title="" :data-strip-group="'mygroup'+userVideo.id" class="strip" data-strip-options="width: 700,height: 450,youtube: { autoplay: 1 }">
                        <img :src="userVideo.video_image" height="345" width="613" style="height: 130px;"/>
                        <i>
                            <svg version="1.1" class="play" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" height="32px" width="32px"
                                 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                  <path class="stroke-solid" fill="none" stroke=""  d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7
                                    C97.3,23.7,75.7,2.3,49.9,2.5"/>
                                <path class="icon" fill="" d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z"/>
							</svg>
                        </i>
                    </a>
                    <a v-else :href="userVideo.video" title="" :data-strip-group="'mygroup'+userVideo.id" class="strip" data-strip-options="width: 700,height: 450,youtube: { autoplay: 1 }">
                        <img :src="'/goweb/images/video.jpg'" height="345" width="613" style="height: 130px;"/>
                        <i>
                            <svg version="1.1" class="play" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" height="32px" width="32px"
                                 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                  <path class="stroke-solid" fill="none" stroke=""  d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7
                                    C97.3,23.7,75.7,2.3,49.9,2.5"/>
                                <path class="icon" fill="" d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z"/>
							</svg>
                        </i>
                    </a>
                </li>
            </ul>
            <div class="lodmore">
                <button class="btn-view btn-load-more"></button>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        data() {
            return {
                username: this.$route.params.username,
                authUser: window.authUser,
                userVideos: []
            }
        },
        created() {
            this.getUserVideos()
        },

        methods: {
            getUserVideos () {
                let _this = this;
                axios.post(_this.ApiUrl + 'user-videos', {username: _this.username})
                    .then(response => response.data)
                    .then(response => {
                        _this.userVideos = response.userVideo;
                    })
                    .catch(error => {
                        console.log('Team User api not working !!')
                    });
            }
        },
    }
</script>

