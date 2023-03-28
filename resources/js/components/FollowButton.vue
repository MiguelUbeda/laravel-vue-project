<template>
    <div class="container">
         <button class="btn btn-primary ms-3 mb-2" @click="followUser">Follow this user</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            followUser() {
                alert('inside');  
            }
        }
    }
</script>
