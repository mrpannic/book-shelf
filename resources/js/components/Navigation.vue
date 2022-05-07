<template>
<div class="flex justify-between nav uppercase items-center background">
    <div class="flex justify-start text-xl title">
        Book Shelf
    </div>
    <div class="flex justify-end mr-10 buttons">
        <div class="mr-5 text-lg cursor-pointer" @click="$router.replace({name : 'home'})">Home</div>
        <div class="text-lg cursor-pointer" @click="logout">Logout</div>
    </div>
        
</div>
</template>

<script>
export default {
    methods:{
        logout(){
            localStorage.removeItem('token')
            this.$router.replace({name : 'login'})
        }
    }
}
</script>

<style>
    .nav {
        width: 100%;
        height: 100px;
        background-color: #1f2937;
        color: white;
    }
    .title {
        margin-left: 20rem;
    }
    .buttons {
        margin-right: 20rem
    }
</style>