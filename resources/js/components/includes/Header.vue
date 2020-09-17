<template>
    <div>
        <div class="responsive-header">
            <div class="mh-head first Sticky">
                <span class="mh-btns-left">
                    <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
                </span>
                <span class="mh-text">
                    <a :href="'/newsfeed'" title=""><img :src="'/goweb/images/logo2.png'" alt=""></a>
                </span>
                <span class="mh-btns-right">
                    <a class="fa fa-sliders" href="#shoppingbag"></a>
                </span>
            </div>
            <div class="mh-head second">
                <form class="mh-form">
                    <input placeholder="search" />
                    <a href="#" class="fa fa-search"></a>
                </form>
            </div>
            <div id="menu" class="res-menu">

                <div class="row">
                    <div class="col-12">
<!--                        @include('user.web.includes._left_category_menu')-->
                    </div>
                </div>
            </div>
            <nav id="shoppingbag">
                <div>
                    <div class="">
                        <form method="post">
                            <div class="setting-row">
                                <span>use night mode</span>
                                <input type="checkbox" id="nightmode" />
                                <label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Notifications</span>
                                <input type="checkbox" id="switch2" />
                                <label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Notification sound</span>
                                <input type="checkbox" id="switch3" />
                                <label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>My profile</span>
                                <input type="checkbox" id="switch4" />
                                <label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Show profile</span>
                                <input type="checkbox" id="switch5" />
                                <label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                        </form>
                        <h4 class="panel-title">Account Setting</h4>
                        <form method="post">
                            <div class="setting-row">
                                <span>Sub users</span>
                                <input type="checkbox" id="switch6" />
                                <label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>personal account</span>
                                <input type="checkbox" id="switch7" />
                                <label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Business account</span>
                                <input type="checkbox" id="switch8" />
                                <label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Show me online</span>
                                <input type="checkbox" id="switch9" />
                                <label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Delete history</span>
                                <input type="checkbox" id="switch10" />
                                <label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Expose author name</span>
                                <input type="checkbox" id="switch11" />
                                <label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div><!-- responsive header -->

        <div class="topbar stick">
            <div class="logo">
                <a title="" :href="'/newsfeed'"><img :src="'/goweb/images/logo.png'" alt=""></a>
            </div>

            <div class="top-area">
                <ul class="main-menu">
                    <li>
                        <router-link :to="{name: 'Timeline', params: {username: authUser.username }}">
                            <template v-if="authUser !== null && authUser.profile_photo">
                                <img :src="'/storage/images/'+authUser.profile_photo" :alt="authUser.name" class="auth-avatar">
                            </template>
                            <template v-else>
                                <img :src="'/goweb/images/avatar.png'" class="auth-avatar" :alt="authUser.name">
                            </template>
                            {{ authUser.name }}
                        </router-link>

                    </li>
                </ul>
                <ul class="setting-area">
                    <li>
                        <a href="#" title="Home" data-ripple=""><i class="ti-search"></i></a>
                        <div class="searched">
                            <form method="post" class="form-search">
                                <input type="text" placeholder="Search Friend">
                                <button data-ripple><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </li>
                    <router-link :to="{name: 'NewsFeed'}"><i class="ti-home"></i></router-link>
                    <li>
                        <a href="#" title="Friend Request" data-ripple="">
                            <i class="ti-user"></i><span class="text-danger">{{ requestFriends.length > 0 ? requestFriends.length:'' }}</span>
                        </a>
                        <div class="dropdowns">
                            <span>{{ requestFriends.length }} Friends Requested</span>
                            <ul class="drops-menu">
                                <li v-for="requestFriend in requestFriends">
                                    <a>
                                        <router-link :to="{name: 'Timeline', params: {username: requestFriend.username}}">
                                            <template v-if="requestFriend.profile_photo !== null">
                                                <img :src="'/storage/images/'+requestFriend.profile_photo " :alt="requestFriend.name">
                                            </template>
                                            <template v-else>
                                                <img :src="'/goweb/images/avatar.png'" :alt="requestFriend.name">
                                            </template>
                                        </router-link>

                                        <div class="mesg-meta">
                                            <router-link :to="{name: 'Timeline', params: {username: requestFriend.username}}">
                                                <h6>{{ requestFriend.name }}</h6>
                                            </router-link>
                                            <a @click="acceptRequest(requestFriend.friendId)" class="underline text-success" style="cursor: pointer">Accept</a>
                                            <a @click="removeRequest(requestFriend.friendId)" class="underline text-danger pull-right" style="cursor: pointer">Remove</a>
                                        </div>
                                    </a>
                                </li>


                            </ul>

                            <a href="#" title="" class="more-mesg">view more</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" title="Notification" data-ripple="">
                            <i class="ti-bell"></i><span>20</span>
                        </a>
                        <div class="dropdowns">
                            <span>4 New Notifications</span>
                            <ul class="drops-menu">
                                <li>
                                    <a href="#" title="">
                                        <img :src="'/goweb/images/resources/thumb-1.jpg'" alt="">
                                        <div class="mesg-meta">
                                            <h6>sarah Loren</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag green">New</span>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <img :src="'/goweb/images/resources/thumb-2.jpg'" alt="">
                                        <div class="mesg-meta">
                                            <h6>Jhon doe</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag red">Reply</span>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <img :src="'/goweb/images/resources/thumb-3.jpg'" alt="">
                                        <div class="mesg-meta">
                                            <h6>Andrew</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag blue">Unseen</span>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <img :src="'/goweb/images/resources/thumb-4.jpg'" alt="">
                                        <div class="mesg-meta">
                                            <h6>Tom cruse</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag">New</span>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <img :src="'/goweb/images/resources/thumb-5.jpg'" alt="">
                                        <div class="mesg-meta">
                                            <h6>Amy</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag">New</span>
                                </li>
                            </ul>
                            <a href="#" title="" class="more-mesg">view more</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span>12</span></a>
                        <div class="dropdowns">
                            <span>5 New Messages</span>
                            <ul class="drops-menu">
                                <li>
                                    <a href="#" title="">
                                        <img :src="'/goweb/images/resources/thumb-1.jpg'" alt="">
                                        <div class="mesg-meta">
                                            <h6>sarah Loren</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag green">New</span>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <img :src="'/goweb/images/resources/thumb-2.jpg'" alt="">
                                        <div class="mesg-meta">
                                            <h6>Jhon doe</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag red">Reply</span>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <img :src="'/goweb/images/resources/thumb-3.jpg'" alt="">
                                        <div class="mesg-meta">
                                            <h6>Andrew</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag blue">Unseen</span>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <img :src="'/goweb/images/resources/thumb-4.jpg'" alt="">
                                        <div class="mesg-meta">
                                            <h6>Tom cruse</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag">New</span>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <img :src="'/goweb/images/resources/thumb-5.jpg'" alt="">
                                        <div class="mesg-meta">
                                            <h6>Amy</h6>
                                            <span>Hi, how r u dear ...?</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag">New</span>
                                </li>
                            </ul>
                            <a href="messages.html" title="" class="more-mesg">view more</a>
                        </div>
                    </li>
                    <li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i></a>
                        <div class="dropdowns languages">
                            <a href="#" title=""><i class="ti-check"></i>English</a>
                            <a href="#" title="">Arabic</a>
                            <a href="#" title="">Dutch</a>
                            <a href="#" title="">French</a>
                        </div>
                    </li>
                </ul>
                <div class="user-img">
                    <template v-if="authUser !== null && authUser.profile_photo">
                        <img :src="'/storage/images/'+authUser.profile_photo" :alt="authUser.name" class="auth-avatar">
                    </template>
                    <template v-else>
                        <img :src="'/goweb/images/avatar.png'" class="auth-avatar" :alt="authUser.name">
                    </template>
                    <span class="status f-online"></span>
                    <div class="user-setting">
                        <a href="#" title=""><span class="status f-online"></span>online</a>
                        <a href="#" title=""><span class="status f-away"></span>away</a>
                        <a href="#" title=""><span class="status f-off"></span>offline</a>
                        <a href="#" title=""><i class="ti-user"></i> view profile</a>
                        <a href="#" title=""><i class="ti-pencil-alt"></i>edit profile</a>
                        <a href="#" title=""><i class="ti-target"></i>activity log</a>
                        <a href="#" title=""><i class="ti-settings"></i>account setting</a>
                        <a :href="ApiUrl+'user-logout'"><i class="ti-power-off"></i>log out</a>
                    </div>
                </div>
                <span class="ti-menu main-menu" data-ripple=""></span>
            </div>
        </div><!-- topbar -->
    </div>
</template>

<script>
    export default {
        /*components: {

        },*/
        data() {
            return {
                authUser: window.authUser,
                requestFriends: [],

            }
        },
        mounted() {
            this.getFriendRequests();
        },

        methods: {
            getFriendRequests(){
                var _this = this;
                axios.post(_this.ApiUrl+'get-friendship', {request_type: 'request'})
                    .then(response => response.data)
                    .then(response => {
                        _this.requestFriends = response.friendship;
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },

            acceptRequest(friendId){
                let _this = this;
                axios.post(_this.ApiUrl+'accept-request', {friendId:friendId})
                    .then(response => response.data)
                    .then(response => {
                        if (response.status === 200){
                            _this.getFriendRequests();
                            _this.$toastr.s(response.message, "Success !!");
                        }
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },

            removeRequest(friendId){
                var _this = this;
                axios.post(_this.ApiUrl+'remove-request', {friendId:friendId})
                    .then(response => response.data)
                    .then(response => {
                        if (response.status === 200){
                            _this.getFriendRequests();
                            _this.$toastr.i(response.message, "Removed !!");
                        }
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },
        }
    }
</script>
