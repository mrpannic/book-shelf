<template>

  <tr class="cursor-pointer text-center" @click="$router.replace({name: 'book-details', params: {id: book.id}})">
    <td>
        {{ book.name }}
    </td>
    <td>
        {{ book.publisher }}
    </td>
    <td>
        {{ book.author }}
    </td>
    <td>
        {{ book.published_date }}
    </td>
  </tr>
</template>

<script>
    export default {
        props: {
            book : {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>
    td {
        text-transform: uppercase;
        color: white;
        border-bottom: 1px solid gray;
        padding: 10px 40px;
    }
</style>