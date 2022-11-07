<template>
    <div class="container my-5">
        <div class="my-5 about-us bg-light p-5">
            <h4 class="text-danger">
                <i class="fa-solid fa-carrot"></i> Chi siamo:
            </h4>
            <p class="my-3">
                La passione di Deliveroo è il cibo, con l’obiettivo di fornire
                alle persone una scelta sempre più ampia. Ma la missione di
                Deliveroo non è solo quella di far sì che i ristoranti e
                supermercati della tua zona siano a tua disposizione dove vuoi e
                quando vuoi; vogliamo spingerci più in là, portando nuovi
                ristoranti vicino a te perché tu possa avere ancora più scelta
                quando si tratta di mangiare bene.
            </p>
            <h4 class="text-danger">
                <i class="fa-solid fa-pizza-slice"></i> I nostri ristoranti:
            </h4>
            <p class="my-3">
                Da pizze appena sfornate ad hamburger golosi, ordina i piatti
                che ami da un ampio assortimento di ristoranti a due passi da
                te. Troverai sia ristoranti famosi in tutta Italia che piccole
                perle locali.
            </p>
            <h4 class="text-danger">
                <i class="fa-solid fa-cookie-bite"></i> Il nostro impegno:
            </h4>
            <p class="my-3">
                Quando si presenta un problema, cerchiamo sempre di individuarne
                l'origine con informazioni utili e precise e nel minor tempo
                possibile. Per trovare la miglior soluzione ci affidiamo ai dati
                in nostro possesso, ma diamo anche ascolto alle nostre intuizioni.
            </p>
            <h4 class="text-danger">
                <i class="fa-solid fa-bowl-food"></i> La nostra community:
            </h4>
            <p class="my-3">
                Ci assumiamo la responsabilità di tutti gli incarichi svolti,
                portandoli a termine per offrire prodotti e servizi di alta
                qualità. Se le cose non vanno come previsto, informiamo chi di
                dovere senza tirarci mai indietro. È questo il nostro approccio
                alle scelte difficili, nella consapevolezza che ottenere
                risultati concreti sia di primaria importanza
            </p>
            <h4 class="text-danger">
                <i class="fa-solid fa-people-group"></i> Il nostro team:
            </h4>
            <p>
                Rispetto ed empatia sono la chiave per rendere il nostro team
                sempre più compatto e affiatato. Tutti abbiamo opinioni diverse
                ma rispettiamo qualsiasi decisione venga presa, mettendo al
                primo posto il benessere dell'azienda.
            </p>
            <div class="my-3">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <figure class="card p-3">
                            <img
                                src="/../images/fp.png"
                                alt=""
                                class="img-fluid"
                            />
                            <h3>Federico Palozzi</h3>
                        </figure>
                    </div>
                    <div class="col-4">
                        <figure class="card p-3">
                            <img
                                src="/../images/mc.jpeg"
                                alt=""
                                class="img-fluid"
                            />
                            <h3>Marco Calligaris</h3>
                        </figure>
                    </div>
                    <div class="col-4">
                        <figure class="card p-3">
                            <img
                                src="/../images/ac.png"
                                alt=""
                                class="img-fluid"
                            />
                            <h3>Alessio Cordari</h3>
                        </figure>
                    </div>
                    <div class="col-4">
                        <figure class="card p-3">
                            <img
                                src="/../images/fe.png"
                                alt=""
                                class="img-fluid"
                            />
                            <h3>Fabrizio Ettori</h3>
                        </figure>
                    </div>
                    <div class="col-4">
                        <figure class="card p-3">
                            <img
                                src="/../images/fh.png"
                                alt=""
                                class="img-fluid"
                            />
                            <h3>Federica Hu</h3>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AboutPage",
};
</script>

<style scoped lang="scss">
h4 {
    font-size: 24px;
    margin-top: 20px;
}
p {
    font-size: 18px;
    text-align: justify;
    display: inline-block;
}

figure {
    height: 410px;
}

h3 {
    margin-top: 15px;
    color: red;
    font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
        sans-serif;
    text-align: center;
    font-size: 22px;
}

.about-us{
  opacity: .9;
}
</style>
