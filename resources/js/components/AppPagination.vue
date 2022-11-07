<template>
    <nav aria-label="Page navigation example">
        <div class="d-flex justify-content-center">
        <ul class="pagination">
            <!-- Previous -->
            <li
                class="page-item"
                role="button"
                v-if="currentPage > 1"
                @click="changePage(currentPage - 1)"
            >
                <span class="page-link" href="#">Indietro</span>
            </li>

            <!-- CURRENT PAGE -->
            <li
                class="page-item"
                role="button"
                :class="{ active: page === currentPage }"
                v-for="page in lastPage"
                :key="page"
                @click="changePage(page)"
            >
                <nav class="page-link" href="#">{{ page }}</nav>
            </li>

            <!-- NEXT -->
            <li
                class="page-item"
                role="button"
                v-if="currentPage !== lastPage"
                @click="changePage(currentPage + 1)"
            >
            
                <nav class="page-link" href="#">Avanti</nav>
            </li>
        </ul>
    </div>
    </nav>
</template>

<script>
export default {
    name: "AppPagination",

    props: {
        lastPage: Number,
        currentPage: Number,
    },
    methods: {
        changePage(page) {
            this.$emit("change-page", page);
        },
    },
};
</script>

<style scoped lang="scss">
.page-link{
    transition: background-color 1s;
    color: #b1291b;
    border: 1px solid #b1291b;

    &:active{
        background-color: #b1291b;
        color:white;
    }

    &:hover {
        background-color: #b1291b;
        color:white;
        font-size: 15px;
    }
}
</style>
