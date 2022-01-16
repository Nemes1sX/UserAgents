<template>
    <div class="card card-default">
        <div class="card-header">Register User</div>
        <div class="card-body">
            <div v-if="errors">
                <div class="alert alert-danger" v-for="(v, k) in errors" :key="k">
                    <b>Please correct the following error(s):</b>
                    <p v-for="error in v" :key="error" >{{ error }}</p>
                </div>
            </div>
            <form autocomplete="off" @submit.prevent="editUser">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" placeholder="Organization" v-model="user.name">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" id="email" class="form-control" placeholder="test@example.net" v-model="user.email">
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" id="address" class="form-control" placeholder="Kretingos 1" v-model="user.address">
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" id="phone" class="form-control" placeholder="564-445-5556" v-model="user.phone">
                </div>
                <div class="form-group">
                    <label for="name">Age</label>
                    <input type="number" id="age" class="form-control" placeholder="18" v-model="user.age">
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Password" v-model="user.password">
                </div>
                <div class="form-group">
                    <label for="name">Confirm password</label>
                    <input type="password" id="confirm_password" class="form-control" placeholder="Confirm password" v-model="user.confirm_password">
                </div>
                <div class="form-group">
                    <label for="agent">Agent</label>
                    <select class="form-control" v-model="user.agent_id">
                        <option v-for="agent in agents"  v-bind:value="agent.id" :key="agent.id">{{agent.username}}</option>
                    </select>
                </div>


                <button type="submit" class="w-full btn btn-default btn-primary items-center hover:bg-primary-dar form-group">Create Company</button>
                <router-link class="float-right btn-danger" :to="{name: 'user', params: {user: user.id}}">Delete</router-link>

            </form>

        </div>
    </div>
</template>

<script>
export default {
    name: "Edit",
    data() {
        return {
            user: [],
            agents: [],
            errors: []
        }
    },
    mounted() {
        this.getAgents(),
        this.getUser()
    },
    methods: {
        editUser() {
            this.axios
                .put('http://localhost:8000/api/user', this.user)
                .then(() => {
                    this.$router.push({name: 'user'})
                })
                .catch(e => {
                    if (e.response.status === 422) {
                        console.log('Hello');
                        this.errors = e.response.data.errors;
                    }
                })
                .finally(() => this.loading = false)
        },
        getAgents() {
            this.axios
                .get('http://127.0.0.1:8000/api/agents')
                .then(response => {
                    this.agents = response.data.data;
                    console.log(this.agents);
                })
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
        },
        getUser() {
            this.axios
                .get(`http://127.0.0.1:8000/api/user/${this.$route.params.user}`)
                .then(response => {
                    this.user = response.data.data;
                    console.log(this.agents);
                })
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
        }
        },
}
</script>

<style scoped>

</style>
