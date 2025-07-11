<template>
    <div class="container mt-5">
        <h2 class="mb-4">Nueva Publicación</h2>

        <form @submit.prevent="submit" enctype="multipart/form-data">
            <!-- Campo Foto -->
            <div class="mb-3">
                <label for="foto" class="form-label">Imagen de la publicación</label>
                <input type="file" id="foto" @change="handleFileUpload" class="form-control" accept="image/*" />
                <div v-if="form.errors.foto && !form.foto" class="invalid-feedback">
                    {{ form.errors.foto }}
                </div>

                <!-- Vista previa de la imagen -->
                <div v-if="imagePreview || form.foto">
                    <h5 class="mt-2">Vista previa de la imagen:</h5>
                    <img :src="imagePreview || `/storage/blog/${form.foto}`" class="img-fluid preview-image"
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

            <!-- Campo Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea
                    id="descripcion"
                    v-model="form.descripcion"
                    class="form-control"
                    rows="5"
                    placeholder="Ingrese la descripción de la publicación"
                ></textarea>
                <div class="invalid-feedback" v-if="form.errors.descripcion">
                    {{ form.errors.descripcion }}
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="d-flex justify-content-between">
                <NavLink :href="route('admin.blog.index')" class="btn px-3 btn-admin d-flex gap-3 align-items-center">
                    <span class="arrow-left">
                        <i class="bi bi-arrow-left-circle" style="font-size: 25px;"></i>
                    </span>
                    <span class="fw-semibold">Volver a la lista</span>
                </NavLink>
                <button type="submit" class="btn btn-success d-flex  gap-3 align-items-center px-3" :disabled="form.processing">
                    <span class="crear-blog" style="font-size: 25px;">
                        <i class="bi bi-plus-circle "></i>
                    </span>
                    <span class="text-blog fw-semibold">
                        Crear Publicación
                    </span>
                </button>
            </div>
        </form>
    </div>
</template>


<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import NavLink from "@/Components/NavLink.vue";
import Swal from "sweetalert2";


// Configuración inicial del formulario
const form = useForm({
foto: null,
titulo: "",
subtitulo: "",
descripcion: "",
categoria: "",
});

// Referencia para la vista previa de la imagen
const imagePreview = ref(null);

// Función para manejar la carga del archivo y mostrar la vista previa
const handleFileUpload = (event) => {
const file = event.target.files[0];
if (file) {
    form.foto = file;
    // Crear una URL para la vista previa de la imagen
    imagePreview.value = URL.createObjectURL(file);
}
};

// Función para enviar el formulario
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

// Si la validación es correcta, continuar con el envio del formulario
form.post(route("admin.blog.store"), {
    onSuccess: () => {
        Swal.fire({
            title: "¡Blog Creado!",
            text: "El blog se ha creado correctamente.",
            icon: "success",
            confirmButtonText: "Ir al índice de blogs",
            confirmButtonColor: "#198754",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/admin/blog';
            }
        });
    },
    onError: (errors) => {
        // Mostrar errores de validación si los hay
        if (errors.titulo) {
            Swal.fire({
                title: "Error",
                text: errors.titulo[0], // Mensaje de error para título
                icon: "error",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#dc3545",
            });
            document.getElementById("titulo").classList.add("is-invalid"); // Resaltar campo título
        }
        if (errors.subtitulo) {
            Swal.fire({
                title: "Error",
                text: errors.subtitulo[0], // Mensaje de error para subtítulo
                icon: "error",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#dc3545",
            });
            document.getElementById("subtitulo").classList.add("is-invalid"); // Resaltar campo subtítulo
        }
    },
    onFinish: () => {
        form.reset(); // Resetear el formulario después de completar el proceso
    },
});
};

</script>

<style scoped>
/* General */
body {
font-family: 'Poppins', sans-serif;
background-color: #1f2029;
}

/* Sección y contenedores */
.section {
position: relative;
width: 100%;
display: block;
}

.form-container {
width: 100%;
max-width: 800px;
margin: 0 auto;
}

.content-wrapper {
/*background-color: #2a2b38;*/
border-radius: 8px;
padding: 30px;
}

/* Estilo de los inputs y el texto */
.form-group {
margin-bottom: 20px;
}

.form-style {
width: 100%;
padding: 15px;
font-size: 16px;
color: #c4c3ca;
border: none;
border-radius: 6px;
outline: none;
box-shadow: 0 4px 8px rgba(21, 21, 21, 0.);
}

/* Iconos */
.input-icon {
position: absolute;
top: 0;
left: 18px;
height: 48px;
font-size: 24px;
line-height: 48px;
text-align: left;
color: #d60d0d;
}

/* Estilo de la vista previa de la imagen */
.image-preview {
width: 100px;
max-width: 100%;
margin-left: auto;
margin-right: auto;
}

.preview-img {
max-width: 100%;
max-height: 250px;
object-fit: cover;
border-radius: 6px;
}




.preview-image {
max-width: 150px;
}
</style>
