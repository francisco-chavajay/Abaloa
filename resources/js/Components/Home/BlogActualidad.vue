<template>
    <section class="seccion-noticias padding-50">
        <div class="container-blog ms-md-5 me-0">
            <div class="row">
                <!-- Contenido principal -->
                <div class="col-12 col-md-6 col-lg-9 p-md-3 pe-0">
                    <div class="row w-100">
                        <div v-for="(par, index) in blogsAgrupados" :key="index"
                            class="col-11 d-flex flex-wrap p-md-3 pe-2 justify-evenly w-100">
                            <div v-for="noticia in par" :key="noticia.id"
                                class="col-12 col-sm-12 col-md-5 mb-4 cards-blog">
                                <div class="card custom-card">
                                    <div class="category-label">{{ noticia.categoria }}</div>
                                    <img :src="`/storage/blog/${noticia.foto}`" class="w-100 img-fluid custom-img"
                                        :alt="noticia.titulo" />
                                    <div class="card-body">
                                        <h5 class="card-title">{{ noticia.titulo }}</h5>
                                        <p class="card-text">{{ noticia.subtitulo }}</p>
                                        <a :href="route('blog.showPublic', { slug: noticia.slug })" class="btn-blog">
                                            Leer más
                                        </a>
                                    </div>
                                    <div class="card-footer custom-footer">
                                        <span class="fecha-publicacion">{{ formatFecha(noticia.created_at) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Paginación -->
                    <div class="paginacion-blog d-flex justify-content-center">
                        <!-- Primer botón de paginación -->
                        <NavLink v-if="props.blogs.prev_page_url" :href="props.blogs.prev_page_url || '#'"
                            class="btn-paginacion btn-prev">
                            <i class="bi"></i> Anterior
                        </NavLink>

                        <!-- Mostrar el número de página actual -->
                        <span class="pagina-info d-flex align-items-center mx-3">
                            Página {{ props.blogs.current_page }} de {{ props.blogs.last_page }}
                        </span>

                        <!-- Último botón de paginación -->
                        <NavLink v-if="props.blogs.next_page_url" :href="props.blogs.next_page_url || '#'"
                            class="btn-paginacion btn-next">
                            <i class="bi"></i> Siguiente
                        </NavLink>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-12 col-md-6 col-lg-3 sidebar">
                    <h4 class="sidebar-title">Categorías</h4>
                    <select v-model="filtroActual" @change="cambiarFiltro(filtroActual)" class="form-select">
                        <option v-for="categoria in ['Todas', ...categoriasUnicas]" :key="categoria" :value="categoria">
                            {{ categoria }}
                        </option>
                    </select>
                    <h4 class="sidebar-title mt-4">Blogs más Leídas</h4>
                    <div class="blog-images">
                        <div v-for="imagen in imagenesBlogs" :key="imagen.slug" class="blog-image pb-3">
                            <a :href="route('blog.showPublic', { slug: imagen.slug })">
                                <img :src="`/storage/blog/${imagen.foto}`" class="img-fluid img-mas-leidos"
                                    :alt="imagen.titulo" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import NavLink from "../NavLink.vue";

const props = defineProps({
    blogs: { type: Object, required: true },
    todosLosBlogs: { type: Array, required: true },
    categoriasUnicas: { type: Array, required: true },
});

const filtroActual = ref(localStorage.getItem("filtroActual") || "Todas");

onMounted(() => {
    filtroActual.value = localStorage.getItem("filtroActual") || "Todas";
});

const formatFecha = (fecha) => {
    if (!fecha) return "Fecha no disponible";
    const date = new Date(fecha);
    return date.toLocaleDateString("es-ES", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
};

const cambiarFiltro = (nuevoFiltro) => {
    filtroActual.value = nuevoFiltro;
    localStorage.setItem("filtroActual", nuevoFiltro);
};

const blogsFiltrados = computed(() => {
    let blogs = filtroActual.value === "Todas" ? props.todosLosBlogs : props.todosLosBlogs.filter((noticia) => {
        const categorias = noticia.categoria ? noticia.categoria.split(",").map((c) => c.trim().toLowerCase()) : [];
        return categorias.includes(filtroActual.value.toLowerCase());
    });

    // Ordenar blogs por fecha (de más reciente a más antiguo)
    return blogs.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
});


const blogsPaginados = computed(() => {
    const start = (props.blogs.current_page - 1) * props.blogs.per_page;
    const end = start + props.blogs.per_page;
    return blogsFiltrados.value.slice(start, end);
});


const imagenesBlogs = computed(() => props.todosLosBlogs.slice(0, 6));

const blogsAgrupados = computed(() => {
    const pares = [];
    for (let i = 0; i < blogsPaginados.value.length; i += 2) {
        pares.push(blogsPaginados.value.slice(i, i + 2));
    }
    return pares;
});

const cargarPagina = async (url) => {
    if (!url) return;
    try {
        const response = await fetch(url, {
            headers: { "Accept": "application/json" }
        });

        const text = await response.text();
        if (!response.ok) {
            throw new Error(`Error HTTP ${response.status}: ${text}`);
        }

        try {
            const data = JSON.parse(text);
            blogs.value = data;
            paginaActual.value = data.current_page;
        } catch (jsonError) {
            console.error('Error al parsear la respuesta JSON:', jsonError);
            console.error('Respuesta de la API:', text);
        }
    } catch (error) {
        console.error("Error al cargar la página:", error);
    }
};
</script>

<style scoped>
/* Estilos personalizados para la sección de blogs */
.container-blog {
    max-width: 95%;
    margin: auto;
}

.img-mas-leidos{
    border-radius: 5px 5px 155px 5px !important;
}

/* Tarjetas */
.custom-card {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    max-width: 100%;
    padding: 0;

    @media (max-width: 1260px) {
        max-width: 95%;
    }
}

/* Imagen dentro de la tarjeta */
.custom-img {
    height: auto;
    object-fit: cover;
}

/* Categoría en la imagen */
.category-label {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: #A31E75;
    color: white;
    padding: 5px 10px;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: bold;

    @media (max-width:1260px) {
        font-size: 12px;
    }
}

/* Botón de leer más */
.btn-blog {
    color: #A31E75;
    padding: 10px 0;
    text-transform: uppercase;
    font-weight: bold;
    text-decoration: none;
    display: block;
    text-align: start;
}

.btn-blog:hover {
    background-color: white;
}

/* Estilos del Sidebar */
.sidebar {
    margin-top: 20px;
}

.paginacion-blog {
    .btn-paginacion {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100px;
        padding: 10px 20px 5px 10px;
        font-size: 18px;
        font-weight: 500;
        border-radius: 30px;
        transition: all 0.3s ease;

        @media (max-width:777px) {
            width: 80px;
            padding: 0 !important;
        }

        &:hover {
            background-color: #f0f0f0;
        }

        &.btn-prev {
            background-color: #3878B5;
            color: white;
        }

        &.btn-next {
            background-color: #3878B5;
            color: white;
        }

        i {
            font-size: 18px;
        }
    }

    .pagina-info {
        font-size: 16px;
        font-weight: 600;
        color: #333;
    }

    @media (max-width: 576px) {
        .btn-paginacion {
            padding: 8px 16px;
            font-size: 12px;
        }

        .pagina-info {
            font-size: 14px;
        }
    }
}

/* Ajustes responsive */
@media (max-width: 768px) {
    .sidebar {
        margin-top: 30px;
    }

    .custom-card {
        height: auto;
    }

    .custom-img {
        height: 180px;
    }

    .cards-blog {
        width: 109%;
        padding: 0 !important;
    }

    .category-label {
        font-size: 10px;
    }
}
</style>
