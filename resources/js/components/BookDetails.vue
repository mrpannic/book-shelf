<template>
    <div class="flex justify-center align-center books-box mt-10 py-10">
        <div>
        <table role="table" id="book">
        <tr>
            <td>Name</td>
        </tr>
        <tr>
            <td>Publisher</td>
        </tr>
        <tr>
            <td>Author</td>
        </tr>
        <tr>
            <td>Published date</td>
        </tr>
        <tr>
            <td>TEXT</td>
        </tr>
        
    </table>
        </div>
    </div>
</template>

<script>
export default {
    methods:{

    }
}
</script>

<style scoped>
    #book {
        padding: 100px;
        width: 70%;
    }
    #book td {
        text-transform: uppercase;
        color: white;
        border-bottom: 1px solid gray;
        border-top: 1px solid gray;
        padding: 10px 40px;
        width: 200px;
    }

</style>