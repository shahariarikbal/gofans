<template>
    <div>
        <div class="central-meta">
            <div class="frnds">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="active" @click="getMyFriends()" href="#frends" data-toggle="tab">My Friends</a> <span>{{ myFriends.length }}</span></li>
                    <li class="nav-item"><a class="" @click="getFriendship('request')" href="#frends-req" data-toggle="tab">Friend Requests</a><span>{{ requestFriends.length }}</span></li>
                    <li class="nav-item"><a class="" href="#my-req" data-toggle="tab">My Requests</a><span>{{ myFriendRequests.length }}</span></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active fade show " id="frends" >
                        <ul class="nearby-contct">
                            <li v-for="myFriend in myFriends">
                                <div class="nearly-pepls">
                                    <figure>
                                        <router-link :to="{name: 'Timeline', params: {username: myFriend.username}}">
                                            <template v-if="myFriend.profile_photo !== null">
                                                <img :src="'/storage/images/'+myFriend.profile_photo " :alt="myFriend.name">
                                            </template>
                                            <template v-else>
                                                <img :src="'/goweb/images/avatar.png'" :alt="myFriend.name">
                                            </template>
                                        </router-link>
                                    </figure>
                                    <div class="pepl-info">
                                        <h4>
                                            <router-link :to="{name: 'Timeline', params: {username: myFriend.username}}">
                                                {{ myFriend.name }}
                                            </router-link>
                                        </h4>
                                        <span>ftv model</span>
                                        <a style="cursor: pointer" @click="removeRequest(myFriend.friendId)" title="" class="add-butn more-action text-white">unfriend</a>
                                        <a style="cursor: pointer" @click="blockFriend(myFriend.friendId)" title="" class="add-butn text-white">Block</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
<!--                        <div class="lodmore"><button class="btn-view btn-load-more"></button></div>-->
                    </div>
                    <div class="tab-pane fade" id="frends-req" >
                        <ul class="nearby-contct">
                            <li v-for="requestFriend in requestFriends">
                                <div class="nearly-pepls">
                                    <figure>
                                        <router-link :to="{name: 'Timeline', params: {username: requestFriend.username}}">
                                            <template v-if="requestFriend.profile_photo !== null">
                                                <img :src="'/storage/images/'+requestFriend.profile_photo " :alt="requestFriend.name">
                                            </template>
                                            <template v-else>
                                                <img :src="'/goweb/images/avatar.png'" :alt="requestFriend.name">
                                            </template>
                                        </router-link>
                                    </figure>
                                    <div class="pepl-info">
                                        <h4>
                                            <router-link :to="{name: 'Timeline', params: {username: requestFriend.username}}">
                                                {{ requestFriend.name }}
                                            </router-link>
                                        </h4>
                                        <span>ftv model</span>
                                        <a style="cursor: pointer" @click="removeRequest(requestFriend.friendId)" title="" class="add-butn text-white more-action" data-ripple="">delete Request</a>
                                        <a style="cursor: pointer" @click="acceptRequest(requestFriend.friendId)" title="" class="add-butn text-white" data-ripple="">Confirm</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
<!--                        <button class="btn-view btn-load-more"></button>-->
                    </div>
                    <div class="tab-pane fade" id="my-req" >
                        <ul class="nearby-contct">
                            <li v-for="myFriendRequest in myFriendRequests">
                                <div class="nearly-pepls">
                                    <figure>
                                        <router-link :to="{name: 'Timeline', params: {username: myFriendRequest.username}}">
                                            <template v-if="myFriendRequest.profile_photo !== null">
                                                <img :src="'/storage/images/'+myFriendRequest.profile_photo " :alt="myFriendRequest.name">
                                            </template>
                                            <template v-else>
                                                <img :src="'/goweb/images/avatar.png'" :alt="myFriendRequest.name">
                                            </template>
                                        </router-link>
                                    </figure>
                                    <div class="pepl-info">
                                        <h4>
                                            <router-link :to="{name: 'Timeline', params: {username: myFriendRequest.username}}">
                                                {{ myFriendRequest.name }}
                                            </router-link>
                                        </h4>
                                        <span>ftv model</span>
                                        <a style="cursor: pointer" @click="removeRequest(myFriendRequest.friendId)" title="" class="add-butn more-action text-white">Cancel Request</a>
                                        <a style="cursor: pointer" @click="blockFriend(myFriendRequest.friendId)" title="" class="add-butn text-white">Block</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!--                        <button class="btn-view btn-load-more"></button>-->
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
                username: this.$route.params.username,
                authUser: window.authUser,
                requestFriends: [],
                myFriends: [],
                myFriendRequests: [],
            }
        },
        mounted() {
            this.getFriendship('request');
            this.getMyFriends();
            this.getMyFriendRequest();
        },

        methods: {
            getFriendship(type){
                var _this = this;
                axios.post(_this.ApiUrl+'get-friendship', {request_type: type, username: _this.username})
                    .then(response => response.data)
                    .then(response => {
                        if (type === 'accept'){
                            _this.myFriends = response.friendship;
                        }else {
                            _this.requestFriends = response.friendship;
                        }
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },

            getMyFriends(){
                var _this = this;
                axios.post(_this.ApiUrl+'get-my-friends', {username: _this.username})
                    .then(response => response.data)
                    .then(response => {
                        _this.myFriends = response.friendship;
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },

            getMyFriendRequest(){
                var _this = this;
                axios.post(_this.ApiUrl+'get-my-friend-requests', {username: _this.username})
                    .then(response => response.data)
                    .then(response => {
                        _this.myFriendRequests = response.friendship;
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
                            _this.getMyFriends();
                            _this.getMyFriendRequest();
                            _this.getFriendship('request');
                            _this.$toastr.i(response.message, "Unfriend !!");
                        }
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },

            blockFriend(friendId){
                var _this = this;
                axios.post(_this.ApiUrl+'block-friend', {friendId:friendId})
                    .then(response => response.data)
                    .then(response => {
                        if (response.status === 200){
                            _this.getMyFriends();
                            _this.getMyFriendRequest();
                            _this.$toastr.w(response.message, "Blocked !!");
                        }
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
                            _this.getMyFriends();
                            _this.getFriendship('request');
                            _this.$toastr.s(response.message, "Success !!");
                        }
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },
        },

        updated() {

        }

    }
</script>

