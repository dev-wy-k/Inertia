<template>
    <div>
        <form @submit.prevent="submit">
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
                <button type="submit" class="btn btn-primary float-end">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['user', 'errors'],
        data() {
            return {
                form: {
                    name: this.user.name,
                    email: this.user.email,
                    password: ''
                }
            }
        },
        methods: {
            submit() {
                this.$emit('submit', this.form)
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>