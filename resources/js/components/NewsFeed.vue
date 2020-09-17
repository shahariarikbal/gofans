<template>
    <div>
        <status-post></status-post>
        <!-- add post new box -->

        <div class="loadMore">
            <div v-for="(newsfeed, index) in newsfeeds" class="central-meta item">
                <div class="user-post">
                    <div class="friend-info">
                        <figure>
                            <router-link :to="{name: 'Timeline', params: {username: newsfeed.user.username}}">
                                <template v-if="newsfeed.user.profile_photo !== null">
                                    <img :src="'/storage/images/'+newsfeed.user.profile_photo" :alt="newsfeed.user.name" id="avater"/>
                                </template>
                                <template v-else>
                                    <img :src="'/goweb/images/avatar.png'" :alt="newsfeed.user.name" id="avater" >
                                </template>
                            </router-link>
                        </figure>
                        <div class="friend-name user-name-width">
                            <ins>
                                <router-link class="pull-left" :to="{name: 'Timeline', params: {username: newsfeed.user.username}}">
                                    {{ newsfeed.user.name }}
                                </router-link>
                            </ins>
                            <span>published: {{ newsfeed.created_at }}</span>
                        </div>
                        <!--@if($data->user_id === auth()->user()->id)-->
                        <template v-if="newsfeed.user_id === authUser.id">
                            <ul class="nfEditMenu">
                                <li class="dropdown pull-right">
                                    <a style="cursor: pointer" @click.prevent="showNfEditList($event ,newsfeed.id)" class="dropdown-toggle pages" title="newsfeed Edit" role="button"></a>
                                    <ul :id="'nfEdit'+newsfeed.id" @mouseleave="hideNfEditList($event ,newsfeed.id)" style="display: none; z-index: 1">
                                        <li>
                                            <a style="cursor: pointer; color: #000000" class="action-post" @click="newsFeedEdit(newsfeed)">
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a style="cursor: pointer; color: #000000" class="action-post" title="Delete post" @click="destroy(newsfeed, index)">
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </template>

                        <div class="post-meta">
                            <a v-if="newsfeed.video" :href="newsfeed.video" title="" :data-strip-group="'mygroup'+newsfeed.id" class="strip" data-strip-options="width: 700,height: 450,youtube: { autoplay: 1 }">
                                <img :src="newsfeed.video_image" height="345" width="613"/>
                                <i>
                                    <svg version="1.1" class="play" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="32px" width="32px"
                                         viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                          <path class="stroke-solid" fill="none" stroke=""  d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7
                                            C97.3,23.7,75.7,2.3,49.9,2.5"/>
                                          <path class="icon" fill="" d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z"/>
									</svg>
                                </i>
                            </a>
                            <a class="strip" :href="'/storage/images/'+newsfeed.image" title="" :data-strip-group="'mygroup'+newsfeed.id" data-strip-group-options="loop: false">
                                <img v-if="newsfeed.image" :src="'/storage/images/'+newsfeed.image" height="345" width="613" style="margin-top: 10px;"/>
                            </a>
                            <div class="description border-bottom" :id="'readMores'+newsfeed.id">
                                <template v-if="newsfeed.newsfeed_text">
                                    <p v-if="newsfeed.newsfeed_text.length < 150" style="text-align: justify">{{newsfeed.newsfeed_text}}</p>
                                    <p v-else style="text-align: justify">{{newsfeed.newsfeed_text.substring(0, 150)}} <a style="cursor: pointer; color: #0a98dc" @click="readMore(newsfeed.id)">Read more</a></p>
                                </template>
                            </div>
                            <div class="description border-bottom" :id="'readMore'+newsfeed.id" style="display: none">
                                <p v-html="newsfeed.newsfeed_text"></p>
                            </div>
                            <div class="we-video-info we-border-bottom">
                                <ul>
                                    <li>
                                        <span class="like" data-toggle="tooltip" title="like count">
                                            <i class="fa fa-heart"></i>
                                            <small>2.2k</small>
                                        </span>
                                    </li>
                                    <li class="pull-right">
                                        <span class="comment" data-toggle="tooltip" title="Comments count">
                                            <i class="fa fa-share-alt"></i>
                                            <small>0</small>
                                        </span>
                                    </li>
                                    <li class="pull-right">
                                        <span class="comment" data-toggle="tooltip" title="Comments count">
                                            <i class="fa fa-comments-o"></i>
                                            <small>{{ newsfeed.total_comment }}</small>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="we-video-info">
                                <ul>
                                    <li class="social-media">
                                        <div id="removeIcon" class="menu">
                                            <div class="btn trigger">
                                                <i class="fa fa-thumbs-o-up"></i>
                                            </div>
                                            <div>
                                                <div class="rotater">
                                                    <div class="btn btn-icon">
                                                        <a href="#" data-toggle="tooltip" title="haha">
                                                            <img :src="'/goweb/images/emoji/haha.png'"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="rotater">
                                                    <div class="btn btn-icon">
                                                        <a href="#" data-toggle="tooltip" title="love">
                                                            <img :src="'/goweb/images/emoji/love.jpg'"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="rotater">
                                                    <div class="btn btn-icon">
                                                        <a href="#" data-toggle="tooltip" title="Sad">
                                                            <img :src="'/goweb/images/emoji/sad.png'"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="rotater">
                                                    <div class="btn btn-icon">
                                                        <a href="#" data-toggle="tooltip" title="Like">
                                                            <img :src="'/goweb/images/emoji/like.jpg'"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="rotater">
                                                    <div class="btn btn-icon">
                                                        <a href="#" data-toggle="tooltip" title="Angry">
                                                            <img :src="'/goweb/images/emoji/angry.jpg'"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="rotater">
                                                    <div class="btn btn-icon">
                                                        <a href="#" data-toggle="tooltip" title="Cry">
                                                            <img :src="'/goweb/images/emoji/cry.png'"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="rotater">
                                                    <div class="btn btn-icon">
                                                        <a href="#" data-toggle="tooltip" title="Smart">
                                                            <img :src="'/goweb/images/emoji/smart.png'"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="rotater">
                                                    <div class="btn btn-icon">
                                                        <a href="#" data-toggle="tooltip" title="wow">
                                                            <img :src="'/goweb/images/emoji/wow.png'"/>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="comment-center">
                                        <span class="comment" data-toggle="tooltip" title="Comments">
                                            <i class="fa fa-comments-o"></i>
                                            <small>Comment</small>
                                        </span>
                                    </li>
                                    <li class="social-media pull-right">
                                        <div id="removeIcon" class="menu">
                                            <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="coment-area">
                                <ul class="we-comet">
                                    <li v-for="(comment, cmntIndex) in newsfeed.comments">
                                            <div class="comet-avatar">
                                                <template v-if="comment.user_avatar !== null">
                                                    <router-link :to="{name: 'Timeline', params: {username: comment.username}}">
                                                        <img :src="'/storage/images/'+comment.user_avatar" :alt="comment.user_name" style="border-radius: 100%; width: 35px; height: 35px;">
                                                    </router-link>
                                                </template>
                                                <template v-else>
                                                    <router-link :to="{name: 'Timeline', params: {username: comment.username}}">
                                                        <img :src="'/goweb/images/avatar.png'" :alt="comment.user_name" style="border-radius: 100%; width: 35px; height: 35px;">
                                                    </router-link>
                                                </template>
                                            </div>
                                        <div class="we-comment">
                                            <div class="coment-head">
                                                <h5>
                                                    <router-link style="color: #007bff" :to="{name: 'Timeline', params: {username: comment.username}}">
                                                        {{ comment.user_name }}
                                                    </router-link>
                                                </h5>
                                                <span>{{ comment.post_date }}</span>
                                                <a class="we-reply" style="cursor: pointer" title="Reply" @click="openReply(comment.id)"><i class="fa fa-reply"></i></a>
                                                <div class="pull-right show-action-button" v-if="comment.user_id === authUser.id">
                                                    <a style="cursor: pointer; font-size: 14px; color: #0a98dc; font-weight: bold; margin-right: 10px;" data-toggle="modal" data-target="#exampleModalCenter" title="Edit" @click="commentEdit(comment) "><i class="fa fa-edit"></i></a>
                                                    <a style="cursor: pointer; font-size: 14px; color: red; font-weight: bold;" title="Delete" @click="commentDelete(comment, index)"><i class="fa fa-trash-o"></i></a>
                                                </div>
                                            </div>
                                            <p v-html="comment.body"></p>
                                        </div>
                                        <div class="post-comment col-md-12" style="margin-top: 10px; display: none" :id="'replySection'+comment.id">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <div class="comet-avatar">
                                                        <template v-if="comment.user_avatar !== null">
                                                            <img :src="'/storage/images/'+comment.user_avatar" :alt="comment.user_name" style="width: 100px; margin-left: 30px;">
                                                        </template>
                                                        <template v-else>
                                                            <img :src="'/goweb/images/avatar.png'" :alt="comment.user_name" style="width: 100px; margin-left: 30px;">
                                                        </template>
                                                    </div>
                                                </div>
                                                <div class="col-md-11">
                                                    <div class="post-comt-box">
                                                        <form @submit.prevent="replyStore(comment.id)">
                                                            <textarea placeholder="Reply your comment" name="body" v-model="body"></textarea>
                                                            <button type="submit" style="padding-bottom: 15px; color: #0b0b0b">Reply</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul>
                                            <li v-for="(replay, reIndex) in comment.replies">
                                                <div class="comet-avatar">
                                                    <template v-if="replay.user_avatar !== null">
                                                        <router-link :to="{name: 'Timeline', params: {username: comment.username}}">
                                                            <img :src="'/storage/images/'+replay.user_avatar" :alt="replay.user_name" style="border-radius: 100%; width: 35px; height: 35px;">
                                                        </router-link>
                                                    </template>
                                                    <template v-else>
                                                        <router-link :to="{name: 'Timeline', params: {username: comment.username}}">
                                                            <img :src="'/goweb/images/avatar.png'" :alt="replay.user_name" style="border-radius: 100%; width: 35px; height: 35px;">
                                                        </router-link>
                                                    </template>
                                                </div>
                                                <div class="we-comment">
                                                    <div class="coment-head">
                                                        <h5>
                                                            <router-link style="color: #007bff" :to="{name: 'Timeline', params: {username: replay.username}}">
                                                                {{ replay.user_name }}
                                                            </router-link>
                                                        </h5>
                                                        <span>{{ replay.post_date }}</span>
                                                        <div class="pull-right show-action-button" v-if="replay.user_id === authUser.id">
                                                            <a style="cursor: pointer; font-size: 14px; color: #0a98dc; font-weight: bold; margin-right: 10px;" data-toggle="modal" data-target="#replyEditModal" title="Edit" @click="replyCommentEdit(replay) "><i class="fa fa-edit"></i></a>
                                                            <a style="cursor: pointer; font-size: 14px; color: red; font-weight: bold;" title="Delete" @click="replyDelete(replay, index)"><i class="fa fa-trash-o"></i></a>
                                                        </div>
                                                    </div>
                                                    <p v-html="replay.body"></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="post-comment">
                                        <div class="comet-avatar">
                                            <template v-if="authUser !== null && authUser.profile_photo">
                                                <img :src="'/storage/images/'+authUser.profile_photo" :alt="authUser.name">
                                            </template>
                                            <template v-else>
                                                <img :src="'/goweb/images/avatar.png'" :alt="authUser.name">
                                            </template>
                                        </div>
                                        <div class="post-comt-box">
                                            <form v-on:submit.prevent="commentStore(newsfeed.id)" >
                                                <textarea :id="'comment'+newsfeed.id" placeholder="Post your comment" name="body"></textarea>
                                                <button type="submit" style="padding-bottom: 15px; color: #0b0b0b">Post</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Edit Modal-->
        <div class="modal fade" data-backdrop="false" id="newsfeedModal" tabindex="-1" role="dialog" aria-labelledby="newsfeedModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 id="newsfeedModalLabel">Update your post</h3>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updatePost()" method="post" enctype="multipart/form-data">
                            <textarea rows="2" v-model="newsfeed_text" name="newsfeed_text" placeholder="write something"></textarea>
                            <div class="modal-img">
                                <img src=" " id="newsFeedImage" style="margin-top: 10px;"/>
                                <div class="pull-right show-action-button modalImgDeleteBtn">
                                    <a title="Delete" @click="modalImageDelete(id)"><i class="fa fa-trash-o" style="color: red"></i></a>
                                </div>
                            </div>
                            <input v-if="videoLink" id="videoLink" placeholder="YouTube Full url...." type="text" class="form-control" name="video" v-model="video" style="margin-top: 8px;">
                            <div class="attachments">
                                <ul>
                                    <li>
                                        <i class="fa fa-image"></i>
                                        <label class="fileContainer">
                                            <input id="edit-file-input" type="file" accept="image/*" name="image" @change="onEditImageChange"/>
                                        </label>
                                    </li>
                                    <li>
                                        <i class="fa fa-video-camera" @click="videoLink = true"></i>
                                    </li>
                                </ul>
                                <input type="hidden" name="status" id="status" value="0">
                                <input type="hidden" id="id" name="id" v-model="id">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end Edit Modal-->
        <!--Comment Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Comment Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="commentUpdate()">
                            <div class="form-group">
                                <textarea placeholder="Reply your comment" class="form-control" name="body" v-model="body"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                <button type="submit" class="badge badge-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Reply Modal -->
        <div class="modal fade" id="replyEditModal" tabindex="-1" role="dialog" aria-labelledby="replyEditModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="replyEditModalTitle">Reply Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="replyUpdate()">
                            <div class="form-group">
                                <textarea placeholder="Reply your comment" class="form-control" name="body" v-model="body"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                <button type="submit" class="badge badge-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Post from './includes/Post';
    export default {

        components: {
            'status-post': Post,
        },

        data() {
            return {
                authUser: window.authUser,
                newsfeeds : [],
                id: '',
                image: '',
                newsfeed_text: '',
                body: '',
                video: '',
                comment_id: '',
                reply: false,
                videoLink: false,
                isHover: false,
                isEmoji: false,
            }
        },
        mounted() {
            this.getNewsfeed();
            this.pageScript();
        },

        computed : {
            isActionVisible () {
                if (this.isHover) {
                    return 'block'
                }
                return 'none'
            },
            isEmojiShow () {
                if (this.isEmoji) {
                    return 'block'
                }
                return 'none'
            }
        },

        methods: {
            getNewsfeed(){
                var _this = this;
                axios.post(_this.ApiUrl+'get-newsfeed', {})
                    .then(response => response.data)
                    .then(response => {
                        _this.newsfeeds = response.newsfeed;
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },

            commentStore(postId){
                let _this = this;
                let comments = $("#comment"+postId).val();
                var newComments = {
                    post_id: postId,
                    body: comments,
                };

                axios.post(_this.ApiUrl+'comment-store', newComments)
                    .then(response => response.data)
                    .then(response => {
                        this.getNewsfeed();
                        $("#comment"+postId).val("");
                        _this.$toastr.s("This post has been commented", "Success !!");
                    })
                    .catch(error => {
                        console.log('Team User api not working !!')
                    });
            },

            commentUpdate() {
                let _this = this;
                axios.post(_this.ApiUrl+ 'comment-update/'+this.id, {
                    body: this.body
                }).then(response => {
                    if (response.status === 200){
                        $('#exampleModalCenter').modal('hide');
                        _this.body = '';
                        _this.getNewsfeed();
                        _this.$toastr.s("Your Comment Update successfully", "Success !!");
                    }
                }).catch(error => {
                    console.log(error)
                })
            },

            commentDelete(comment, index) {
                let _this = this;
                axios.delete(_this.ApiUrl+'comment-delete/'+comment.id)
                .then(response => {
                    this.newsfeeds.splice(index, 1)
                    _this.getNewsfeed()
                    _this.$toastr.s("Your Comment delete successfully", "Success !!");
                })
            },

            replyUpdate() {
                let _this = this;
                axios.post(_this.ApiUrl+ 'reply-update/'+this.id, {
                    body: this.body
                }).then(response => {
                    if (response.status === 200){
                        $('#replyEditModal').modal('hide');
                        _this.body = '';
                        _this.getNewsfeed();
                        _this.$toastr.s("Your Reply update successfully", "Success !!");
                    }
                }).catch(error => {
                    console.log(error)
                })
            },

            replyDelete(reply, index) {
                let _this = this;
                axios.delete(_this.ApiUrl+'reply-delete/'+reply.id)
                    .then(response => {
                        this.newsfeeds.splice(index, 1)
                        _this.getNewsfeed()
                        _this.$toastr.s("Your reply delete successfully", "Success !!");
                    })
            },

            replyStore(commentId) {
                let _this = this;
                //let comment_id = commentId;

                axios.post(_this.ApiUrl+'reply-store', {
                    comment_id : commentId,
                    body: this.body
                }).then(response => {
                        $("#replySection"+commentId).hide();
                        this.getNewsfeed();
                        this.body = ''
                        _this.$toastr.s("Reply has been submitted", "Success !!");

                    })
                    .catch(error => {
                        console.log('Team User api not working !!')
                    });
            },

            commentEdit(comment) {
                this.id = comment.id;
                this.body = comment.body;
            },

            replyCommentEdit(reply) {
                this.id = reply.id;
                this.body = reply.body;
            },

            onEditImageChange(e) {
                if (e.target.files[0]) {
                    let image = e.target.files[0];
                    if(image['type'] === 'image/jpeg' || image['type'] === 'image/png' || image['type'] === 'image/webp' || image['type'] === 'image/gif'){
                        let reader = new FileReader();
                        reader.onload = function ()
                        {
                            let output = document.getElementById('newsFeedImage');
                            output.src = reader.result;
                            output.style.display = "block";
                            output.style.width = "100%";
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }else{
                        this.$toastr.e("This file not an Image", 'Error !!');
                    }
                }
            },

            modalImageDelete(newsfeedId) {
                let _this = this;
                axios.delete(_this.ApiUrl+'modal-image-delete/'+newsfeedId)
                    .then(response => response.data)
                    .then(response => {
                        if (response.status === 200){
                            $('#newsFeedImage').attr('src', ' ');
                            _this.image = '';
                            _this.getNewsfeed()
                            _this.$toastr.s(response.message, "Success !!");
                        }
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },

            newsFeedEdit(newsfeed) {
                $('#newsfeedModal').modal('show')
                this.id = newsfeed.id;
                this.newsfeed_text = newsfeed.newsfeed_text;
                this.video = newsfeed.video;
                this.image = newsfeed.image;
                if (newsfeed.image) {
                    $('#newsFeedImage').attr('src', "/storage/images/" + newsfeed.image);
                }else {
                    $('#newsFeedImage').attr('src', ' ');
                }

                if (newsfeed.video) {
                    this.videoLink = true
                }else {
                    this.videoLink = false
                }
            },

            updatePost() {
                let _this = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                };
                let postData = new FormData ();
                let image = document.getElementById("edit-file-input").files[0];
                if (_this.newsfeed_text === '' && image === undefined && _this.video === ''){
                    _this.$toastr.e("Please insert text and image", 'Error !!');
                    return false
                }
                if (_this.image !== null || _this.newsfeed_text !== null) {
                    if (image !== undefined){
                        if(image.type === 'image/jpeg' || image.type === 'image/png' || image.type === 'image/webp' || image.type === 'image/gif'){
                            postData.append('image', image);
                        }else {
                            postData.append('image', '');
                        }
                    }
                }

                postData.append('newsfeed_text', _this.newsfeed_text === null ? '': _this.newsfeed_text);
                postData.append('video', _this.video === null ? '': _this.video);
                axios.post(_this.ApiUrl+'newsfeed-update/' + this.id, postData, config)
                    .then(response => response.data)
                    .then(response => {
                        if (response.status === 200){
                            $("#edit-file-input").val('');
                            $("#videoLink").val('');
                            _this.newsfeed_text = '';
                            _this.image = '';
                            _this.video = '';
                            $('#newsfeedModal').modal('hide');
                            _this.getNewsfeed();
                            _this.$toastr.s("Your post successfully", "Success !!");
                        }
                    })
                    .catch(error => {
                        console.log('Team User api not working !!')
                    });
            },

            destroy(newsfeed, index) {
                let _this = this;
                axios.delete('/newsfeed-delete/' + newsfeed.id)
                    .then(response => response.data)
                    .then(response => {
                        this.newsfeeds.splice(index, 1)
                        _this.getNewsfeed();
                        _this.$toastr.s("Your post delete successfully", "Success !!");
                    })
            },

            showNfEditList(e, nfId){
                $("#nfEdit"+nfId).show(300);
            },

            hideNfEditList(e, nfId){
                setTimeout(function () {
                    $("#nfEdit"+nfId).hide(300);
                }, 1000)
            },

            openReply(commentId) {
                $("#replySection" + commentId).toggle(300);
            },

            readMore(readMoreId) {
                $("#readMore" + readMoreId).show();
                $("#readMores" + readMoreId).hide();
            },

            pageScript(){
                setTimeout(function () {
                    $('.trigger').on("click", function() {
                        $(this).parent(".menu").toggleClass("active");
                    });
                }, 1000)
            },

            away: function() {
                console.log('clicked away');
            },
        }
    }
</script>

<style lang="scss" scoped>
.we-video-info, .social-media, .menu, .trigger, .fa-thumbs-o-up:hover {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
}
.nfEditMenu {
    font: 14px/1.5 'Open Sans', sans-serif;
    font-weight: 600;
    margin: 0;
    padding: 0;
    list-style: none;
    float: right;
    li {
        display: inline-block;
        position: relative;
        color: #fff;
        text-align: right;
        a {
            display: inline-block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            &:after {
                color: #333;
                font-size: 20px;
                float: right;
                @media(max-width:767px){
                    margin-top: -38px;
                }
            }
        }
        ul {
            position: absolute;
            right: 5px;
            top: 20px;
            margin: 0;
            padding: 0;
            border: 1px solid #f3f3f3;
            box-shadow: 5px 5px 15px #828380;
            @media(max-width:767px){
                top: -20px;
            }
            li {
                background: #fff;
                transition: background .2s;
                text-align: center;
                min-width: 100px;
                &:hover {
                    background: #f1f1f1;
                }
                a {
                    display: inline-block;
                    padding: 10px;
                    color: #333;
                    text-decoration: none;
                }
            }
        }
    }
}
.fade-enter-active, .fade-leave-active {
    transition: opacity .2s;
}
.fade-enter, .fade-leave-active {
    opacity: 0;
}
.show-action-button {
    opacity: 0;
    -webkit-transform: translate3d(0, -15px, 0);
            transform: translate3d(0, -15px, 0);
    -webkit-transition: all 150ms linear;
    -o-transition: all 150ms linear;
    transition: all 150ms linear;
    visibility: hidden;
}

.we-comment:hover .coment-head .show-action-button {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.modal-img:hover .show-action-button {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
}

.modalImgDeleteBtn {
    cursor: pointer;
    font-size: 14px;
    position: absolute;
    top: 23%;
    right: 12%;
}

</style>
