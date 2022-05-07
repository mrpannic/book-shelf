<template>
<div>
  <div class="flex justify-center  align-center import-file mt-10">
        <input type="file" id="file" name="file" accept=".csv, .xlss .xml">
    </div>
    <div class="flex justify-center align-center books-box mt-10 py-10">
        <Books ref="books"/>
    </div>
    </div>
</template>

<script>
import Books from './Books.vue'
export default {
    name: 'Home',
    methods:{
        logout(){
            localStorage.removeItem('token')
            this.$router.replace({name : 'login'})
        }
    },
    components: {
        Books
    }
}
</script>

<style>
    .books-box {
        background: #1f2937;
    }
    .import-file{
        padding: 20px 30px;
        background: #1f2937;
    }
    .import-file input[type=file] {
        color: white;
        margin-left: 5px;
    }
    input#file::file-selector-button {
        background: #1f2937;
        color: white;
        border: 1px solid white;
        padding: 10px 20px;
    }
</style>