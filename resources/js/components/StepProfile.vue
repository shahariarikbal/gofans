<template>
    <div>
        <div class="theme-layout">
            <div class="container-fluid pdng0">
                <div class="row merged">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="land-featurearea" style="height: 100%">
                            <div class="land-meta">
                                <h1>Make Cool Friends !!!</h1>
                                <p>
                                    Friend Finder is a social network template that can be used to connect people.
                                    The template offers Landing pages, News Feed, Image/Video Feed, Chat Box,
                                    Timeline and lot more. <br />
                                    <br />Why are you waiting for? Buy it now.
                                </p>
                                <div class="friend-logo">
                                    <span><img :src="'/goweb/images/wink.png'" alt=""></span>
                                </div>
                                <a href="#" title="" class="folow-me">Follow Us on</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="login-reg-bg" style="height: 100%">
                            <div class="container-fluid" style="margin: 20px">
                                <div class="card" style="padding: 30px;">
                                    <h2 id="heading">Update your account information</h2>
                                    <p>Fill all form field to go to next step</p>
                                    <form id="msform">
                                        <!-- progressbar -->
                                        <ul id="progressbar">
                                            <li class="active" id="account"><strong>Address</strong></li>
                                            <li :class="user.profile_step_count > 0 ? 'active' : null" id="payment"><strong>Image</strong></li>
                                            <li :class="user.profile_step_count > 1 ? 'active' : null" id="personal"><strong>About</strong></li>
                                            <li :class="user.profile_step_count > 2 ? 'active' : null"  id="friend"><strong>Friend</strong></li>
                                        </ul>
                                        <div class="progress">
                                            <div v-if="user.profile_step_count === 0" style="width: 25%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div v-if="user.profile_step_count === 1" style="width: 50%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div v-if="user.profile_step_count === 2" style="width: 75%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div v-if="user.profile_step_count === 3 || user.profile_step_count === 4" style="width: 100%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> <br> <!-- fieldsets -->

                                        <fieldset :class="user.profile_step_count === 0 ? 'displayBlock' : 'displayNone'">
                                            <form @submit.prevent="userInfoUpdate()">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="fs-title">Address Information:</h2>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps">Step 1 - 4</h2>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="fieldlabels">Address: *</label>
                                                            <input type="text" class="mb-0" v-model="userProfileInfo.address" name="address" placeholder="Enter your address" />
                                                            <small class="text-danger" v-if="errors.address">{{errors.address[0]}}</small>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="fieldlabels">City: *</label>
                                                            <input type="text" class="mb-0" v-model="userProfileInfo.city" name="city" placeholder="Enter your city" />
                                                            <small class="text-danger" v-if="errors.city">{{errors.city[0]}}</small>
                                                        </div>

                                                        <div class="col-md-12 mt-3">
                                                            <label class="fieldlabels">Country: *</label>
                                                            <select class="form-control" name="country" v-model="userProfileInfo.country">
                                                                <option v-for="contury in countries" :selected="contury === current_country"  :value="contury">{{ contury }}</option>
                                                            </select>
                                                            <small class="text-danger" v-if="errors.country">{{errors.country[0]}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="action-button">Next</button>
                                            </form>
                                        </fieldset>
                                        <fieldset :class="user.profile_step_count === 1 ? 'displayBlock' : 'displayNone'">
                                            <form @submit.prevent="userInfoUpdate()">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="fs-title">Update profile photo & cover photo:</h2>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps">Step 2 - 4</h2>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="fieldlabels">Upload profile Photo: *</label>
                                                            <input class="mb-0" type="file" @change="showProfilePhoto($event, 'profile')" id="profilePhoto"  name="profile" accept="image/*">
                                                            <img :src="profile_photo" width="200px" class="fa-pull-left img-thumbnail"/>
                                                            <small class="text-danger" v-if="errors.profilePhoto">{{errors.profilePhoto[0]}}</small>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="fieldlabels">Upload cover Photo:</label>
                                                            <input class="mb-0" @change="showProfilePhoto($event, 'cover')" type="file" id="coverPhoto" name="cover" accept="image/*">
                                                            <img :src="cover_photo" width="200px" class="fa-pull-left img-thumbnail"/>
                                                            <small class="text-danger" v-if="errors.coverPhoto">{{errors.coverPhoto[0]}}</small>
                                                        </div>

                                                        <div class="col-md-12 mt-3">
                                                            <label class="fieldlabels">Upload NID/Passport/Driving License Photo:</label>
                                                            <input class="mb-0" @change="showProfilePhoto($event, 'others')" type="file" id="othersPhoto" name="others_photo" accept="image/*">
                                                            <img :src="other_photo" width="200px" class="fa-pull-left img-thumbnail"/>
                                                        </div>

                                                    </div>
                                                </div>
                                                <button type="submit" class="action-button">Next</button>
                                            </form>

                                        </fieldset>
                                        <fieldset :class="user.profile_step_count === 2 ? 'displayBlock' : 'displayNone'">
                                            <form @submit.prevent="userInfoUpdate()">
                                                <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">About Yourself:</h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Step 3 - 4</h2>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="fieldlabels">About Yourself: *</label>
                                                        <textarea class="mb-0" v-model="userProfileInfo.about_me" name="about" placeholder="About Yourself"></textarea>
                                                        <small class="text-danger" v-if="errors.about_me">{{errors.about_me[0]}}</small>
                                                    </div>

                                                    <div class="col-md-12 mt-3">
                                                        <label class="fieldlabels">Add Academic Details</label>
                                                        <textarea class="mb-0" v-model="userProfileInfo.education" name="academic" placeholder="Add Academic Details"></textarea>
                                                    </div>

                                                    <div class="col-md-12 mt-3">
                                                        <label  class="fieldlabels">Add Professional Details</label>
                                                        <textarea class="mb-0" v-model="userProfileInfo.career"  name="professional" placeholder="Add Academic Details"></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                                <button type="submit" class="action-button">Next</button>
                                            </form>
                                        </fieldset>
                                        <fieldset :class="user.profile_step_count === 3 || user.profile_step_count === 4 ? 'displayBlock' : 'displayNone'">
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">Friend Suggestion:</h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Step 4 - 4</h2>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <aside class="sidebar static">
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
                                                                        </template>
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div><!-- who's following -->
                                                        </aside>
                                                    </div>
                                                </div>
                                            </div>
                                            <a v-if="user.profile_step_count === 4" :href="'/newsfeed'" style="text-align: center;" class="action-button">Finish</a>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bottombar bg-white p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="timeline-info text-right m-0">
                                <span class="copyright">© goFans 2020. All rights reserved.</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="timeline-info text-right m-0">
                                <ul>
                                    <li>
                                        <a href="#" title="Privacy Policy" data-ripple="">Privacy Policy</a>
                                        <a href="#" title="Terms and Services" data-ripple="">Terms and Services</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                authUser: window.authUser,
                user: '',
                countries : [],
                errors : [],
                current_country : null,
                progress : 20,
                userProfileInfo:{
                    address:'',
                    city:'',
                    country:'',
                    about_me:'',
                    education:'',
                    career:'',
                },
                profile_photo:'',
                cover_photo:'',
                other_photo:'',
                suggestFriends:'',

            }
        },
        mounted() {
            this.getCountries();
            this.getUser();
            this.getSuggestFriends();
        },

        methods: {

            getCountries(){
                var _this = this;
                axios.get(_this.ApiUrl+'get-countries')
                    .then(response => response.data)
                    .then(response => {
                        _this.countries = response.country.countries;
                        _this.current_country = response.country.current_country;
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },

            showProfilePhoto(e, imgType) {
                if (e.target.files[0]) {
                    let image = e.target.files[0];
                    if(image['type'] === 'image/jpeg' || image['type'] === 'image/png' || image['type'] === 'image/webp' || image['type'] === 'image/gif'){
                        let reader = new FileReader();
                        reader.readAsDataURL(image);
                        reader.onload = e => {
                            if (imgType === 'profile'){
                                this.profile_photo = e.target.result;
                            }else if (imgType === 'cover') {
                                this.cover_photo = e.target.result;
                            }else {
                                this.other_photo = e.target.result;
                            }
                        }
                    }else{
                        this.$toastr.e("This file not an Image", 'Error !!');
                    }

                }
            },

            userInfoUpdate(){
                let _this = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                };
                let postData = new FormData ();
                let profilePhoto = document.getElementById("profilePhoto").files[0];
                let coverPhoto = document.getElementById("coverPhoto").files[0];
                let othersPhoto = document.getElementById("othersPhoto").files[0];

                postData.append('profilePhoto', profilePhoto);
                postData.append('coverPhoto', coverPhoto);
                postData.append('othersPhoto', othersPhoto);
                postData.append('address', _this.userProfileInfo.address);
                postData.append('city', _this.userProfileInfo.city);
                postData.append('country', _this.userProfileInfo.country);
                postData.append('about_me', _this.userProfileInfo.about_me);
                postData.append('education', _this.userProfileInfo.education);
                postData.append('career', _this.userProfileInfo.career);

                axios.post(_this.ApiUrl+'update-user-profile',  postData , config)
                    .then(response => response.data)
                    .then(response => {
                        if(response.status === 200){
                            _this.$toastr.s(response.message, 'Successfully !!');
                            _this.errors = [];
                            _this.getUser()
                        }else{
                            _this.errors = response.error;
                        }
                    })
                    .catch(error => {
                        console.log('Team User api not working !!')
                    });
            },

            getUser(){
                var _this = this;
                axios.post(_this.ApiUrl+'get-user', {username: _this.authUser.username })
                    .then(response => response.data)
                    .then(response => {
                        _this.user = response.user;
                    })
                    .catch(error => {
                        console.log('Team User api not working !!')
                    });
            },

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
                axios.post(_this.ApiUrl+'add-friend', {receiver_id:receiverId, type: 'step_profile'})
                    .then(response => response.data)
                    .then(response => {
                        if (response.status === 200){
                            _this.$toastr.s(response.message, "Success !!");
                            $("#addFriend"+ receiverId).hide();
                            _this.getUser()
                        }
                    })
                    .catch(error => {
                        console.log('Api not working !!')
                    });
            },
        },

    }
</script>

<style scoped>

    #heading {
        text-transform: uppercase;
        color: #1fb6ff;
        font-weight: normal
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    .form-card {
        text-align: left
    }

    #msform input,
    #msform textarea {
        padding: 8px 15px 8px 15px;
        border: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        background-color: #ECEFF1;
        font-size: 16px;
        letter-spacing: 1px
    }

    #msform input:focus,
    #msform textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #1fb6ff;
        outline-width: 0
    }

    #msform .action-button {
        width: 100px;
        background: #1fb6ff;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 0px 10px 5px;
        float: right
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        background-color: #311B92
    }

    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px 10px 0px;
        float: right
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        background-color: #000000
    }

    .card {
        z-index: 0;
        border: none;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #1fb6ff;
        margin-bottom: 15px;
        font-weight: normal;
        text-align: left
    }

    .purple-text {
        color: #1fb6ff;
        font-weight: normal
    }

    .steps {
        font-size: 25px;
        color: gray;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right
    }

    .fieldlabels {
        color: gray;
        text-align: left
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #1fb6ff
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f13e"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar #friend:before {
        font-family: FontAwesome;
        content: "\f0c0"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f030"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #1fb6ff
    }

    .progress {
        height: 20px
    }

    .displayNone{
        display: none!important;
    }

    .displayBlock{
        display: block;
    }
</style>
