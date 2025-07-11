<template>
    <div class="rol">
        <div class="col">
            <Carousel />
        </div>
    </div>
    <div class="rol">
        <div class="col">
            <Servicios />
        </div>
    </div>
    <div class="rol">
        <div class="col">
            <Calidad />
        </div>
    </div>
    <div class="rol">
        <div class="col">
            <Proyectos />
        </div>
    </div>
</template>
<script setup>
import Carousel from "@/Components/StartPage/Carousel.vue";
import Servicios from "@/Components/StartPage/Servicios.vue";
import Calidad from "@/Components/StartPage/Calidad.vue";
import Proyectos from "@/Components/StartPage/Proyectos.vue";

</script>
