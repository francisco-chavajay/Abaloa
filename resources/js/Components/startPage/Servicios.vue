<template>
    <section class="services-section">
        <!-- Capa Roja (Overlay) -->
        <div class="overlay"></div>

        <!-- Contenido del Bloque -->
        <div class="text-center max-width text-white content">
            <h2 class="fw-bold">Nuestros Servicios</h2>
            <p class="lead">Todos nuestros trabajos están cuidados al mínimo detalle. Nuestra dirección técnica, es
                quien se encarga de que el resultado sea óptimo y de máxima calidad, amoldando cada proyecto a las
                necesidades de nuestros clientes.</p>
        </div>

        <!-- Bloque de Cards -->
        <div class="container">
            <div class="row">
                <div v-for="(service, index) in services" :key="index" class="col-md-4 d-flex">
                    <div class="card service-card m-5">
                        <div class="card-body p-4 text-center d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ service.title }}</h5>
                            <p class="card-text flex-grow-1">{{ service.description }}</p>
                            <a :href="service.link" class="btn btn-light mt-auto">Más Información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';

const services = ref([
    { title: "Reforma Integral de Viviendas y Locales", description: "Asesoramiento y acompañamiento de principio a fin, para conseguir el mejor resultado la rehabilitación de la vivienda o local comercial.", link: "/servicios#reforma-viviendas" },
    { title: "Mantenimiento de comunidades", description: "Las Comunidades siempre necesitan un mantenimiento constante, por ello Construcciones Abalóa es su solución.", link: "/servicios#mantenimiento-comunidades" },
    { title: "Interiorismo y Decoración", description: "La distribución, instalaciones o materiales, ofrecen infinitas combinaciones que hacen de una vivienda o local, cuidar la estética al mínimo detalle.", link: "#rehabilitacion" },
    { title: "Fachadas y Cubiertas", description: "Son los elementos más importantes en cualquier edificio, puesto que son los principales aislantes contra las inclemencias del tiempo.", link: "#diseno" },
    { title: "Instalación de Chimeneas", description: "Trabajamos con uno de los principales fabricantes europeos con más de 55 años en el sector, ofreciendo garantía y excelencia.", link: "#asesoria" },
    { title: "Servicios inmobiliarios", description: "Asesoramiento de inversión inmobiliaria, asesoramiento jurídico inmobiliario, valoración de inmuebles, terrenos y mucho más..", link: "/servicios#departamento-tecnico" }
]);
</script>

<style scoped>
/* Fondo con efecto Parallax */
.services-section {
    position: relative;
    background: url('@images/backgroundServicios.jpg') no-repeat center center fixed;
    background-size: cover;
    padding: 20px 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

/* Capa roja encima del fondo */
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(228, 20, 20, 0.8)
    ;
    z-index: 0;
}

/* Contenido sobre la capa roja */
.content {
    position: relative;
    z-index: 1;
    padding: 20px;
}

/* Estilos de las tarjetas */
.service-card {
    background: transparent !important;
    color: white !important;
    border: 2px solid white;
    border-radius: 10px;
    padding: 20px;
    transition: transform 0.3s ease-in-out;
    min-height: 350px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.service-card:hover {
    transform: translateY(-5px);
}

/* Ajuste del texto */
.card-text {
    text-align: justify;
    flex-grow: 1;
}

h2 {
    font-size: 2.5rem;
}

p.lead {
    font-size: 1.2rem;
}
</style>
