<template>
    <div class="why-choose-us">
      <!-- Sección con fondo rojo semitransparente -->
      <div class="content-section">
        <div class="overlay"></div>
        <div class="content max-width">
            <!-- Imagen principal -->
            <div class="image-container">
                <img :src="mainImage" alt="Construcciones Abalóa" class="main-image" />
            </div>
          <h2 class="title">¿POR QUÉ ELEGIRNOS?</h2>
          <p>
            Construcciones Abalóa lo formamos un amplio grupo de profesionales de Cantabria,
            con una experiencia de más de 20 años en el sector de la construcción y reformas.
          </p>
          <p>
            Por ello somos capaces de desarrollar todo tipo de obras, desde un pequeño lavado de cara
            a la reforma integral de su vivienda o local comercial.
          </p>

          <!-- Lista de razones -->
          <ul class="reasons-list">
            <li><strong>EXPERIENCIA:</strong> <br>Con muchos años de carrera profesional en Cantabria y resto de España, lo que Vd. necesita, ya lo hemos hecho antes.</li>
            <li><strong>CALIDAD DE MATERIALES:</strong> <br> Porque solo lo mejor consigue el mejor resultado.</li>
            <li><strong>PROFESIONALIDAD:</strong><br> Para cada parte de la obra, siempre el mejor profesional, de lo que resulta una suma de calidades que entrega un trabajo inmejorable.</li>
            <li><strong>DIRECCIÓN DE OBRA PROPIA:</strong><br> Nuestros expertos dirigirán como nadie los aspectos técnicos, estéticos y urbanísticos asegurando lo mejor para nuestros clientes.</li>
            <li><strong>LIMPIEZA Y PUNTUALIDAD:</strong><br> Entregamos nuestras obras para entrar a vivir, no es necesario que invierta más tiempo y dinero en contratar un servicio de limpieza.</li>
          </ul>
        </div>
      </div>
    </div>
</template>

<script setup>
import mainImage from "@images/nosotros/porque-elegirnos.png";
</script>

<style scoped>
.why-choose-us {
  font-family: 'Roboto', sans-serif;
  color: white;
  text-align: justify;
}

.image-container {
  padding: 0;
}

.main-image {
  width: 60%;
  max-width: 300px;
  height: auto;
}

.content-section {
  position: relative;
  background: url('@images/StartPage/Mesa-de-trabajo-background.jpg') no-repeat fixed;
  display: flex;
  align-items: center;
  justify-content: start;
  line-height:23px;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(214, 13, 13, 0.9);
  z-index: 0;
}

.content {
  position: relative;
  z-index: 1;
  max-width: 800px;
}

.title {
  font-size: 28px;
  font-weight: 700;
  border-bottom: 4px solid white;
  display: inline-block;
  padding-bottom: 5px;
}

.reasons-list {
  list-style-type: disc;
  text-align: left;
  padding-left: 20px;
  line-height:22px;
  width: 60%;
}

.reasons-list li {
  font-size: 16px;
  line-height: 14px;
  margin-bottom: 10px;
  line-height:32px;
  text-align: justify;
}

.reasons-list strong {
  font-weight: 700;
}
</style>
