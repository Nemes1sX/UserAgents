<template>
    <div>
        <h3 class="text-center">All Users</h3><br/>
        <router-link :to="{name: 'user.create'}" class="btn btn-success">Add User</router-link>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>
                    <a href="#" @click.prevent="change_sort('nam')">Name</a>
                    <span v-if="this.params.sort_field == 'id' && this.params.sort_direction == 'asc'">&#8593;</span>
                    <span v-if="this.params.sort_field == 'id' && this.params.sort_direction == 'desc'">&#8595;</span>
                </th>
                <th>
                    <a href="#" @click.prevent="change_sort('email')">Email</a>
                    <span v-if="this.params.sort_field == 'name' && this.params.sort_direction == 'asc'">&#8593;</span>
                    <span v-if="this.params.sort_field == 'name' && this.params.sort_direction == 'desc'">&#8595;</span>
                </th>
                <th>
                    <a href="#" @click.prevent="change_sort('address')">Address</a>
                    <span v-if="this.params.sort_field == 'description' && this.params.sort_direction == 'asc'">&#8593;</span>
                    <span v-if="this.params.sort_field == 'description' && this.params.sort_direction == 'desc'">&#8595;</span>
                </th>
                <th>
                    <a href="#" @click.prevent="change_sort('phone')">Phone</a>
                    <span v-if="this.params.sort_field == 'status' && this.params.sort_direction == 'asc'">&#8593;</span>
                    <span v-if="this.params.sort_field == 'status' && this.params.sort_direction == 'desc'">&#8595;</span>
                </th>
                <th>
                    <a href="#" @click.prevent="change_sort('agent_name')">Agent name</a>
                    <span v-if="this.params.sort_field == 'status' && this.params.sort_direction == 'asc'">&#8593;</span>
                    <span v-if="this.params.sort_field == 'status' && this.params.sort_direction == 'desc'">&#8595;</span>
                </th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td><router-link :to="{name: 'user.show', params: {user: user.id}}">{{ user.name }}</router-link></td>
                <td>{{ user.email }}</td>
                <td>{{ user.address }}</td>
                <td>{{ user.phone}}</td>
                <td>{{ user.agent }}</td>
                <td>{{ user.created_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'user.edit', params: { user: user.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import moment from 'moment';


export default {

    data() {
        return {
            users: [],
            params: {
                sort_field: 'name',
                sort_direction: 'desc'
            }
        }
    },
    mounted(){
        this.getUsers()
    },

    watch:{
        params: {
            handler(){
                this.getUsers();
            },
            deep: true
        },
    },
    methods: {
        getUsers() { //Fetch tasks
            this.axios
                .get('http://127.0.0.1:8000/api/user')
                    //{ params: {...this.params}})
                .then(response => {
                    //console.log(response.data);
                    this.users = response.data.data;
                    console.log(this.users);
                });
        },
        deleteUser(id) {
            this.axios
                .delete(`http://127.0.0.1:8000/api/task/delete/${id}`)
                .then()
                .catch(error => {
                    console.log(error)
                })
                .finally(() => this.loading = false)
        },
        change_sort(field){
            if (this.params.sort_field === field) {
                this.params.sort_direction = this.params.sort_direction === 'asc' ? 'desc' : 'asc';
            }
            else {
                this.params.sort_field = field;
                this.params.sort_direction = 'asc';
            }
        },
    }
}

</script>

<style scoped>

</style>
