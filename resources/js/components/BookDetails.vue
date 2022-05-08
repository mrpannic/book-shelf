<template>
    <div class="flex justify-center align-center books-box mt-10 py-10 w-full text-center">
        <div>
        <table role="table" id="book">
        <tr>
            <td>Name: {{ book.name }}</td>
        </tr>
        <tr>
            <td>Publisher: {{ book.publisher }}</td>
        </tr>
        <tr>
            <td>Author: {{ book.author }}</td>
        </tr>
        <tr>
            <td>Published date: {{ book.published_date }}</td>
        </tr>
    </table>
        </div>
    </div>
</template>

<script>
export default {
    name: 'BookDetails',
    data(){
        return {
            book: {
                name: '',
                author: '',
                publisher: '',
                published_date: ''
            }
        }
    },
    created(){
        this.axios.get(`${location.origin}/api/books/${this.$route.params.id}`)
            .then( (res) => {
                this.book = res.data
            })
            .catch( (err) => {
                alert(err.message)
            })
    },
    methods:{

    }
}
</script>

<style scoped>
    #book {
        padding: 100px;
    }
    #book td {
        text-transform: uppercase;
        color: white;
        border-bottom: 1px solid gray;
        border-top: 1px solid gray;
        padding: 10px 40px;
        width: 800px;
    }

</style>