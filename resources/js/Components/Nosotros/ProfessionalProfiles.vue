<template>
    <div class="professional-profiles">
      <!-- Sección del título con fondo -->
      <div class="header-section d-flex flex-column align-items-center justify-content-center text-white">
        <p class="text-p">CONSTRUCCIONES ABALOA</p>
        <h1 class="text-header">TODA NUESTRA EXPERIENCIA A TU DISPOSICIÓN</h1>
      </div>

      <!-- Divider grande rojo -->
      <div class="divider"></div>

      <!-- Sección de Nuestro Equipo -->
      <div class="container my-5">
        <div class="row justify-content-center">
          <!-- Perfil de Carlos -->
          <div class="col-12 col-lg-10 mb-4">
            <div class="row align-items-start">
              <div class="col-12 col-md-8">
                <div class="text-section">
                  <h3 class="card-title">Carlos Abascal Diego</h3>
                  <p>Visiendo del mundo de las <strong>instalaciones de chimeneas desde 1993</strong>, tanto en instalaciones de arte, colaborador, poleta, hermana y como delegado de la zona norte de España de una prestigiosa fábrica italiana llamada <strong><a href="https://www.edilkamin.com/es/homepage" class="red-link">Edilkamin Iberica</a></strong>.</p>
                  <p>Tras años de experiencia en este sector se fortalecen las relaciones entre colaboradores afines de otros guerrios y en el cual comenzamos un vínculo con expertos en el sector inmobiliario, donde me encuentro con <a href="https://lopezalonsoinmobiliaria.com/" class="red-link">López-Alonso Inmobiliaria</a> y a raíz de este encuentro se detectan nuevas necesidades que van ligadas al asesoramiento, planificación, acompañamiento y ejecución de reformas y rehabilitaciones.</p>
                  <p>Tras una larga relación nace en 2017 un proyecto empresarial en plena expansión denominada <strong>CONSTRUCCIONES ABALOA</strong>.</p>
                </div>
              </div>
              <div class="col-12 col-md-4 text-center">
                <img :src="carlos" alt="Carlos Abascal Diego" class="profile-img" />
              </div>
            </div>
          </div>

          <!-- Perfil de Juan -->
          <div class="col-12 col-lg-10 mb-4">
            <div class="row align-items-start flex-md-row-reverse">
              <div class="col-12 col-md-8">
                <div class="text-section">
                  <h3 class="card-title">Juan López-Alonso Santibañez</h3>
                  <p>Habiendo pasado quince años ligado al mundo de la hostelería, encuentro un rotundo cambio a través de <a href="https://lookandfind.es/" class="red-link">Look And Find</a> al involucrarme en el <strong>mundo inmobiliario</strong> donde comienao en el año 2000 sumando una gran experiencia en este sector desde entonces.</p>
                  <p>Una vez abierta esta puerta, comencé a compartir una larga trayectoria de la mano de grandes entidades dentro de este sector como pudieron ser <a href="https://www.distritoinmobiliario.com/" class="red-link">DISTRITO INMOBILIARIO</a> e <a href="https://www.inmobarrio.com/" class="red-link">INMOBILIARIA BARRIO</a>, etapa en la que obtuve infinidad de contactos y que me llevaron a apostar mi vida profesional y orientarla al sector inmobiliario definitivamente.</p>
                  <p>Dirigiendo mi papel a la gestión integral de las necesidades de mis clientes, esto me lleva a crear mi propia marca <a href="https://lopezalonsoinmobiliaria.com/" class="red-link">López-Alonso Inmobiliaria</a> y a su vez iniciar en 2017 mi otro proyecto empresarial <strong>CONSTRUCCIONES ABALOA</strong>, ligado con mi compañero Carlos Abascal, apostando por un servicio de calidad y comprometido.</p>
                </div>
              </div>
              <div class="col-12 col-md-4 text-center">
                <img :src="juan" alt="Juan López-Alonso Santibañez" class="profile-img" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script setup>
import carlos from "@images/nosotros/carlos.jpg";
import juan from "@images/nosotros/Juan.jpg";
</script>

<style scoped>
.professional-profiles {
  font-family: 'Arial', sans-serif;
}

/* Sección de título con fondo */
.header-section {
  background: url('@images/StartPage/Mesa-de-trabajo-background.jpg') fixed;
  background-size: cover;
  height: 100px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: white;
  font-weight: bold;
}

/* Divider grande rojo */
.divider {
  height: 80px;
  background-color: #D60D0D;
  margin: 0;
}

/* Estilos de tarjetas de perfil */
.text-section {
  padding: 20px;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
  font-size: 15px;
  line-height: 23px;
  color: rgb(0, 0, 0);
  text-align:justify;
}

.profile-img {
  width: 100%;
  max-width: 100%;
  height: auto;
  border-radius: 10px;
}

.card-title {
  font-family: 'Allerta', sans-serif;
  font-weight: 600;
  font-size: 30px;
  line-height: 30px;
  color: rgb(214, 13, 13);
  margin-bottom: 15px;
}

.red-link {
  color: #c36;
  font-weight: bold;
  text-decoration: underline;
  text-decoration-color: #c36;
}

/* Ajuste del título */
.text-p {
  color: rgb(165, 165, 165);
  font-size: 15px;
  font-family: Roboto, Sans-serif;
  font-weight: bold;
  margin-bottom: 5px;
}

.text-header {
  color: rgb(214, 13, 13);
  font-size: 20px;
  font-family: Roboto, Sans-serif;
  font-weight: 700;
}
</style>
