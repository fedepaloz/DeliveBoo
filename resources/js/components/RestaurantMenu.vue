<template>
    <ul class="list-unstyled">
        <li v-for="item in items" :key="item.id" class="item-card col-12 mb-3">
            <div class="row">
                <div class="col-3">
                    <img :src="item.image" alt="" class="img-fluid py-2" />
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
                        class="btn btn-primary"
                        @click="addToCart(item)"
                        type="button"
                        ><i data-v-047541c6="" class="fas fa-plus"></i
                    ></span>
                    <span
                        class="btn btn-primary"
                        @click="removeFromCart(item)"
                        type="button"
                        ><i data-v-047541c6="" class="fas fa-minus"></i
                    ></span>
                    <span class="btn btn-danger" @click="clear" type="button"
                        ><i class="fa-solid fa-trash"></i
                    ></span>
                </div>
            </div>
        </li>
    </ul>
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

                const exist = order.find((prod) => {
                    return prod.id == item.id;
                });

                if (exist) {
                    order.forEach((prod) => {
                        if (prod.id == item.id) {
                            ++prod.quantity;
                        }
                    });
                } else {
                    const newProduct = {
                        id: item.id,
                        name: item.name,
                        price: item.price,
                        quantity: 1,
                    };

                    order.push(newProduct);
                }

                localStorage.setItem("ordine", JSON.stringify(order));
            } else {
                const product = {
                    id: item.id,
                    name: item.name,
                    price: item.price,
                    quantity: 1,
                };
                const order = [];
                order.push(product);
                localStorage.setItem("ordine", JSON.stringify(order));
            }
        },
        removeFromCart(item) {
            if (localStorage.ordine) {
                const order = JSON.parse(localStorage.getItem("ordine"));

                const exist = order.find((prod) => {
                    return prod.id == item.id;
                });

                if (exist) {
                    order.forEach((prod) => {
                        if (prod.id == item.id) {
                            console.log(prod.quantity);
                            prod.quantity -= 1;
                        }
                    });
                }
            }
        },
        clear() {
            localStorage.clear();
        },
    },
};
</script>

<style lang="scss" scoped>
.item-card {
    border: 1px solid #0000000a;
    box-shadow: none;
    cursor: pointer;
    height: 100%;
    outline: none;
    overflow: hidden;
    position: relative;
    transition: box-shadow 0.2s ease-in-out;
    width: 100%;
    word-break: break-word;

    &:hover {
        box-shadow: 0 22px 24px 0 #00000014;
    }
}
</style>
