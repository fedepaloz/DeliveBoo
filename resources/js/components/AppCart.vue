<template>
    <div id="main-cart" class="p-3 border border-dark rounded">
        <div id="cart-top" v-if="order.length > 0">
            <h4>Ordine in corso</h4>
            <ul class="list-unstyled">
                <li
                    v-for="item in order"
                    :key="item.id"
                    class="row d-flex justify-content-between align-items-center py-2"
                >
                    <!-- Item name -->
                    <div class="col-12 col-xl-12">
                        <span>
                            {{ item.name }}
                        </span>
                    </div>

                    <!-- Item add/remove -->
                    <div class="col-6 col-xl-9 d-flex align-items-center my-2">
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
                        <span
                            class="btn btn-outline-danger btn-sm ml-3"
                            @click="removeFromCart(item)"
                            ><i class="fa-solid fa-trash"></i
                        ></span>
                    </div>

                    <!-- Item total -->
                    <div class="col-6 col-xl-3 text-right">
                        <div>{{ parseFloat(total).toFixed(2).replace(".", ",") }} €</div>
                    </div>
                </li>
                <div class="py-2 px-0">
                    <div>Totale ordine: {{ parseFloat(total).toFixed(2).replace(".", ",") }} €</div>
                </div>
            </ul>
        </div>

        <div v-else id="cart-top" class="pt-3 pb-4 text-center">
            <i class="fa-solid fa-cart-shopping"></i>
            <div class="empty-cart-text">Il carrello è vuoto</div>
        </div>

        <div id="cart-bottom">
            <router-link :to="{ name: 'checkout' }">
                <button
                    v-if="total > restaurant.min_order"
                    class="btn btn-success w-100"
                >
                    Procedi al pagamento
                </button>
                <button v-else disabled class="btn btn-locked w-100">
                    Ordine minimo non raggiunto
                </button>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "AppCart",
    props: {
        order: Array,
        restaurant: Object,
    },
    computed: {
        total() {
            let total = 0;

            this.order.forEach((item) => {
                total += item.total;
            });

            return (total);
            
            
        },
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
        removeFromCart(item) {
            if (localStorage.ordine) {
                const order = JSON.parse(localStorage.getItem("ordine"));

                const exist = order.find((prod) => {
                    return prod.id == item.id;
                });

                if (exist) {
                    order.forEach((prod, index) => {
                        if (prod.id == item.id) {
                            order.splice(index, 1);
                        }
                        this.$emit("change-items", order);
                    });
                }
            }
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
