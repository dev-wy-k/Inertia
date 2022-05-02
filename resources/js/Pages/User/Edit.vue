<template>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <h1 class="text-primary mb-3">Edit User</h1>

                <user-form :user="user" :errors="errors" @submit="submit"></user-form>

            </div>
        </div>
    </div>
</template>

<script>
    import  UserForm  from "./UserForm";
    
    export default {
        components: { UserForm },
        props: ['user', 'errors'],          
        methods: {
            submit(form) {
                this.$inertia.put(`/user/${this.user.id}`, form);
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>