<template>
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item set-tab">
                    <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">User info</a>
                </li>
                <li class="nav-item set-tab">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Email</a>
                </li>
                <li class="nav-item set-tab">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Password</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active m-l" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form action="" method="post" @submit.prevent="userInfo()">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" v-model="username" class="form-control info-border">
                            <small class="text-danger" id="usernameValidation">{{ usernameError }}</small>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" v-model="name" class="form-control info-border">
                            <small class="text-danger" id="nameValidation">{{ nameError }}</small>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile_number" v-model="mobile_number" class="form-control info-border">
                            <small class="text-danger" id="phoneValidation">{{ phoneError }}</small>
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </form>
                </div>
                <div class="tab-pane fade m-l" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form action="" method="post" @submit.prevent="userEmail()">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" v-model="email" class="form-control info-border">
                            <small class="text-danger" id="emailValidation">{{ emailError }}</small>
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </form>
                </div>
                <div class="tab-pane fade m-l" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <form action="" method="post" @submit.prevent="userPassword()">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="old_password" v-model="old_password" class="form-control info-border">
                            <small class="text-danger" id="oldPasswordValidation">{{ oldPasswordError }}</small>
                            <small class="text-success" id="oldPasswordSuccessValidation">{{ oldPasswordSuccess }}</small>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" id="password" name="password" v-model="password" class="form-control info-border">
                            <small class="text-danger" id="passwordValidation">{{ passwordError }}</small>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input class="form-control input-group-lg" type="password" name="password_confirmation" v-model="password_confirmation" title="Enter Confirm Password" placeholder="* Confirm Password" />
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            settings : [],
            id: '',
            name: '',
            username: this.$route.params.username,
            authUser: window.authUser,
            mobile_number: '',
            email: '',
            old_password: '',
            password: '',
            password_confirmation: '',

            passwordError: '',
            oldPasswordError: '',
            oldPasswordSuccess: '',
            emailError: '',
            phoneError: '',
            nameError: '',
            usernameError: '',
            errorCount: 0,
        }
    },
    created() {
        var _this = this;
        axios.post(_this.ApiUrl+'profile-setting', {username: _this.username })
            .then(response => response.data)
            .then(response => {
                _this.id = response.setting.id;
                _this.name = response.setting.name;
                _this.username = response.setting.username;
                _this.mobile_number = response.setting.mobile_number;
                _this.email = response.setting.email;
            })
            .catch(error => {
                console.log('Team User api not working !!')
            });
    },
    methods: {
        userInfo() {
            let _this = this;
            axios.post(_this.ApiUrl + 'profile-setting-update/' + _this.id, {
                username: _this.username,
                name: _this.name,
                mobile_number: _this.mobile_number,
            }).then(response => {
                if (response.status === 200){
                    _this.$toastr.s("Your Profile update successfully", "Success !!");
                }
            }).catch(error => {
                if (error.response.status === 422) {
                    if (error.response.data.errors.username && error.response.data.errors.username.length > 0) {
                        this.usernameError = error.response.data.errors.username[0]
                    }
                    if (error.response.data.errors.name && error.response.data.errors.name.length > 0) {
                        this.nameError = error.response.data.errors.name[0]
                    }
                    if (error.response.data.errors.mobile_number && error.response.data.errors.mobile_number.length > 0) {
                        this.phoneError = error.response.data.errors.mobile_number[0]
                    }
                }
            })
        },
        userEmail() {
            let _this = this;
            axios.post(_this.ApiUrl + 'profile-setting-update/' + _this.id, {
                email: _this.email,
            }).then(response => {
                if (response.status === 200){
                    _this.$toastr.s("Your Email update successfully", "Success !!");
                }
            }).catch(error => {
                if (error.response.status === 422) {
                    if (error.response.data.errors.email && error.response.data.errors.email.length > 0) {
                        this.emailError = error.response.data.errors.email[0]
                    }
                }
            })
        },

        userPassword() {
            let _this = this;
            axios.post(_this.ApiUrl + 'profile-setting-update/' + _this.id, {
                password: _this.password,
            }).then(response => {
                if (response.status === 200){
                    _this.$toastr.s("Your Password update successfully", "Success !!");
                }
            }).catch(error => {
                if (status.error === 500) {
                    _this.$toastr.s("Old Password dose not match", "error !!");
                }
                if (error.response.status === 422) {
                    if (error.response.data.errors.password && error.response.data.errors.password.length > 0) {
                        this.passwordError = error.response.data.errors.password[0]
                    }
                }
            })
        }
    }
}
</script>

<style scoped>
.nav-pills .nav-link.active, .nav-pills .show>.nav-link{
    background-color: #088dcd!important;
    color: white;
    border-radius: 10px 10px 0 0
}
.set-tab {
    width: 180px;
    background-color: #088dcd;
    border-radius: 10px 10px 0 0;
    color: white;
    margin-left: 10px;
}
.info-border{
    border-bottom: 1px solid lightslategray;
}

.m-l{
    margin-left: 50px;
}
</style>
