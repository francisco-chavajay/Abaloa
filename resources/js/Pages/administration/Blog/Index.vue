<script setup>
import { defineProps } from "vue";
import { Head } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
import Swal from "sweetalert2";
import axios from "axios";

// Se define la prop que recibe un objeto con datos paginados
const props = defineProps({
    blogs: Object,
});

//console.log(props.blogs);

// Función para manejar la eliminación de un blog
function deleteBlog(blogId) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        confirmButtonColor: "#d60d0d",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            axios
                .delete(`/admin/blog/${blogId}`)
                .then((response) => {
                    Swal.fire("¡Eliminado!", "El blog ha sido eliminado.", "success");
                    // Redirigir o actualizar la vista
                    location.reload();
                })
                .catch((error) => {
                    Swal.fire("¡Error!", "No se pudo eliminar el blog. Intenta de nuevo más tarde.", "error");
                });
        }
    });
}
</script>

<template>
        <Head title="Administración de Blogs" />

        <div class="container mt-5 py-5">
            <h1 class="mb-4">Administración de Blogs</h1>
            <div class="crear-blog mb-3">
                <!-- Botón con ícono para crear un nuevo blog -->
                <NavLink
                    href="/admin/blog/create"
                    class="btn btn-success w-auto d-inline-block"
                >
                    <span class="info px-5 d-block py-2">
                        <i class="bi bi-plus-lg me-2"></i> Crear nuevo blog
                    </span>
                </NavLink>
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Subtítulos</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ahora se itera sobre los blogs dentro de la propiedad 'data' -->
                    <tr v-for="blog in props.blogs.data" :key="blog.id">
                        <td>{{ blog.titulo }}</td>
                        <td>{{ blog.subtitulo }}</td>
                        <td>{{ blog.categoria }}</td>
                        <td>
                            <div class="img-preview" style="width: 100px">
                                <img
                                    :src="`/storage/blog/${blog.foto}`"
                                    class="w-100 img-fluid"
                                    alt="Blog preview"
                                />
                            </div>
                        </td>

                        <td>
                            <div class="buttons-action d-flex">
                                <!-- Botón con ícono para editar -->
                                <NavLink
                                    :href="route('admin.blog.edit', blog.id)"
                                    class="btn btn-success btn-sm me-2 d-inline-flex align-items-center"
                                >
                                    <i class="bi bi-pencil me-1"></i> Editar
                                </NavLink>

                                <!-- Botón con ícono para ver (Show) -->
                                <NavLink
                                    :href="route('admin.blog.show', blog.id)"
                                    class="btn btn-warning btn-sm me-2 d-inline-flex align-items-center"
                                >
                                    <i class="bi bi-eye me-1"></i> Ver
                                </NavLink>

                                <!-- Botón con ícono para eliminar -->
                                <button
                                    @click="deleteBlog(blog.id)"
                                    class="btn btn-danger btn-sm d-inline-flex align-items-center"
                                >
                                    <i class="bi bi-trash me-1"></i> Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Paginación -->
            <div class="d-flex justify-content-center mt-4">
                <!-- Primer botón de paginación -->
                <NavLink
                    v-if="props.blogs.prev_page_url"
                    :href="props.blogs.prev_page_url"
                    class="btn btn-admin me-2"
                >
                    <i class="bi bi-arrow-left-circle me-2"></i> Anterior
                </NavLink>

                <!-- Mostrar el número de página actual -->
                <span class="d-flex align-items-center me-3">
                    Página {{ props.blogs.current_page }} de {{ props.blogs.last_page }}
                </span>

                <!-- Último botón de paginación -->
                <NavLink
                    v-if="props.blogs.next_page_url"
                    :href="props.blogs.next_page_url"
                    class="btn btn-admin"
                >
                    <i class="bi bi-arrow-right-circle me-2"></i> Siguiente
                </NavLink>
            </div>
        </div>
</template>

<style scoped>
.table th,
.table td {
    vertical-align: middle;
}

.table th,
.table td {
    font-size: .9rem;
}

.pagination-controls {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination-controls span {
    align-self: center;
    margin-left: 10px;
}
</style>
