<template>
    <div class="process max-width">
        <!-- Título con línea roja -->
        <div class="process-title">
            <h2 class="title">NUESTRO PROCESO DE TRABAJO</h2>
            <!-- Divider rojo más largo que el título -->
            <div class="divider"></div>
        </div>

        <!-- Sección de proceso con imagen y texto -->
        <div class="process-section p-5">
            <div class="process-step">
                <div class="image-container">
                    <img
                        :src="contactImage"
                        alt="Contacto y visita al inmueble"
                    />
                </div>
                <div class="text-container">
                    <h3>Contacto y visita al inmueble</h3>
                    <p>
                        Lo primero es siempre realizar un reconocimiento del
                        inmueble para conocer sus particularidades
                        constructivas. Y a su vez atender las necesidades del
                        cliente para poder realizar un presupuesto a su medida.
                    </p>
                </div>
            </div>

            <div class="process-step">
                <div class="image-container">
                    <img :src="projectImage" alt="Presentación del proyecto" />
                </div>
                <div class="text-container">
                    <h3>Presentación del proyecto</h3>
                    <p>
                        A través de los planos que le presentaremos, podrá ver
                        el resultado de la obra antes de comenzar. 100% adaptado
                        a lo que Vd. necesita.​
                    </p>
                </div>
            </div>

            <div class="process-step">
                <div class="image-container">
                    <img :src="budgetImage" alt="Aceptación del presupuesto" />
                </div>
                <div class="text-container">
                    <h3>Aceptación del presupuesto</h3>
                    <p>
                        Iniciamos la obtención de permisos y licencias si fueran
                        necesarios. Nos encargamos de todos los trámites con el
                        Ayuntamiento, para que Vd. solo tenga que preocuparse
                        del seguimiento de la obra y el resultado final.
                    </p>
                </div>
            </div>

            <div class="process-step">
                <div class="image-container">
                    <img
                        :src="timelineImage"
                        alt="En el mínimo plazo posible"
                    />
                </div>
                <div class="text-container">
                    <h3>En el mínimo plazo posible</h3>
                    <p>
                        Es para nosotros una prioridad esencial cumplir con los
                        plazos sin rebajar en ningún caso nuestros estándares de
                        calidad.
                    </p>
                </div>
            </div>

            <div class="process-step">
                <div class="image-container">
                    <img :src="cleaningImage" alt="Limpieza final y entrega" />
                </div>
                <div class="text-container">
                    <h3>Limpieza final y entrega</h3>
                    <p>
                        Acabada la obra, se realiza una limpieza integral del
                        inmueble, dejándolo listo para su uso y disfrute.
                    </p>
                </div>
            </div>

            <div class="process-step">
                <div class="image-container">
                    <img :src="happyClientImage" alt="Cliente satisfecho" />
                </div>
                <div class="text-container">
                    <h3>Cliente satisfecho</h3>
                    <p>
                        Los clientes satisfechos con nuestro trabajo son nuestra
                        mejor publicidad.
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import contactImage from "@images/Nosotros/Trabajo1.jpg";
import projectImage from "@images/Nosotros/Trabajo2.jpg";
import budgetImage from "@images/Nosotros/Trabajo3.jpg";
import timelineImage from "@images/Nosotros/Trabajo4.jpg";
import cleaningImage from "@images/Nosotros/Trabajo5.jpg";
import happyClientImage from "@images/Nosotros/Trabajo6.jpg";
</script>

<style scoped>
.process {
    font-family: "Roboto", sans-serif;
    color: #000;
}

.process-title {
    text-align: center;
    margin-bottom: 30px;
}

.title {
    font-size: 32px;
    font-weight: 700;
    position: relative;
    display: inline-block;
    color: rgb(214, 13, 13);
}

.divider {
    width: 60%; /* Ajusta el ancho para que sea más largo que el título */
    height: 4px;
    background-color: #d60d0d;
    margin-top: 10px;
    margin-left: 20%; /* Para centrar el divider debajo del título */
}

.process-section {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
    margin-top: 20px;
}

.process-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 30%;
}

.image-container {
    width: 30%;
    margin-bottom: 15px;
}

.image-container img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.text-container {
    text-align: center;
    font-family: "Roboto", sans-serif;
    font-weight: 400;
    color: rgb(0, 0, 0);
    font-size: 13px ;
    line-height: 20px;
}

.text-container h3 {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 10px;
}
</style>
