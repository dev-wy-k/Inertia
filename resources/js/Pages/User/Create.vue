<template>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <h1 class="text-primary mb-3">Create User</h1>

                <!-- <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input v-model="form.name" class="form-control" :class="{'is-invalid' : errors.name }" type="text" id="name">
                        <div v-if="errors.name" class="invalid-feedback">{{ errors.name }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="e-mail">E-mail</label>
                        <input v-model="form.email" class="form-control" :class="{'is-invalid' : errors.email }" type="email" id="e-mail">
                        <div v-if="errors.email" class="invalid-feedback">{{ errors.email }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input v-model="form.password" class="form-control" :class="{'is-invalid' : errors.password }" type="password" id="password">
                        <div v-if="errors.password" class="invalid-feedback">{{ errors.password }}</div>
                    </div>
                    <div class="mb-3">
                        <Link href="/user" class="btn btn-outline-secondary">Back</Link>
                        <button type="submit" class="btn btn-primary float-end">Create</button>
                    </div>
                </form> -->

                <user-form :user="user" :errors="errors" @submit="submit"></user-form>

            </div>
        </div>
    </div>
</template>

<script>
import UserForm from "../User/UserForm"

    export default {
        components: { UserForm },
        props: ['user', 'errors'],
        methods: {
            submit(form) {
                this.$inertia.post('/user', form);
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>