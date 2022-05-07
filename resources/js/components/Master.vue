<template>
<div>
    <Navigation />
    <Home v-if="$route.name === 'home'"/>
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
    }
}
</script>

<style scoped>


</style>