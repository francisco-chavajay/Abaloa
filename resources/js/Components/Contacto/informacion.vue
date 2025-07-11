<template>
    <section class="contact-info-section py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Address Column -->
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="icon-box-icon">
                            <a href="https://www.google.com/maps?um=1&amp;ie=UTF-8&amp;fb=1&amp;gl=es&amp;sa=X&amp;geocode=KQEAhI7LS0kNMQhrD-9hNbgo&amp;daddr=P.%C2%BA+Men%C3%A9ndez+Pelayo,+6,+39006+Santander,+Cantabria"
                                class="icon-link" aria-label="NUESTRA DIRECCIÓN">
                                <i class="fa-solid fa-location-arrow"></i>
                            </a>
                        </div>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">
                                <a
                                    href="https://www.google.com/maps?um=1&amp;ie=UTF-8&amp;fb=1&amp;gl=es&amp;sa=X&amp;geocode=KQEAhI7LS0kNMQhrD-9hNbgo&amp;daddr=P.%C2%BA+Men%C3%A9ndez+Pelayo,+6,+39006+Santander,+Cantabria">
                                    NUESTRA DIRECCIÓN
                                </a>
                            </h3>
                            <p class="icon-box-description">
                                <a
                                    href="https://www.google.com/maps/place//data=!4m2!3m1!1s0xd494bcb8e840001:0x28b83561ef0f6b08?sa=X&amp;ved=1t:8290&amp;ictx=111">
                                    P.º Menéndez Pelayo, 6 - 39006 - Santander - Cantabria
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Email Column -->
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="icon-box-icon">
                            <a href="mailto:info@construccionesabaloa.com" class="icon-link" aria-label="CORREO">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">
                                <a href="mailto:info@construccionesabaloa.com">
                                    CORREO
                                </a>
                            </h3>
                            <p class="icon-box-description">
                                info@construccionesabaloa.com
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Phone Column -->
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="icon-box-icon">
                            <span class="icon">
                                <i class="fas fa-mobile-alt"></i>
                            </span>
                        </div>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">
                                <span>
                                    TELÉFONOS DE CONTACTO
                                </span>
                            </h3>
                            <p class="icon-box-description">
                                Carlos: +34 667 43 82 98 / Juan: +34 678 44 20 79
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
</script>

<style scoped>
.contact-info-section {
    background-color: #fff;
    color: #333;
}

.icon-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    height: 100%;
    padding: 20px;
    transition: all 0.3s ease;
}

.icon-box:hover {
    transform: translateY(-5px);
}

.icon-box-icon {
    margin-bottom: 15px;
}

.icon-box-icon .icon-link,
.icon-box-icon .icon {
    display: inline-flex;
    align-items: center;
    text-decoration: none;
    justify-content: center;
    width: 75px;  /* Iconos 75x75 */
    height: 75px;
    color: #D60D0D;   /* Iconos en color rojo */
    font-size: 75px;  /* Tamaño de los iconos */
    transition: all 0.3s ease;
}

.icon-box-content {
    flex: 1;
}

.icon-box-title {
    font-size: 20px;  /* Tamaño del título */
    font-weight: 700;  /* Negrita */
    text-decoration: underline;  /* Subrayado */
    margin-bottom: 10px;
}

.icon-box-title a {
    color: inherit;
    transition: color 0.3s ease;
}


.icon-box-description {
    font-weight: 400;  /* Peso de la fuente */
    font-size: 14px;  /* Tamaño de la fuente */
    color: #6c757d;
    margin-bottom: 0;
}

.icon-box-description a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
}

@media (min-width: 768px) {
    .icon-box {
        flex-direction: column;
        /* Asegura que los iconos estén centrados */
        text-align: center;
    }

    .icon-box-icon {
        margin-bottom: 15px;
    }
}
</style>
