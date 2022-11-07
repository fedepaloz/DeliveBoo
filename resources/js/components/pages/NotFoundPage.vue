<template>
    <div class="container" id="not-found">
        <div id="not-fount-content">
            <h1>Ti sei perso? Usa il bottone "torna alla home" per tornare indietro</h1>
            <div class="d-flex justify-content-center align-items-center"><h1>404 | Not found</h1></div>
            <div class="d-flex justify-content-center align-items-center"><a href="\">Torna nella Home</a></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NotFoundPage"
}
</script>

<style scoped lang="scss" >
#not-found {
    height:90vh;
}

#not-fount-content {
    margin: 30vh 0 5vh 0;
}

a {
    border: 3px solid #b1291b;
    padding: 8px 8px;
    border-radius: 24px;
    font-size: 17px;
    font-weight: bold;
    transition: 0.6s;
    color: #b1291b;
    text-decoration: none;

    &:hover{
        font-size: 18px;
        background-color: #b1291b;
        color:white;
        
    }
}
</style>