<template>
    <div class="container principal-blog padding-y">
        <!-- Contenedor para los botones de navegación -->
        <div class="d-flex justify-between mb-4">
            <div class="pe-2">
                <a href="/blog" class="btn btn-outline-primary">
                    Regresar a los blogs
                </a>
            </div>
            <div class="pe-2">
                <a :href="`/blog/${previousBlogSlug}`" v-if="previousBlogSlug" class="btn btn-outline-secondary">
                    Publicación anterior
                </a>
            </div>
            <div>
                <a :href="`/blog/${nextBlogSlug}`" v-if="nextBlogSlug" class="btn btn-outline-secondary">
                    Siguiente publicación
                </a>
            </div>
        </div>


        <div class="row d-flex justify-center">
            <!-- Contenido principal -->
            <div class="col-12 col-md-8">
                <div class="container-image">
                    <!-- Título del blog -->
                    <h1 class="blog-title-principal">{{ blogs.titulo }}</h1>

                    <!-- Imagen del blog -->
                    <img :src="`/storage/blog/${blogs.foto}`" class="img-fluid mb-4 shadow"
                        style="max-height: 755px; border-radius: 5px" alt="Blog Image" />

                    <!-- Fecha y compartir -->
                    <div class="blog-meta mb-4">
                        <span class="date">
                            Publicado el {{ formattedDate }}
                        </span>
                        <div class="social-share">
                            <span>Comparte: </span>
                            <a href="https://www.facebook.com/unilangsantander1350" class="social-icon fb-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/unilangidiomas/" class="social-icon ig-icon">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://www.youtube.com/channel/UCEFWeMxponjX_QIwHav7ZGQ"
                                class="social-icon yt-icon">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Descripción del blog -->
                    <div class="quill text-description-blog" v-html="formattedDescription" :class="{
                        'empty-paragraph': isEmpty(formattedDescription),
                    }"></div>
                </div>
            </div>

            <!-- Artículos más recientes -->
            <div class="col-12 col-md-3">
                <!-- Buscador -->
                <div class="search-bar mb-4">
                    <input type="text" class="form-control" placeholder="Buscar..." v-model="searchQuery" />
                </div>

                <!-- Resultados de la búsqueda -->
                <div v-if="searchQuery.length > 0">
                    <h2 class="title-side mt-4">Resultados de búsqueda</h2>
                    <section class="custom-grid-items">
                        <article v-for="(articulo, index) in filteredBlogs" :key="articulo.slug"
                            class="custom-grid-item">
                            <a :href="`/blog/${articulo.slug}`"
                                class="custom-grid-link d-flex align-items-center text-decoration-none text-black">
                                <div class="custom-grid-media shadow rounded-1">
                                    <img :src="`/storage/blog/${articulo.foto}`" :alt="articulo.titulo"
                                        class="img-fluid" />
                                    <div class="overlay">
                                        <h2 class="hover-title">
                                            {{ articulo.titulo }}
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </section>
                </div>

                <div class="custom-column">
                    <!-- Artículos más recientes -->
                    <div class="custom-heading my-4">
                        <h2 class="title-side mt-5">Noticias más actuales</h2>
                    </div>
                    <div class="custom-grid">
                        <section class="custom-grid-items">
                            <article v-for="(articulo, index) in filteredBlogs.slice(
                                0,
                                3
                            )" :key="articulo.slug" class="custom-grid-item">
                                <a :href="`/blog/${articulo.slug}`" class="custom-grid-link">
                                    <div class="custom-grid-media">
                                        <img :src="`/storage/blog/${articulo.foto}`" :alt="articulo.titulo"
                                            class="custom-grid-img" />
                                        <!-- Fondo semitransparente encima de la imagen -->
                                        <div class="custom-grid-overlay"></div>
                                    </div>
                                    <div class="custom-grid-content">
                                        <h2 class="custom-title">
                                            {{ articulo.titulo }}
                                        </h2>
                                    </div>
                                </a>
                            </article>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, computed, ref } from "vue";

// Definición de las props con valores por defecto para evitar undefined
const props = defineProps({
    blogs: {
        type: Object,
        required: true,
    },
    blogs3ultimos: {
        type: Array,
        default: () => [],
    },
    todosLosBlogs: {
        type: Array,
        default: () => [],
    },
});

// Computed para obtener la fecha formateada
const formattedDate = computed(() => {
    if (!props.blogs?.created_at) return "Fecha no disponible";
    return new Date(props.blogs.created_at).toLocaleDateString();
});

const searchQuery = ref("");

// Computed con validación para evitar errores
const filteredBlogs = computed(() => {
    if (!props.todosLosBlogs || !Array.isArray(props.todosLosBlogs)) return [];
    if (!searchQuery.value) return props.todosLosBlogs;

    // Filtro que busca dentro de los títulos
    return props.todosLosBlogs.filter((blog) =>
        blog.titulo
            ?.toLowerCase()
            .trim()
            .includes(searchQuery.value.toLowerCase().trim())
    );
});

// Computed para la navegación entre blogs
const previousBlogSlug = computed(() => {
    return props.previousBlogSlug;  // Ya viene de Laravel
});

const nextBlogSlug = computed(() => {
    return props.nextBlogSlug;  // Ya viene de Laravel
});


// Computed para formatear la descripción del blog
const formattedDescription = computed(() => {
    let description = props.blogs?.descripcion || "";

    description = description.replace(/\n/g, "<br />");
    description = formatMarkdown(description);
    description = formatListTypes(description);

    return `<p>${description}</p>`;
});

// Función para verificar si la descripción está vacía
const isEmpty = (description) => {
    return !(description && description.trim());
};

// Función para formatear listas
const formatListTypes = (description) => {
    description = description.replace(
        /<li[^>]*data-list="bullet"[^>]*>/g,
        '<li style="list-style-type: disc;">'
    );
    description = description.replace(
        /<li[^>]*data-list="ordered"[^>]*>/g,
        '<li style="list-style-type: decimal;">'
    );
    return description;
};

// Función para convertir Markdown en HTML
const formatMarkdown = (description) => {
    return description
        .replace(/(#{1})\s*(.*)/g, '<h1 class="custom-h1">$2</h1>')
        .replace(/(#{2})\s*(.*)/g, '<h2 class="custom-h2">$2</h2>')
        .replace(/(#{3})\s*(.*)/g, '<h3 class="custom-h3">$2</h3>')
        .replace(/(#{4})\s*(.*)/g, '<h4 class="custom-h4">$2</h4>')
        .replace(/(#{5})\s*(.*)/g, '<h5 class="custom-h5">$2</h5>');
};
</script>

<style scoped>
.custom-h1 {
    color: #d60d0d !important;
}

.custom-h2 {
    color: #d60d0d !important;
}

.custom-h3 {
    color: #d60d0d !important;
}

.custom-column {
    .custom-heading h2 {
        font-size: 1.5rem;
        margin-top: 2rem;
    }

    .custom-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .custom-grid-items {
        display: flex;
        flex-direction: column;
    }

    .custom-grid-item {
        width: 100%;
        max-width: 100%;
        position: relative;
        overflow: hidden;
        background-color: #95312b;
        /* Fondo con el color especificado */
        border-radius: 8px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .custom-grid-item:hover {
        transform: translateY(-5px);
        /* Efecto al hacer hover */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Sombra al hacer hover */
    }

    .custom-grid-link {
        display: block;
        text-decoration: none;
    }

    .custom-grid-media {
        position: relative;
        overflow: hidden;
    }

    .custom-grid-img {
        width: 100%;
        height: auto;
        transition: opacity 0.3s ease;
    }

    .custom-grid-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.4);
        /* Fondo semitransparente */
        z-index: 1;
        opacity: 0;
        /* Inicialmente oculto */
        transition: opacity 0.3s ease;
    }

    .custom-grid-item:hover .custom-grid-overlay {
        opacity: 1;
        /* Aparece al hacer hover */
    }

    .custom-grid-content {
        padding: 15px;
        text-align: center;
        opacity: 0;
        /* Títulos ocultos inicialmente */
        transition: opacity 0.3s ease;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        transform: translate(-50%, -50%);
        z-index: 2;
        /* Asegura que el título esté encima de la imagen */
    }

    .custom-grid-item:hover .custom-grid-content {
        opacity: 1;
        /* Títulos visibles solo al hacer hover */
    }

    .custom-title {
        font-size: 1.3rem;
        color: white;
        /* Color blanco para el título */
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        /* Añadir sombra al texto para mejor visibilidad */
    }
}

.custom-grid-media {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
    border-radius: 5px;

    img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    /* Efecto de zoom al hacer hover sobre la imagen */
    &:hover img {
        transform: scale(1.1);
    }

    .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* Ahora ocupa todo el contenedor */
        background: rgba(149, 49, 43, 0.7);
        /* Fondo con opacidad */
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        opacity: 0;
        /* Inicialmente está oculto */
        transition: opacity 0.3s ease-in-out;
        /* Transición suave para la aparición */
        padding: 10px;
    }

    /* Aparece el overlay al hacer hover */
    &:hover .overlay {
        opacity: 1;
    }

    .hover-title {
        color: white;
        font-size: 1.2rem;
        /* Título más grande y legible */
        font-weight: bold;
        margin: 0;
    }
}


.text-description-blog {

    p,
    h1,
    h2,
    h3 {
        .span {
            background: white !important;
        }
    }
}

.p-side {
    font-size: 15px;
}

.title-side {
    color: var(--red);
    font-family: "Poppins", Sans-serif;
    font-size: 20px;
    font-weight: 400;
}

.custom-service-list {
    list-style: none !important;
}

.list-services li a {
    font-weight: 500 !important;
}

.list-services .icon {
    font-size: 12px;
    border-radius: 50%;
    width: 12px;
    height: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.contain-link {
    display: flex;
    justify-content: start;
    align-items: center;
    gap: 1rem;
    padding: 10px 0px 4px 0px;
    border-style: solid;
    border-width: 0px 0px 1px 0px;
    border-radius: 0px 0px 0px 0px;
    border-color: #e8e8e8;
    transition-duration: 0.5s;
}

.contain-link a {
    color: #666666;
    transition-duration: 0.5s;
    font-family: "Open Sans", Sans-serif;
    font-size: 15px;
    font-weight: 500;
    line-height: 1.8em;
    text-decoration: none;
}

.custom-grid-media {
    width: 100%;
    max-width: 100%;
    /* Asegura que la imagen se ajuste al contenedor */
    height: auto;
    /* Hace que la imagen mantenga su proporción */
}

.custom-grid-link {
    display: block;
    text-decoration: none;
}

.custom-grid-item {
    display: flex;
    flex-direction: column;
    margin-bottom: 1rem;
    /* Separar un poco los artículos */
}

.custom-grid-media img {
    border-radius: 5px;
    object-fit: cover;
    /* Hace que las imágenes se ajusten correctamente */
    width: 100%;
    height: 200px;
    /* Asegura que la imagen tenga una altura constante */
}

.custom-heading {
    text-align: center;
}

.title-side {
    color: var(--red);
    font-family: "Poppins", Sans-serif;
    font-size: 20px;
    font-weight: 400;
}

.custom-grid-item {
    display: flex;
}

.custom-grid-items {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.custom-grid-media img {
    width: 100%;
    height: 100%;
    border-radius: 5px;
}

.custom-grid-content h2 {
    line-height: 0.7;
    padding: 0 0.5rem;
}

.custom-grid-content h2 a {
    color: #333333;
    border-color: #e8e8e8;
    transition-duration: 0.5s;
    text-decoration: none;
    font-family: "Poppins", Sans-serif;
    font-size: 15px;
    font-weight: 400;
}

.promo-box-container {
    height: 450px;
    background-size: cover;
    background-position: center;
    transition: transform 0.5s ease;
    /* Añade una transición para el efecto */
    position: relative;
}

.promo-box-overlay {
    width: 100%;
    height: 100%;
    background-color: #54545496;
    transition: 0.3s ease;
}

.promo-box-overlay:hover {
    background-color: rgba(0, 0, 0, 0.7);
}

.promo-box-container .promo-box-content {
    position: absolute;
    bottom: 0;
    padding: 15px;
}

.btn-sidebar {
    background-color: var(--red);
    color: var(--white);
    font-size: 15px;
    padding: 10px 20px;
}

.post-nav-link {
    color: var(--red);
    font-weight: 400;
    font-size: 15px;
}

.nav-icon svg {
    fill: var(--red);
    font-size: 7px !important;
}

.custom-grid-link h2 {
    font-size: 1em;
    line-height: 1;
}

/* Aplica el estilo cuando el párrafo esté vacío */
.empty-paragraph {
    margin-bottom: 0 !important;
}

::v-deep(.quill.text-description-blog) {
    text-align: justify;

    a {
        color: #3878b5;
    }
}

::v-deep(.quill.empty-paragraph p) {
    margin-bottom: 0;
}

::v-deep(.quill ol, ul) {
    margin-bottom: 0;
}

::v-deep(.quill h1, h2, h3, h4, h5, h6) {
    color: #d60d0d !important;
}

.blog-title-principal {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #95312b;
}

.blog-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.date {
    font-size: 0.9rem;
    color: #555;
}

.social-share {
    display: flex;
    gap: 10px;
}

.social-icon {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #ccc;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1rem;
    transition: background-color 0.3s;
}

.social-icon:hover {
    background-color: #444;
}

.search-bar input {
    width: 100%;
    padding: 0.5rem;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.btn {
    border-radius: 5px;
    padding: 10px 15px;
    text-transform: uppercase;
    background-color: #3878b5;
    color: #fff;
}

@media (max-width: 600px) {
    ::v-deep(.quill.empty-paragraph p) {
        font-size: 15px;
    }

    .principal-blog {
        padding: 10px;
    }
}
</style>
