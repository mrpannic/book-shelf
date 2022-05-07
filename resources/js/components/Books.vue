<template>
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
</template>

<script>
import BookItem from './BookItem.vue'
export default {
  components: { BookItem },
    data() {
        return {
            books: [
                {id: 1, name: "Book1", publisher: "SOme publish", author: "some author", published_date:"some:date"},
                {id: 1, name: "Book1", publisher: "SOme publish", author: "some author", published_date:"some:date"},
                {id: 1, name: "Book1", publisher: "SOme publish", author: "some author", published_date:"some:date"},
                {id: 1, name: "Book1", publisher: "SOme publish", author: "some author", published_date:"some:date"}
            ]
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
    }
</style>