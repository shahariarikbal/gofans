<template>
    <aside class="sidebar static">
        <div class="widget widget-space-social">
            <h4 class="widget-title">Socials</h4>
            <ul class="socials">
                <li class="facebook">
                    <a title="" href="#"><i class="fa fa-facebook"></i> <span>facebook</span> <ins>45 likes</ins></a>
                </li>
                <li class="twitter">
                    <a title="" href="#"><i class="fa fa-twitter"></i> <span>twitter</span><ins>25 likes</ins></a>
                </li>
                <li class="google">
                    <a title="" href="#"><i class="fa fa-google"></i> <span>google</span><ins>35 likes</ins></a>
                </li>
            </ul>
        </div>
        <div class="widget widget-space-shortcuts">
            <h4 class="widget-title">Shortcuts</h4>
            <ul class="naves">
                <li>
                    <i class="fa fa-user"></i>
                    <router-link :to="{name: 'Timeline', params: {username: authUser.username }}">Timeline</router-link>
                </li>
                <li>
                    <i class="fa fa-users"></i>
                    <a href="inbox.html" title="">Friends</a>
                </li>
                <li>
                    <i class="fa fa-paper-plane"></i>
                    <a href="fav-page.html" title="">Offers</a>
                </li>
                <li>
                    <i class="fa fa-money"></i>
                    <a href="timeline-friends.html" title="">Earn Coins</a>
                </li>
                <li>
                    <i class="fa fa-tasks"></i>
                    <a href="timeline-photos.html" title="">My Task</a>
                </li>
                <li>
                    <i class="fa fa-outdent"></i>
                    <a href="timeline-videos.html" title="">Payout</a>
                </li>
                <li>
                    <i class="fa fa-cube"></i>
                    <a href="messages.html" title="">Referrals</a>
                </li>
                <li>
                    <i class="fa fa-life-ring"></i>
                    <a href="notifications.html" title="">Support</a>
                </li>
                <li>
                    <i class="fa fa-life-ring"></i>
                    <a href="people-nearby.html" title="">Help</a>
                </li>
                <li>
                    <i class="fa fa-life-ring"></i>
                    <a href="insights.html" title="">Setting</a>
                </li>
            </ul>
        </div><!-- Shortcuts -->
        <div class="widget">
            <h4 class="widget-title">Recent Activity</h4>
            <ul class="activitiez">
                <li>
                    <div class="activity-meta">
                        <i>10 hours Ago</i>
                        <span><a href="#" title="">Commented on Video posted </a></span>
                        <h6>by <a href="time-line.html">black demon.</a></h6>
                    </div>
                </li>
                <li>
                    <div class="activity-meta">
                        <i>30 Days Ago</i>
                        <span><a href="#" title="">Posted your status. “Hello guys, how are you?”</a></span>
                    </div>
                </li>
                <li>
                    <div class="activity-meta">
                        <i>2 Years Ago</i>
                        <span><a href="#" title="">Share a video on her timeline.</a></span>
                        <h6>"<a href="#">you are so funny mr.been.</a>"</h6>
                    </div>
                </li>
            </ul>
        </div><!-- recent activites -->
        <div class="widget stick-widget">
            <h4 class="widget-title">Who's follownig</h4>
            <ul class="followers">
                <li v-for="(friend, sfIndex) in suggestFriends">
                    <figure>
                        <router-link :to="{name: 'Timeline', params: {username: friend.username}}">
                            <template v-if="friend.profile_photo !== null">
                                <img :src="'/storage/images/'+friend.profile_photo " :alt="friend.name">
                            </template>
                            <template v-else>
                                <img :src="'/goweb/images/avatar.png'" :alt="friend.name">
                            </template>
                        </router-link>
                    </figure>
                    <div class="friend-meta">
                        <h4>
                            <router-link :to="{name: 'Timeline', params: {username: friend.username}}" :title="friend.name">{{ friend.name }}</router-link>
                        </h4>
                        <template>
                            <a :id="'addFriend'+friend.id" :title="'Add to '+friend.name" @click="addFriend(friend.id)" class="underline" style="cursor: pointer">Add Friend</a>
                            <a :id="'cancelRequest'+friend.id" :title="'Add to '+friend.name" @click="cancelRequest(friend.id)" class="underline" style="cursor: pointer; display: none">Cancel Request</a>
                        </template>
                    </div>
                </li>

            </ul>
        </div><!-- who's following -->
    </aside>

</template>

<script>
    export default {
        /*components: {

        },*/
        data() {
            return {
                authUser: window.authUser,
                suggestFriends: [],

            }
        },
        mounted() {
            this.getSuggestFriends();
        },

        methods: {
            getSuggestFriends(){
                var _this = this;
                axios.get(_this.ApiUrl+'get-suggest-friends')
                    .then(response => response.data)
                    .then(response => {
                        _this.suggestFriends = response.friends;
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
                            _this.$toastr.s(response.message, "Success !!");
                            $("#addFriend"+ receiverId).hide();
                            $("#cancelRequest"+ receiverId).show();
                        }
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },

            cancelRequest(receiverId){
                var _this = this;
                axios.post(_this.ApiUrl+'cancel-request', {receiver_id:receiverId})
                    .then(response => response.data)
                    .then(response => {
                        if (response.status === 200){
                            _this.$toastr.i(response.message, "Removed !!");
                            $("#cancelRequest"+ receiverId).hide();
                            $("#addFriend"+ receiverId).show();
                        }
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },
        }
    }
</script>
