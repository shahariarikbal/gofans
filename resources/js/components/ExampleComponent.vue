<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
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
                authUser: window.authUser
            }
        },
        mounted() {
            console.log(this.authUser)
        },

        created() {
            console.log(this.authUser);
        },


    }
</script>
