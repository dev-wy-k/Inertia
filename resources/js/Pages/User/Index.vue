<template>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">

                <h1>User List</h1>

                <p class="alert alert-warning my-3" v-if="success">{{ success }}</p>

                <div class="row my-3">
                    <div class="col">
                        <Link href="/user/create" class="btn btn-primary">Create</Link>
                    </div>

                    <div class="col-4">
                        <form @submit.prevent="submit">
                            <div class="input-group mb-3">
                                <input type="text" v-model="query" class="form-control" placeholder="Search ...">
                                <button type="submit" class="input-group-text" id="basic-addon2">Search</button>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody> 
                        <tr v-for="user in users.data" :key="user.id">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.created_at }}</td>
                            <td>
                                <Link :href="`/user/${user.id}/edit`" class="btn btn-success">Edit</Link>
                                <button @click="destroy(user.id)" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <nav aria-label="...">
                    <ul class="pagination">
                        <li :class="['page-item', link.url === null ? 'disabled' : '', link.active ? 'active' : '']" v-for="(link, index) in users.links" :key="index">
                            <Link v-if="search_key" :href="link.url === null ? '#' : link.url+`&search=${search_key}`" class="page-link" v-html="link.label"></Link>

                            <Link v-else :href="link.url === null ? '#' : link.url" class="page-link" v-html="link.label"></Link>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['users', 'success', 'search_key'],
        data() {
            return {
                query: this.search_key
            }
        },
        methods: {
            submit(){
                this.$inertia.get(`/user?search=${this.query}`)
            },
            destroy(id) {
                this.$inertia.delete(`/user/${id}`);
            },
        },
        
    }
</script>

<style lang="scss" scoped>

</style>