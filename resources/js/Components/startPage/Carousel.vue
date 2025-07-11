<template>
    <div class="carousel-container">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicadores -->
            <div class="carousel-indicators">
                <button v-for="(image, index) in images" :key="index" type="button" :data-bs-target="'#carouselExample'"
                    :data-bs-slide-to="index" :class="{ active: index === 0 }" aria-current="true"
                    :aria-label="'Slide ' + (index + 1)"></button>
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                <div v-for="(image, index) in images" :key="index" class="carousel-item"
                    :class="{ active: index === 0 }">
                    <img :src="image" class="d-block w-100" alt="Slide Image" />
                </div>
            </div>

            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="contain-text-carousel">
    <div class="text-center">
        <h1>CONSTRUCCIONES ABALOA</h1>
        <p class="subtitle">¿QUÉ PODEMOS HACER POR TÍ?</p>
    </div>
    <div class="divider"></div>
    <div>
        <p class="text-justify">
            El pilar principal de construcciones Abalóa es la dilatada experiencia de sus miembros en el sector.
            La unión de expertos en cada área constructiva hace posible que podamos ofrecerle el mejor servicio.
        </p>
    </div>
</div>

</template>

<script setup>
import image1 from '@images/StartPage/Home1.jpg';
import image2 from '@images/StartPage/Home2.jpg';
import image3 from '@images/StartPage/Home3.jpg';

const images = [image1, image2, image3];
</script>

<style scoped>
/* Contenedor del carrusel */
.carousel-container {
    border-bottom: 4px solid red;
}

/* Ajusta el alto del carrusel */
.carousel-item {
    height: 580px;
}

/* Ajusta las imágenes para que cubran el área sin deformarse */
.carousel-item img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}

/* Indicadores (círculos rojos) */
.carousel-indicators button {
    background-color: red !important;
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.carousel-indicators .active {
    background-color: darkred !important;
}

/* Contenedor de texto */
.contain-text-carousel {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    max-width: 800px;
    margin: auto;
    padding: 80px 0;
}

/* Títulos y textos */
h1 {
    color: red;
    font-weight: bold;
}

.subtitle {
    color: gray;
    font-size: 1.2rem;
}

/* Línea divisora roja */
.divider {
    width: 100%;
    height: 2px;
    background-color: red;
    margin: 10px auto;
}

/* Último párrafo justificado */
.text-justify {
    text-align: justify;
    color: black;
    max-width: 700px;
}
</style>
