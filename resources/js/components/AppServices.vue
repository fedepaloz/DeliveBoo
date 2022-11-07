<template>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-7 col-l-6">
                <!-- prima sezione con testo e immagine -->
                <h1 class="font-weight-bold text-danger text-center">
                    I nostri servizi
                </h1>
                <p class="text-justify my-5">
                    Da anni lavoriamo sodo per capire cosa vogliono i clienti e
                    per offrire una proposta adatta a loro sia a livello
                    geografico, sia individuale: dagli studenti ai
                    professionisti, passando per le famiglie, e dai centri delle
                    città ai paesi di periferia, grandi e piccoli.
                </p>

                <div class="d-flex justify-content-center">
                    <a href="/about"> Scopri di più su di noi</a>
                </div>
            </div>
            <!-- seconda sezione con 4 cards -->
            <div class="col-sm-12 col-md-5 col-l-6">
                <img
                    class="img-fluid"
                    src="https://cdn0.iconfinder.com/data/icons/shopping-461/200/Order-food-online-2-512.png"
                    alt=""
                />
            </div>
            <hr />
            <div class="row h-100">
                <div class="col-12 col-md-7 mb-5">
                    <div class="row h-100">
                        <div
                            class="col-12 col-md-6 d-flex flex-column justify-content-between"
                        >
                            <div class="card mb-3 p-2">
                                <img
                                    src="https://media.tenor.com/FUR8taaI51IAAAAC/order-now.gif"
                                    alt="..."
                                    class="card-img-top"
                                />
                                <div class="card-body text-center">
                                    <h5 class="card-title font-weight-bold">
                                        Ordina facilmente da casa tua
                                    </h5>
                                    <p class="card-text">
                                        Ordina i tuoi piatti preferiti in modo
                                        semplice e veloce grazie alla nostra
                                        app.
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3 p-2">
                                <img
                                    src="https://i.pinimg.com/originals/5e/f9/d7/5ef9d70b03d22b1acd145b9422d3a33f.gif"
                                    alt="..."
                                    class="card-img-top"
                                />
                                <div class="card-body text-center">
                                    <h5 class="card-title font-weight-bold">
                                        Consegne veloci
                                    </h5>
                                    <p class="card-text">
                                        Ricevi i tuoi piatti direttamente a casa
                                        tua in tutta sicurezza.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-12 col-md-6 d-flex flex-column justify-content-center"
                        >
                            <div class="card mb-3 p-2">
                                <img
                                    src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/dc0ca929614405.5699185f97fd0.gif"
                                    alt="..."
                                    class="card-img-top"
                                />
                                <div class="card-body text-center">
                                    <h5 class="card-title font-weight-bold">
                                        Goditi il cibo
                                    </h5>
                                    <p class="card-text">
                                        Condividi i piatti con chi vuoi e dove
                                        vuoi. Con amici e famiglia.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="col-12 col-md-4 ml-md-3 pt-3 d-flex flex-column justify-content-center"
                >
                    <div class="d-flex flex-column text-center justify-content-center">
                        <h1 class="font-weight-bold">Ordina subito!</h1>
                        <p class="mb-4">
                            Scegli fra una larga varieta' di ristoranti
                        </p>
                        <p class="mb-4">Tu ordini e noi te lo portiamo</p>
                        <a href="#" class="w-100 text-center">Ordina</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AppServices",
};
</script>

<style lang="scss" scoped>
p {
    font-size: 18px;
}

h1 {
    font-size: 45px;
}

a {
    border: 3px solid #b1291b;
    padding: 8px 8px;
    border-radius: 24px;
    font-size: 17px;
    font-weight: bold;
    transition: 0.6s;
    color: #b1291b;
    margin-bottom: 20px;
    text-decoration: none;

    &:hover {
        font-size: 18px;
        background-color: #b1291b;
        color: white;
    }
}
</style>
