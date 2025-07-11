<template>
    <div class="d-flex flex-column min-vh-100">
        <!-- Header-->
         <header class="mx-auto z-2 w-100 d-none d-md-block">
            <Header/>
         </header>


        <!-- Main-->
        <main class="main">
            <slot />
        </main>

        <!-- Footer -->
        <Footer/>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import Header from '@/Components/header.vue';
import Footer from '@/Components/Footer.vue';

</script>

