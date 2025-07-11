<template>
    <div class="container mt-5">
        <h2 class="mb-4">Detalles de la Publicación</h2>

        <div class="mb-3">
            <label for="foto" class="form-label">Imagen de la publicación</label>
            <!-- Imagen de la publicación, no editable -->
            <div class="preview-image" v-if="blog.foto">
                <img :src="`/storage/blog/${blog.foto}`" class="img-fluid" alt="Imagen de la publicación" />
            </div>
            <div v-else>
                <p>No hay imagen disponible</p>
            </div>
        </div>

        <!-- Título -->
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" id="titulo" v-model="blog.titulo" class="form-control" readonly />
        </div>

        <!-- Subtítulo -->
        <div class="mb-3">
            <label for="subtitulo" class="form-label">Subtítulo</label>
            <input type="text" id="subtitulo" v-model="blog.subtitulo" class="form-control" readonly />
        </div>

        <!-- Categoría -->
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" id="categoria" v-model="blog.categoria" class="form-control" readonly />
        </div>

        <!-- Descripción (Editor Quill) -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <div ref="editor" class="quill-editor mb-2"></div>
        </div>


            <!-- Botones de acción -->
            <div class="d-flex justify-content-between">
                <NavLink :href="route('admin.blog.index')" class="btn px-3 btn-admin d-flex gap-3 align-items-center">
                    <span class="arrow-left">
                        <i class="bi bi-arrow-left-circle" style="font-size: 25px;"></i>
                    </span>
                    <span class="fw-semibold">Volver a la lista</span>
                </NavLink>

            </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import Quill from "quill";
import "quill/dist/quill.snow.css";
import NavLink from "@/Components/NavLink.vue";

// Obtener los datos del blog
const { props } = usePage();
const blog = props.blog;

// Inicializa el editor Quill
const editor = ref(null);
let quill;

onMounted(() => {
quill = new Quill(editor.value, {
    theme: "snow",
    modules: {
        toolbar: false, // Desactivar la barra de herramientas
    },
    readOnly: true, // Poner el editor en modo solo lectura
});

// Asignar la descripción al editor
if (blog.descripcion) {
    quill.root.innerHTML = blog.descripcion;
}
});
</script>

<style scoped>
.invalid-feedback {
display: block;
}

.quill-editor {
height: 300px;
/* Ajusta la altura según lo necesites */
}

.preview-image {
max-width: 150px;
}
</style>
