<template>
    <div class="container-fluid px-0 d-flex flex-column align-items-center">
        <div class="contain-banner-general-nosotros w-100">
            <banner />
        </div>
    </div>
    <div class="rol">
        <div class="col">
            <info />
        </div>
    </div>
    <div class="rol max-width mb-5">
        <div class="col">
            <formulario />
        </div>
    </div>
</template>

<script setup>
import banner from "@/Components/Contacto/banner.vue"
import info from "@/Components/Contacto/informacion.vue"
import formulario from "@/Components/Contacto/formulario.vue"

</script>
