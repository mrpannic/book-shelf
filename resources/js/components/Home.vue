<template>
<div>
  <div v-if="isAdmin" class="flex justify-center  align-center import-file mt-10">
        <input ref="tablefile" type="file" id="file" name="file" @input="fileUpload">
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
    computed:{
        isAdmin(){
            return JSON.parse(localStorage.getItem('admin'))
        }
    },
    methods:{
        fileUpload(){
            let formData = new FormData()
            let file = this.$refs.tablefile.files[0]
            formData.append('file', file)

            window.axios.post(`${location.origin}/api/table-file`, formData)
                .then( (res) => {
                    this.$refs.books.search()
                })
                .catch( (err) => {
                    alert(err.message)
                })
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