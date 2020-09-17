<template>
    <aside class="sidebar static">
        <div class="widget">
            <div class="banner medium-opacity bluesh">
                <div class="bg-image" :style="{'background-image': 'url(goweb/images/resources/baner-widgetbg.jpg)' }"></div>
                <div class="baner-top">
                    <span><img alt="" :src="'/goweb/images/book-icon.png'"></span>
                    <i class="fa fa-ellipsis-h"></i>
                </div>
                <div class="banermeta">
                    <p>
                        create your own favourit page.
                    </p>
                    <span>like them all</span>
                    <a data-ripple="" title="" href="#">start now!</a>
                </div>
            </div>
        </div>
        <div class="widget friend-list stick-widget">
            <h4 class="widget-title">Friends</h4>
            <div id="searchDir"></div>
            <ul id="people-list" class="friendz-list">
                <li v-for="myFriend in myFriends">
                    <figure>
                        <template v-if="myFriend.profile_photo !== null">
                            <img :src="'/storage/images/'+myFriend.profile_photo " :alt="myFriend.name">
                        </template>
                        <template v-else>
                            <img :src="'/goweb/images/avatar.png'" :alt="myFriend.name">
                        </template>
                        <span class="status f-online"></span>
                    </figure>
                    <div class="friendz-meta">
                        <a style="cursor: pointer" >{{ myFriend.name }}</a>
                        <i>{{ myFriend.email }}</i>
                    </div>
                </li>

            </ul>
            <div class="chat-box">
                <div class="chat-head">
                    <span class="status f-online"></span>
                    <h6>Bucky Barnes</h6>
                    <div class="more">
                        <span><i class="ti-more-alt"></i></span>
                        <span class="close-mesage"><i class="ti-close"></i></span>
                    </div>
                </div>
                <div class="chat-list">
                    <ul>
                        <li class="me">
                            <div class="chat-thumb"><img :src="'/goweb/images/resources/chatlist1.jpg'" alt=""></div>
                            <div class="notification-event">
                                <span class="chat-message-item">
                                    Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                                </span>
                                <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                            </div>
                        </li>
                        <li class="you">
                            <div class="chat-thumb"><img :src="'/goweb/images/resources/chatlist2.jpg'" alt=""></div>
                            <div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
                                <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                            </div>
                        </li>
                        <li class="me">
                            <div class="chat-thumb"><img :src="'/goweb/images/resources/chatlist1.jpg'" alt=""></div>
                            <div class="notification-event">
                                <span class="chat-message-item">
                                    Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                                </span>
                                <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                            </div>
                        </li>
                    </ul>
                    <form class="text-box">
                        <textarea placeholder="Post enter to post..."></textarea>
                        <div class="add-smiles">
                            <span title="add icon" class="em em-expressionless"></span>
                        </div>
                        <div class="smiles-bunch">
                            <i class="em em---1"></i>
                            <i class="em em-smiley"></i>
                            <i class="em em-anguished"></i>
                            <i class="em em-laughing"></i>
                            <i class="em em-angry"></i>
                            <i class="em em-astonished"></i>
                            <i class="em em-blush"></i>
                            <i class="em em-disappointed"></i>
                            <i class="em em-worried"></i>
                            <i class="em em-kissing_heart"></i>
                            <i class="em em-rage"></i>
                            <i class="em em-stuck_out_tongue"></i>
                        </div>
                        <button type="submit"></button>
                    </form>
                </div>
            </div>
        </div><!-- friends list sidebar -->
    </aside>
</template>

<script>
    export default {

        data () {
            return {
                authUser: window.authUser,
                myFriends: [],
            }
        },
        mounted() {
            this.getMyFriends();
        },

        methods: {
            getMyFriends(){
                var _this = this;
                axios.post(_this.ApiUrl+'get-my-friends', {username: _this.authUser.username})
                    .then(response => response.data)
                    .then(response => {
                        _this.myFriends = response.friendship;
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },
        }
    }
</script>
