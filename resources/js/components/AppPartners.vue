<template>
    <div class="container-sm">
        <section
            id="partners-section"
            class="d-flex flex-column align-items-center"
        >
            <h1 class="font-weight-bold my-5">I nostri Partner</h1>
            <ul
                class="d-flex align-items-center justify-content-center flex-wrap"
            >
                <li class="m-5">
                    <a href="https://www.mcdonalds.it/" target="_blank"
                        ><img
                            src="https://www.mcdonalds.it/themes/mcd/build/images/mcd_logo.svg"
                            alt="McDonald's"
                    /></a>
                </li>
                <li class="m-5">
                    <a
                        href="https://www.rossopomodoro.it/default.aspx"
                        target="_blank"
                        ><img
                            src="https://www.rossopomodoro.it/web/img/app-ico.png"
                            alt="Rosso Pomodoro"
                    /></a>
                </li>
                <li class="m-5">
                    <a href="https://www.mcdonalds.it/" target="_blank"
                        ><img
                            src="https://loghi-famosi.com/wp-content/uploads/2020/08/Burger-King-Logo-1969-1994.png"
                            alt="Burger King"
                    /></a>
                </li>
                <li class="m-5">
                    <a href="https://www.sushicorner.it/" target="_blank"
                        ><img
                            src="https://static.xmenu.it/cache/restaurants/192/Logo-Brand_h300.png"
                            alt="Sushi Corner"
                    /></a>
                </li>
            </ul>
        </section>
        <section id="become-partner" class="my-5">
            <div
                class="row align-items-center justify-content-center justify-content-md-between"
            >
                <div class="col-md-4 p-3">
                    <img
                        class="img-fluid"
                        src="https://spremutedigitali.com/wp-content/uploads/2017/12/partenrship.png"
                        alt="Partnership"
                    />
                </div>
                <div class="col-md-7 my-3 my-md-0">
                    <h1>Diventa nostro Partner</h1>
                    <p>Contattaci per avere maggiori informazioni su come diventare un nostro partner!</p>
                    <form>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="">Nome</label>
                                <input type="text" class="form-control" id=""/>
                            </div>
                            <div class="form-group col">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id=""/>
                            </div>
                            <div class="form-group col">
                                <label for="">Telefono</label>
                                <input type="text" class="form-control" id=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Messaggio</label>
                            <textarea class="form-control" id="" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Invia</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
#partners-section {
    ul {
        list-style-type: none;
        padding-inline-start: 0;
        img {
            width: 150px;
        }
    }
}
#become-partner {
    border: 1px solid black;
    border-radius: 20px;
    padding: 30px;
}
</style>
