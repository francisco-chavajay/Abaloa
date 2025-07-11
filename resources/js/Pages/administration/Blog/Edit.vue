<template>
    <div class="container mt-5">
        <h2 class="mb-4">Editar Publicación</h2>

        <form @submit.prevent="submit" enctype="multipart/form-data">
            <!-- Campo Foto -->
            <div class="mb-3">
                <label for="foto" class="form-label">Imagen de la publicación</label>
                <input type="file" id="foto" @change="handleFileUpload" class="form-control" accept="image/*" />
                <div v-if="form.errors.foto && !form.foto && !blog.foto" class="invalid-feedback">
                    {{ form.errors.foto }}
                </div>

                <!-- Vista previa de la imagen -->
                <div v-if="previewUrl || form.foto">
                    <h5 class="mt-2">Vista previa de la imagen:</h5>
                    <img :src="previewUrl || `/storage/blog/${form.foto}`" class="img-fluid preview-image"
                        :alt="form.titulo" />
                </div>
            </div>

            <!-- Campo Título -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" id="titulo" v-model="form.titulo" class="form-control" required
                    placeholder="Ingrese el título de la publicación" />
                <div class="invalid-feedback" v-if="form.errors.titulo">
                    {{ form.errors.titulo }}
                </div>
            </div>

            <!-- Campo Subtítulo -->
            <div class="mb-3">
                <label for="subtitulo" class="form-label">Subtítulo</label>
                <input type="text" id="subtitulo" v-model="form.subtitulo" class="form-control" required
                    placeholder="Ingrese el subtítulo de la publicación" />
                <div class="invalid-feedback" v-if="form.errors.subtitulo">
                    {{ form.errors.subtitulo }}
                </div>
            </div>

            <!-- Campo Categoría -->
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <input type="text" id="categoria" v-model="form.categoria" class="form-control" required
                    placeholder="Ingrese la categoría de la publicación" />
                <div class="invalid-feedback" v-if="form.errors.categoria">
                    {{ form.errors.categoria }}
                </div>
            </div>

            <!-- Editor Quill -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <div ref="editor" class="quill-editor mb-2"></div>
                <input type="hidden" id="descripcion" v-model="form.descripcion" />
                <div class="invalid-feedback" v-if="form.errors.descripcion">
                    {{ form.errors.descripcion }}
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="d-flex justify-content-between">
                <NavLink :href="route('admin.blog.index')"
                    class="btn px-3 btn-admin d-flex gap-3 align-items-center">
                    <span class="arrow-left">
                        <i class="bi bi-arrow-left-circle" style="font-size: 25px"></i>
                    </span>
                    <span class="fw-semibold">Volver a la lista</span>
                </NavLink>
                <button type="submit" class="btn btn-success d-flex gap-3 align-items-center px-3"
                    :disabled="form.processing">
                    <span class="crear-blog" style="font-size: 25px">
                        <i class="bi bi-plus-circle"></i>
                    </span>
                    <span class="text-blog fw-semibold">
                        Actualizar Publicación
                    </span>
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { onMounted, ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
import { usePage } from "@inertiajs/vue3";
import Quill from "quill";
import "quill/dist/quill.snow.css";
import Swal from "sweetalert2";
import axios from "axios";

// Obtener los datos del blog
const { props } = usePage();
const blog = props.blog;

// Configuración inicial del formulario
const form = useForm({
foto: blog.foto || null,
titulo: blog.titulo,
subtitulo: blog.subtitulo,
descripcion: blog.descripcion,
categoria: blog.categoria,
});

// Variable para la vista previa de la imagen
const previewUrl = ref(null);

// Inicializa el editor Quill
const editor = ref(null);
let quill;

onMounted(() => {
quill = new Quill(editor.value, {
    theme: "snow",
    modules: {
        toolbar: [
            [{ header: [1, 2, 3, 4, 5, 6, false] }],
            ["bold", "italic", "underline"],
            ["blockquote", "code-block"],
            [{ list: "ordered" }, { list: "bullet" }],
            ["link", "image"],
            [{ color: [] }, { background: [] }],
            ["clean"],
        ],
    },
});

if (form.descripcion) {
    quill.root.innerHTML = form.descripcion;
}
quill.on("text-change", () => {
    form.descripcion = quill.root.innerHTML;
});
});

// Función para manejar la carga del archivo y mostrar la vista previa
const handleFileUpload = (event) => {
const file = event.target.files[0];
if (file) {
    form.foto = file;
    previewUrl.value = URL.createObjectURL(file);
}
};

const submit = () => {
// Validación para el título
if (form.titulo.length > 500) {
    // Mostrar el error visual en el input de título
    document.getElementById("titulo").classList.add("is-invalid");

    // Mostrar el mensaje de error en SweetAlert
    Swal.fire({
        title: "Error",
        text: "El título no puede superar los 500 caracteres.",
        icon: "error",
        confirmButtonText: "Aceptar",
        confirmButtonColor: "#dc3545",
    });

    return; // Detener el submit si el título es inválido
} else {
    // Remover la clase de error si la longitud es válida
    document.getElementById("titulo").classList.remove("is-invalid");
}

// Validación para el subtítulo
if (form.subtitulo.length > 500) {
    // Mostrar el error visual en el input de subtítulo
    document.getElementById("subtitulo").classList.add("is-invalid");

    // Mostrar el mensaje de error en SweetAlert
    Swal.fire({
        title: "Error",
        text: "El subtítulo no puede superar los 500 caracteres.",
        icon: "error",
        confirmButtonText: "Aceptar",
        confirmButtonColor: "#dc3545",
    });

    return; // Detener el submit si el subtítulo es inválido
} else {
    // Remover la clase de error si la longitud es válida
    document.getElementById("subtitulo").classList.remove("is-invalid");
}

// Proceder con la confirmación de SweetAlert
Swal.fire({
    title: "¿Estás seguro?",
    text: "¡Los cambios se guardarán permanentemente!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sí, actualizar",
    confirmButtonColor: "#198754",
    cancelButtonText: "Cancelar",
}).then((result) => {
    if (result.isConfirmed) {
        // Crear un FormData para enviar correctamente archivos
        let formData = new FormData();
        formData.append("titulo", form.titulo);
        formData.append("subtitulo", form.subtitulo);
        formData.append("descripcion", form.descripcion);
        formData.append("categoria", form.categoria);

        // Solo agregar la imagen si el usuario seleccionó una nueva
        if (form.foto instanceof File) {
            formData.append("foto", form.foto);
        }

        // Hacer la solicitud POST con FormData
        axios
            .post(route("admin.blog.update", blog.id), formData, {
                headers: { "Content-Type": "multipart/form-data" },
            })
            .then((response) => {
                Swal.fire(
                    "Actualizado",
                    "Los cambios han sido guardados.",
                    "success"
                ).then(() => {
                    window.location.href = "/admin/blog";
                });
            })
            .catch((error) => {
                Swal.fire(
                    "Error",
                    error.response?.data?.message ||
                    "Hubo un problema al guardar los cambios.",
                    "error"
                );
            });
    }
});
};


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
