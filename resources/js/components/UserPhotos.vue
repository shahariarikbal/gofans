<template>
    <div>
        <div class="central-meta">
            <ul class="photos">
                <li v-for="(userImage, index) in userPhotos" style="margin-right: 5px; height: 100px; width: 100px;">
                    <a class="strip" :href="'/storage/images/'+userImage.image" title="" :data-strip-group="'mygroup'+userImage.id" data-strip-group-options="loop: false">
                        <img v-if="userImage.image" :src="'/storage/images/'+userImage.image" height="345" width="613" style="margin-top: 5px; height: 123px;"/>
                        <img v-else :src="'/goweb/images/avatar.png'" height="345" width="613" style="margin-top: 5px; height: 123px;"/>
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
                userPhotos: []
            }
        },
        created() {
            this.getUserImages()
        },

        methods: {
            getUserImages () {
                let _this = this;
                axios.post(_this.ApiUrl + 'user-photos', {username: _this.username})
                    .then(response => response.data)
                    .then(response => {
                        _this.userPhotos = response.userPhoto;
                    })
                    .catch(error => {
                        console.log('Team User api not working !!')
                    });
            }
        },
    }
</script>

