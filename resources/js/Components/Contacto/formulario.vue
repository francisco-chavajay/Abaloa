<template>
    <div class="contact-form-container">
        <div class="form-header">
            <h2 class="form-title">CONTÁCTANOS</h2>
        </div>

        <form class="contact-form" @submit.prevent="handleSubmit">
            <input type="hidden" name="post_id" value="721">
            <input type="hidden" name="form_id" value="aa9c445">
            <input type="hidden" name="referer_title" value="CONTACTO - Construcciones Abaloa">
            <input type="hidden" name="queried_id" value="721">

            <div class="row g-3">
                <!-- Name Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form-field-name" class="form-label visually-hidden">Nombre</label>
                        <input type="text" name="form_fields[name]" id="form-field-name" class="form-control"
                            placeholder="Nombre" v-model="formData.name">
                    </div>
                </div>

                <!-- Last Name Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form-field-field_28b4528" class="form-label visually-hidden">Apellido</label>
                        <input type="text" name="form_fields[field_28b4528]" id="form-field-field_28b4528"
                            class="form-control" placeholder="Apellido" v-model="formData.last_name">
                    </div>
                </div>

                <!-- Email Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form-field-email" class="form-label visually-hidden">Email</label>
                        <input type="email" name="form_fields[email]" id="form-field-email" class="form-control"
                            placeholder="Correo" required v-model="formData.email">
                    </div>
                </div>

                <!-- Phone Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form-field-field_4d8980b" class="form-label visually-hidden">Telefono</label>
                        <input type="tel" name="form_fields[field_4d8980b]" id="form-field-field_4d8980b"
                            class="form-control" placeholder="Teléfono" pattern="[0-9()#&\+*-=.]+"
                            title="Solo se aceptan números y caracteres de teléfono (#,-,*,etc)."
                            v-model="formData.phone">
                    </div>
                </div>

                <!-- Message Field -->
                <div class="col-12">
                    <div class="form-group">
                        <label for="form-field-message" class="form-label visually-hidden">Mensaje</label>
                        <textarea class="form-control" name="form_fields[message]" id="form-field-message" rows="4"
                            placeholder="Mensaje" v-model="formData.message"></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12 text-center">
                    <button class="btn btn-submit" type="submit">
                        <span class="btn-content">
                            <span class="btn-text">ENVIAR</span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import Swal from 'sweetalert2';

// Declaración de datos reactivos
const formData = ref({
    name: '',
    last_name: '',
    email: '',
    phone: '',
    message: ''
});

// Función para manejar el envío del formulario
const handleSubmit = async () => {
    // Mostrar el loader antes de enviar
    const loadingSwal = Swal.fire({
        title: "Enviando formulario...",
        html: "Por favor espera mientras procesamos tu mensaje.",
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        },
    });

    try {
        // Realizar la solicitud POST para enviar los datos del formulario
        await axios.post('/contact', formData.value);

        // Cerrar el loader después de la respuesta
        loadingSwal.close();

        // Limpiar el formulario después de enviar
        formData.value = { name: '', last_name: '', email: '', phone: '', message: '' };

        // Mostrar mensaje de éxito
        Swal.fire({
            icon: 'success',
            title: 'Mensaje enviado correctamente',
            text: 'Gracias por contactarnos. Nos pondremos en contacto contigo pronto.',
        });
    } catch (error) {
        // Cerrar el loader en caso de error
        loadingSwal.close();

        // Mostrar un mensaje de error
        console.error('Error al enviar el formulario:', error.response?.data || error.message);
        Swal.fire({
            icon: 'error',
            title: 'Hubo un error al enviar el formulario',
            text: 'Por favor, inténtalo nuevamente más tarde.',
        });
    }
};
</script>



<style scoped>
.contact-form-container {
    margin: 0 auto;
}

.form-header {
    text-align: center;
    margin-bottom: 30px;
}

.form-title {
    font-family: Roboto, sans-serif;
    font-size: 30px;
    font-weight: 700;
    color: #333;
    margin: 0;
    padding: 0;
    text-transform: uppercase;
}

.contact-form {
    background-color: #fff;
    border-radius: 5px;
    border: none;
    /* Hace el formulario plano */
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    font-size: 14px;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 3px solid #D60D0D;
    /* Borde rojo */
    border-radius: 4px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus {
    border-color: red;
    /* Borde rojo al hacer foco */
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25);
    /* Sombra roja al hacer foco */
}

textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

.btn-submit {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 12px 30px;
    font-size: 14px;
    line-height: 1.5;
    border-radius: 4px;
    transition: all 0.3s ease;
    cursor: pointer;
    background-color: #D60D0D;
    /* Botón rojo */
    color: #fff;
    width: 100%;
    /* Botón ocupa el 100% */
    max-width: 200px;
}

.btn-submit:hover {
    background-color: darkred;
    /* Color rojo oscuro al pasar el ratón */
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.btn-content {
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-text {
    font-weight: 600;
    text-transform: uppercase;
}

/* Responsive adjustments */
@media (max-width: 767px) {
    .contact-form {
        padding: 20px;
    }

    .form-title {
        font-size: 24px;
    }

    .btn-submit {
        max-width: 100%;
    }
}
</style>
