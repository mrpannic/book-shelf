<template>
<div class="flex flex-col justify-center items-center w-full">
    <div class="flex items-center mb-12">
        <input placeholder="Search by name.." class="mr-5" type="search" v-model="byName" />

        <select v-model="byDate" class="cursor-pointer">
            <option value="0">Published date...</option>
            <option value="1">5 years ago</option>
            <option value="2">10 years ago</option>
            <option value="3">more than 10 years ago</option>
        </select>

        <div class="search-button ml-5 px-5 cursor-pointer" @click="search">
            Search
        </div>
    </div>
    <div class="flex justify-center w-full">
    <table role="table" id="books">
        <tr>
            <td>Name</td>
            <td>Publisher</td>
            <td>Author</td>
            <td>Published date</td>
        </tr>
        <book-item 
            v-for="(book, idx) in books"
            :key="idx"
            :book="book"
        />
    </table>
    </div>
</div>
</template>

<script>
import BookItem from './BookItem.vue'
export default {
  components: { BookItem },
    data() {
        return {
            byName: '',
            byDate: 0,
            books: [
                {id: 1, name: "Book1", publisher: "SOme publish", author: "some author", published_date:"some:date"},
                {id: 1, name: "Book1", publisher: "SOme publish", author: "some author", published_date:"some:date"},
                {id: 1, name: "Book1", publisher: "SOme publish", author: "some author", published_date:"some:date"},
                {id: 1, name: "Book1", publisher: "SOme publish", author: "some author", published_date:"some:date"}
            ]
        }
    },
    methods:{
        search() {
            console.log(this.byName, this.byDate)
        }
    }
}
</script>

<style scoped>
    #books {
        padding: 100px;
        width: 70%;
    }
    #books td {
        text-transform: uppercase;
        color: white;
        border-bottom: 1px solid gray;
        border-top: 1px solid gray;
        padding: 10px 40px;
        width: 200px;
    }
    input[type="search"], .search-button {
        background: #1f2937;
        color: white;
        border: 1px solid white;
    }
    input[type="searc"]::placeholder {
        color: white;
    }
</style>