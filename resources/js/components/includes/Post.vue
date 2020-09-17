<template>
    <div class="central-meta new-pst">
        <div class="new-postbox">
            <figure>
                <template v-if="authUser !== null && authUser.profile_photo">
                    <img :src="'/storage/images/'+authUser.profile_photo" :alt="authUser.name">
                </template>
                <template v-else>
                    <img :src="'/goweb/images/avatar.png'" :alt="authUser.name">
                </template>
            </figure>
            <div class="newpst-input">
                <form @submit.prevent="storePost()" enctype="multipart/form-data">
                    <textarea rows="2" v-model="newsfeed_text" name="newsfeed_text" placeholder="write something"></textarea>
                    <input type="hidden" name="status" value="0">
                    <div class="attachments">
                        <ul>
                            <!--<li>
                                <i class="fa fa-music"></i>
                                <label class="fileContainer">
                                    <input type="file" accept="audio/*">
                                </label>
                            </li>-->
                            <li>
                                <i class="fa fa-image"></i>
                                <label class="fileContainer">
                                    <input id="file-input" type="file" accept="image/*" name="image" @change="onImageChange"/>
                                </label>
                            </li>
                            <li>
                                <i class="fa fa-video-camera" @click="videoLink = true"></i>
                            </li>
<!--                            <li>-->
<!--                                <i class="fa fa-camera"></i>-->
<!--                                <label class="fileContainer">-->
<!--                                    <input type="file">-->
<!--                                </label>-->
<!--                            </li>-->
                            <li>
                                <button type="submit" id="btnSubmit">Post</button>
                            </li>
                        </ul>
                        <input v-if="videoLink" placeholder="YouTube Full url...." type="text" class="form-control" name="video" v-model="video" style="margin-top: 8px;">
                    </div>
                </form>
                <img :src="image" height="100px" width="100px" class="fa-pull-left"/>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                authUser: window.authUser,
                newsfeed_text: '',
                image: '',
                success: '',
                video: '',
                videoLink: false
            }
        },
        mounted() {

        },

        methods: {
            onImageChange(e) {
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
            },
            storePost(){
                let _this = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                };
                let postData = new FormData ();
                let image = document.getElementById("file-input").files[0];
                if (_this.newsfeed_text === '' && image === undefined && _this.video === ''){
                    _this.$toastr.e("Please insert text and image", 'Error !!');
                    return false
                }
                if (image !== undefined){
                    if(image.type === 'image/jpeg' || image.type === 'image/png' || image.type === 'image/webp' || image.type === 'image/gif'){
                        postData.append('image', image);
                    }else {
                        postData.append('image', '');
                    }
                }
                postData.append('newsfeed_text', _this.newsfeed_text);
                postData.append('video', _this.video);
                axios.post(_this.ApiUrl+'newsfeed-store', postData, config)
                    .then(response => response.data)
                    .then(response => {
                        if (response.status === 200){
                            $("#file-input").val('');
                            _this.newsfeed_text = '';
                            _this.image = '';
                            _this.video = '';
                            _this.$parent.getNewsfeed();
                            _this.videoLink = false;
                            _this.$toastr.s("Your post successfully", "Success !!");
                        }
                    })
                    .catch(error => {
                        console.log('Team User api not working !!')
                    });
            },


        }
    }
</script>
