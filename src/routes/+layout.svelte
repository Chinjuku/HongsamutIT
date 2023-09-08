<script>

</script>

<div>
    <a href="/">Back</a>
    <a href="/" class="todo">To Do List</a>
    <a href="/member">Next</a>
</div>

<style>
    div{
        display: flex;
        justify-content: center;
        background-color: pink;
        /* margin-top: 100px; */
        height: 50px;
        border-radius: 20px;
    }
    a{  
        text-align: center;
        text-decoration: none;
        margin: 10px 70px;
    }
    .todo{
        font-size: 30px;
    }
</style>
<slot />