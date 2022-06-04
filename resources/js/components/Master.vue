<template>
<div>
    <Navigation />
    <router-view />
</div>
</template>

<script>
import Home from './Home.vue'
import Navigation from './Navigation.vue'
export default {
    name: 'Master',
    methods:{
    },
    components: {
        Navigation,
        Home
    },
    mounted(){
        this.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content
    }
}
</script>

<style scoped>


</style>