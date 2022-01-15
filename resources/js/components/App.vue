<template>
    <div id="main">

        <div class="container">
            <router-view></router-view>
        </div>

    </div>

</template>

<script>
import moment from 'moment'

    export default {
        name: 'App',
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>


