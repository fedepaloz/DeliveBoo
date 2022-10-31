<template>
    <div id="main-cart" class="p-3">
        <div id="cart-top" v-if="order.length > 0">
            <h4>Ordine in corso</h4>
            <ul class="list-unstyled">
                <li
                    v-for="item in order"
                    :key="item.id"
                    class="row d-flex justify-content-between align-items-center py-2"
                >
                    <!-- Item name -->
                    <div class="col-12 col-xl-6">
                        <div>
                            {{ item.name }}
                        </div>
                    </div>

                    <!-- Item add/remove -->
                    <div class="col-6 col-xl-3 d-flex align-items-center">
                        <div
                            class="btn btn-outline-primary btn-sm mr-2"
                            @click="reduceFromCart(item)"
                        >
                            <i class="fas fa-minus"></i>
                        </div>

                        <div class="mr-2">{{ item.quantity }}</div>

                        <div
                            class="btn btn-outline-primary btn-sm"
                            @click="addToCart(item)"
                        >
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>

                    <!-- Item total -->
                    <div class="col-6 col-xl-3 text-right">
                        <div>{{ item.total }} €</div>
                    </div>
                </li>
            </ul>
        </div>

        <div v-else id="cart-top" class="pt-3 pb-4 text-center">
            <i class="fa-solid fa-cart-shopping"></i>
            <div class="empty-cart-text">Il carrello è vuoto</div>
        </div>

        <div id="cart-bottom">
            <router-link :to="{ name: 'checkout' }">
                <a v-if="order.length > 0" class="btn btn-success w-100"
                    >Procedi al pagamento</a
                >
                <a v-else class="btn btn-locked w-100">Procedi al pagamento</a>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "AppCart",
    props: {
        order: Array,
    },
    methods: {
        addToCart(item) {
            const order = JSON.parse(localStorage.getItem("ordine"));

            order.forEach((prod) => {
                if (prod.id == item.id) {
                    ++prod.quantity;
                    prod.total += prod.price;
                }
            });

            this.$emit("change-items", order);
        },
        reduceFromCart(item) {
            const order = JSON.parse(localStorage.getItem("ordine"));

            order.forEach((prod, index) => {
                if (prod.id == item.id) {
                    if (prod.quantity == 1) {
                        order.splice(index, 1);
                    } else {
                        --prod.quantity;
                        prod.total -= prod.price;
                    }

                    this.$emit("change-items", order);
                }
            });
        },
    },
};
</script>

<style lang="scss" scoped>
#main-cart {
    border: 1px solid rgba(0, 0, 0, 0.04);
}

#cart-top {
    li {
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
    }
}
.empty-cart-text {
    color: #abadad;
}

.btn-locked {
    background-color: #e2e5e5;
    color: #abadad;
}

.fa-solid.fa-cart-shopping {
    font-size: 36px;
    color: #e2e5e5;
}
</style>
