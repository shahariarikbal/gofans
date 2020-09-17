<template>
    <section>
        <div class="feature-photo">
            <figure>
                <template v-if="user.cover_photo !== null">
                    <img :src="'/storage/images/'+user.cover_photo" :alt="user.name"/>
                </template>
                <template v-else>
                    <img :src="'/goweb/images/resources/timeline-1.jpg'" :alt="user.name">
                </template>
            </figure>

            <div class="add-btn">
<!--                <span>1205 followers</span>-->
                <template v-if="user.id !== authUser.id && checkMyFriend === null">
                    <a style="cursor:pointer" @click="addFriend(user.id)" class="bg-success text-white" title="" data-ripple="">Add Friend</a>
                </template>
                <template v-if="checkMyFriend !== null || requestSendBy !== null">
                    <template v-if="checkMyFriend.friendStatus === 'request' && requestSendBy === 'he'">
                        <a style="cursor:pointer" @click="confirmRequest(checkMyFriend.friendId)" class="bg-info text-white" title="" data-ripple="">Confirm</a>
                        <a style="cursor:pointer" @click="removeRequest(checkMyFriend.friendId)" class="bg-danger text-white" title="" data-ripple="">Delete Request</a>
                    </template>
                    <template v-if="checkMyFriend.friendStatus === 'request' && requestSendBy === 'me'">
                        <a style="cursor:pointer" @click="removeRequest(checkMyFriend.friendId)" class="bg-warning text-white" title="" data-ripple="">Cancel Request</a>
                    </template>
                    <template v-if="checkMyFriend.friendStatus === 'accept'">
                        <a style="cursor:pointer" @click="removeRequest(checkMyFriend.friendId)" class="bg-warning text-white" title="" data-ripple="">Unfriend</a>
                    </template>
                </template>
            </div>
            <form class="edit-phto" method="post" enctype="multipart/form-data" v-if="user.id === authUser.id">
                <i class="fa fa-camera-retro"></i>
                <label class="fileContainer">
                    Edit Cover Photo
                    <input type="file" name="cover_photo" id="cover_photo" @change="coverPhoto" accept="image/*">
                </label>
            </form>
            <div class="container-fluid">
                <div class="row merged">
                    <div class="col-lg-2 col-sm-3">
                        <div class="user-avatar">
                            <figure>
                                <template v-if="user !== null && user.profile_photo">
                                    <img :src="'/storage/images/'+user.profile_photo" :alt="user.name" id="avatar">
                                </template>
                                <template v-else>
                                    <img :src="'/goweb/images/avatar.png'" :alt="user.name">
                                </template>
                                <form class="edit-phto" method="post" enctype="multipart/form-data" v-if="user.id === authUser.id">
                                    <i class="fa fa-camera-retro"></i>
                                    <label class="fileContainer">
                                        Edit Display Photo
                                        <input type="file" name="profile_photo" id="profile_photo" @change="profilePhoto" accept="image/*">
                                    </label>
                                </form>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-9">
                        <div class="timeline-info">
                            <ul>
                                <li class="admin-name">
                                    <h5>{{ user.name }}</h5>
                                </li>
                                <li>
                                    <router-link class="active" :to="{name: 'Timeline', params: {username: username }}">TimeLine</router-link>
                                    <router-link :class="{active: isActive}" :to="{name: 'UserPhotos', params: {username: username }}">Photos</router-link>
                                    <router-link :to="{name: 'UserVideos', params: {username: username }}">Video</router-link>
                                    <router-link v-if="authUser.id === user.id" :to="{name: 'UserFriends', params: {username: username }}">Friends</router-link>
                                    <router-link class="" :to="{name: 'UserAbout', params: {username: username }}">About</router-link>
                                    <router-link class="" :to="{name: 'UserSettings', params: {username: username }}">Setting</router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {

        data() {
            return {
                username: this.$route.params.username,
                authUser: window.authUser,
                user: '',
                checkMyFriend: '',
                requestSendBy: '',
                profile_photo: '',
                isActive: false,
            }
        },
        mounted() {
            this.getUser();
            this.checkFriend();
        },

        methods: {
            getUser(){
                var _this = this;
                axios.post(_this.ApiUrl+'get-user', {username: _this.username })
                    .then(response => response.data)
                    .then(response => {
                        _this.user = response.user;
                    })
                    .catch(error => {
                        console.log('Team User api not working !!')
                    });
            },

            checkFriend(){
                var _this = this;
                axios.post(_this.ApiUrl+'check-friend', {username: _this.username })
                    .then(response => response.data)
                    .then(response => {
                        _this.checkMyFriend = response.checkFriend;
                        _this.requestSendBy = response.requestSendBy;
                    })
                    .catch(error => {
                        console.log('Team User api not working !!')
                    });
            },

            profilePhoto(e) {
                if (e.target.files[0]) {
                    let image = e.target.files[0];
                    if(image['type'] === 'image/jpeg' || image['type'] === 'image/png' || image['type'] === 'image/webp' || image['type'] === 'image/gif'){
                        let reader = new FileReader();
                        reader.readAsDataURL(image);
                        reader.onload = e => {
                            this.image = e.target.result
                        }
                    }else{
                        this.$toastr.e("This file not an Image", 'Error !!');
                    }

                }

                let _this = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                };

                let profilePic = new FormData();
                let image = document.getElementById("profile_photo").files[0];
                profilePic.append('profile_photo', image);

                 // console.log(_this.ApiUrl + `user-profile-picture-change/${this.$route.params.id }`, profilePic)

                axios.post(_this.ApiUrl + `user-profile-picture-change/${this.$route.params.id }`, profilePic)
                    .then(response => {
                        console.log(response)
                        _this.getUser();
                        _this.$toastr.s("Your profile Picture Upload successfully", "Success !!");
                        //location.reload(true)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            coverPhoto(e) {
                if (e.target.files[0]) {
                    let image = e.target.files[0];
                    if(image['type'] === 'image/jpeg' || image['type'] === 'image/png' || image['type'] === 'image/webp' || image['type'] === 'image/gif'){
                        let reader = new FileReader();
                        reader.readAsDataURL(image);
                        reader.onload = e => {
                            this.image = e.target.result
                        }
                    }else{
                        this.$toastr.e("This file not an Image", 'Error !!');
                    }

                }

                let _this = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                };

                let profilePic = new FormData();
                let image = document.getElementById("cover_photo").files[0];
                profilePic.append('cover_photo', image);

                // console.log(_this.ApiUrl + `user-profile-picture-change/${this.$route.params.id }`, profilePic)

                axios.post(_this.ApiUrl + `user-cover-picture-change/${this.$route.params.id }`, profilePic)
                    .then(response => {
                        _this.getUser();
                        _this.$toastr.s("Your Cover Picture Uploaded", "Success !!");
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },


            confirmRequest(friendId){
                let _this = this;
                axios.post(_this.ApiUrl+'accept-request', {friendId:friendId})
                    .then(response => response.data)
                    .then(response => {
                        if (response.status === 200){
                            _this.checkFriend();
                            _this.$toastr.s(response.message, "Success !!");
                        }
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },

            removeRequest(friendId){
                // Unfriend and Delete request
                var _this = this;
                axios.post(_this.ApiUrl+'remove-request', {friendId:friendId})
                    .then(response => response.data)
                    .then(response => {
                        if (response.status === 200){
                            _this.checkFriend();
                            _this.$toastr.s(response.message, "Success !!");
                        }
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },

            addFriend(receiverId){
                var _this = this;
                axios.post(_this.ApiUrl+'add-friend', {receiver_id:receiverId})
                    .then(response => response.data)
                    .then(response => {
                        if (response.status === 200){
                            _this.checkFriend();
                            _this.$toastr.s(response.message, "Success !!");
                        }
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },

        },


    }
</script>
