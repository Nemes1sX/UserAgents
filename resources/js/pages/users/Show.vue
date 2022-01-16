<template>
    <div class="card">
        <div class="card-header">
            {{ user.name}}
        </div>
        <div class="card-body">
            <h4>User name: {{ user.name}}</h4>
            <p>Agent name: {{user.agent}}</p>
            <p>Age: {{ user.age }}</p>
            <p>Email: {{ user.email}}</p>
            <p>Address: {{ user.address}}</p>
            <p>Phone: {{ user.phone}}</p>
        </div>
    </div>
    <router-link class="float-left btn-warning" :to="{name: 'user'}">Back</router-link>
    <router-link class="float-right btn-danger" :to="{name: 'user', params: {user: user.id}}">Delete</router-link>
</template>

<script>
export default {
    name: "Show",
    data(){
        return{
            user: [],
        }
    },
    created(){
        this.axios
            .get(`http://127.0.0.1:8000/api/user/${this.$route.params.user}`)
            .then(response =>{
                this.user = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
            .finally(() => this.loading = false)
    },
}
</script>

<style scoped>

</style>
