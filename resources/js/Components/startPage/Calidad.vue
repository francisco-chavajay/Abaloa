<template>
    <div class="calidad-materiales py-5">
        <div class="container">
            <div class="row g-4 max-width">
                <!-- Contenido dinámico con imagen a la izquierda y texto a la derecha -->
                <div class="col-12 mb-a" v-for="(item, index) in qualityData" :key="index">
                    <div class="d-flex align-items-center">
                        <!-- Imagen a la izquierda -->
                        <div class="image-box me-4">
                            <img :src="item.image" :alt="item.title" class="img-calidad">
                        </div>
                        <!-- Contenido de título y descripción --> 
                        <!-- hola --> 
                        <div class="text-card-contain">
                            <h3 class="h5 fw-bold mb-3">{{ item.title }}</h3>
                            <p class="mb-0">{{ item.description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import mesa1 from '@images/StartPage/Mesa-de-trabajo-1.jpg'
import mesa2 from '@images/StartPage/Mesa-de-trabajo-2.jpg'
import mesa3 from '@images/StartPage/Mesa-de-trabajo-3.jpg'
import mesa4 from '@images/StartPage/Mesa-de-trabajo-4.jpg'

// Datos para los elementos
const qualityData = ref([
    {
        title: "Calidad en los materiales",
        description: "Porque solo lo mejor consigue el mejor resultado.",
        image: mesa1
    },
    {
        title: "Profesionalidad",
        description: "Para cada parte de la obra, siempre el mejor profesional, de lo que resulta una suma de calidades que entrega un trabajo inmejorable.",
        image: mesa2
    },
    {
        title: "Experiencia y Calidad de trabajo",
        description: "Con muchos años de carrera profesional en Cantabria y resto de España, lo que Vd. necesita, ya lo hemos hecho antes.",
        image: mesa3
    },
    {
        title: "Limpieza y puntualidad",
        description: "Entregamos nuestras obras para entrar a vivir, no es necesario que invierta más tiempo y dinero en contratar un servicio de limpieza.",
        image: mesa4
    }
]);
</script>

<style scoped>
.calidad-materiales {
    position: relative;
    background: url('@images/StartPage/Mesa-de-trabajo-background.jpg') fixed;
    background-size:auto;
    padding: 100px 0;
    color: black;
    overflow: hidden;
    z-index: 1;
}

.image-box {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px;
    width: 100px;
}

.img-calidad{
    width: 100%;
    height: 100%;
}

.text-card-contain{
    line-height: 1px;
}

/* Estilo para el efecto Parallax */
.calidad-materiales::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
}

/* Alineación de la imagen a la izquierda y texto a la derecha */
.d-flex {
    display: flex;
    align-items: center;
}

.d-flex .image-box {
    margin-right: 20px;
}

/* Responsividad */
@media (max-width: 768px) {
    .col-12 {
        margin-bottom: 20px;
    }

    .d-flex {
        flex-direction: column;
        text-align: center;
    }

    .d-flex .image-box {
        margin-right: 0;
        margin-bottom: 10px;
    }
}
</style>
