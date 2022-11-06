<template>
    <div>
        <ul class="list-unstyled">
            <li
                v-for="item in items"
                :key="item.id"
                class="item-card col-12 mb-3 border border-dark rounded"
            >
                <div v-if="item.visible === 1">
                    <div class="row">
                        <div class="col-3">
                            <img
                                :src="item.image"
                                alt=""
                                class="img-fluid py-2"
                            />
                        </div>
                        <div class="col-9 py-2 d-flex flex-column">
                            <div>
                                <h3>{{ item.name }}</h3>
                                <div class="mb-1">{{ item.description }}</div>
                            </div>
                            <div class="h5 mb-0">{{ item.price }} €</div>
                        </div>
                        <div class="col-9 offset-3 mb-2">
                            <span
                                class="btn btn-outline-primary btn-sm"
                                @click="addToCart(item)"
                                ><i data-v-047541c6=""
                                    >Aggiungi al carrello</i
                                ></span
                            >
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "RestaurantMenu",
    props: {
        items: Array,
    },
    methods: {
        addToCart(item) {
            if (localStorage.ordine) {
                const order = JSON.parse(localStorage.getItem("ordine"));

                let isAnother;

                if (order[0] && order[0].restaurant !== item.restaurant_id) {
                    isAnother = true;
                } else {
                    isAnother = false;
                }

                if (isAnother) {
                    document.body.classList.add("overflow-hidden");
                    document
                        .getElementById("new-cart-modal")
                        .classList.add("d-block");

                    document
                        .getElementById("new-cart-modal-yes")
                        .addEventListener("click", () => {
                            const order = [];

                            const newProduct = {
                                id: item.id,
                                name: item.name,
                                price: item.price,
                                restaurant: item.restaurant_id,
                                quantity: 1,
                                total: item.price,
                            };

                            order.push(newProduct);
                            this.$emit("change-items", order);
                            document.body.classList.remove("overflow-hidden");
                            document
                                .getElementById("new-cart-modal")
                                .classList.remove("d-block");
                        });

                    document
                        .getElementById("new-cart-modal-no")
                        .addEventListener("click", function () {
                            document.body.classList.remove("overflow-hidden");
                            document
                                .getElementById("new-cart-modal")
                                .classList.remove("d-block");
                        });
                } else {
                    const exist = order.find((prod) => {
                        return prod.id == item.id;
                    });

                    if (exist) {
                        order.forEach((prod) => {
                            if (prod.id == item.id) {
                                ++prod.quantity;
                                prod.total += prod.price;
                            }
                        });
                    } else {
                        const newProduct = {
                            id: item.id,
                            name: item.name,
                            price: item.price,
                            restaurant: item.restaurant_id,
                            quantity: 1,
                            total: item.price,
                        };

                        order.push(newProduct);
                    }

                    this.$emit("change-items", order);
                }
            } else {
                const product = {
                    id: item.id,
                    name: item.name,
                    price: item.price,
                    restaurant: item.restaurant_id,
                    quantity: 1,
                    total: item.price,
                };
                const order = [];
                order.push(product);
                this.$emit("change-items", order);
            }
        },
    },
};
</script>

<style lang="scss" scoped>
.item-card {
    border: 1px solid #0000000a;
    height: 100%;
    overflow: hidden;
    transition: box-shadow 0.2s ease-in-out;
    width: 100%;

    &:hover {
        box-shadow: 0 22px 24px 0 #00000014;
    }
}
</style>
