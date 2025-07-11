<template>
    <div class="container-fluid px-0 d-flex flex-column align-items-center">
        <!-- Verificar si blogs contiene datos -->
        <div class="w-100 d-flex justify-center mt-5">
            <PrincipalBlog :blogs="blogs" :blogs3ultimos="blogs3ultimos" :todosLosBlogs="todosLosBlogs" />
        </div>
    </div>
</template>
<script setup>

import PrincipalBlog from "@/Components/Blog/PrincipalBlog.vue";

// Definir la prop blogs como un objeto
const props = defineProps({
    blogs: {
        type: Object,
        required: true,
    },
    blogs3ultimos: {
        type: Array,
        required: true,
    },
    todosLosBlogs: {
        type: Array,
        required: true,
    },
});
</script>
