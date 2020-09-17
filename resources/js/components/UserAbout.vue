<template>
    <div class="card">
        <div class="card-body">
            <div>
                <span>Referral Link: </span>
                <input id="myInput" readonly="" class="form-control" :value="'http://gofans.test/register/'+ referral_code">
            </div>

            <div class="form-group">
                <label>Username :</label><br/>
                <span>{{ username }}</span>
            </div>
            <div class="form-group">
                <label>Name : </label><br/>
                <span>{{ name }}</span>
            </div>
            <div class="form-group">
                <label>Mobile Number :</label><br/>
                <span>{{ mobile_number }}</span>
            </div>
            <div class="form-group">
                <label>Email :</label><br/>
                <span>{{ email }}</span>
            </div>

            <div class="form-group">
                <label>Skype Id :</label><br/>
                <span>{{ skype_id }}</span>
            </div>
            <div class="form-group">
                <label>Education :</label><br/>
                <span>{{ education }}</span>
            </div>
            <div class="form-group">
                <label>Gender :</label><br/>
                <span>{{ gender }}</span>
            </div>
            <div class="form-group">
                <label>Date of Birth :</label><br/>
                <span>{{ date_of_birth }}</span>
            </div>
            <div class="form-group">
                <label>About Me :</label><br/>
                <span>{{ about_me }}</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            username: this.$route.params.username,
            authUser: window.authUser,
            name: '',
            email: '',
            mobile_number: '',
            referral_code: '',
            skype_id: '',
            gender: '',
            date_of_birth: '',
            education: '',
            about_me: ''
        }
    },

    created() {
        var _this = this;
        axios.post(_this.ApiUrl+'about-profile', {username: _this.username })
            .then(response => response.data)
            .then(response => {
                console.log(response)
                _this.id = response.about.id;
                _this.name = response.about.name;
                _this.mobile_number = response.about.mobile_number;
                _this.email = response.about.email;
                _this.skype_id = response.about.details.skype_id;
                _this.education = response.about.education;
                _this.gender = response.about.gender;
                _this.date_of_birth = response.about.date_of_birth;
                _this.referral_code = response.about.referral_code;
                _this.about_me = response.about.details.about_me;
            })
            .catch(error => {
                console.log('Team User api not working !!')
            });
    }
}
</script>

<style scoped>

</style>
