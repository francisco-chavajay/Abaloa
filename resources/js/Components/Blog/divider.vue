<template>
    <section class="container my-5">
      <!-- Divider -->
      <div class="custom-divider d-flex flex-column flex-lg-row justify-content-center align-items-center p-4 rounded">
        <div class="text-white mb-3 mb-lg-0 me-lg-3">
          <h5 class="fw-bold mb-2">¿TIENES ALGUNA DUDA?</h5>
          <p class="mb-0">
            Desde nuestro Centro de Audición en Santander contestaremos a todas tus preguntas
            y te asesoraremos lo mejor posible sin compromiso.
          </p>
        </div>
        <a href="/contacto" class="btn custom-btn">Contáctanos</a>
      </div>

      <!-- Información Adicional -->
      <div class="mt-5 max-width">
        <h4 class="fw-bold">Construcciones Abalóa en Santander</h4>
        <p>
          Construcciones Abalóa lo formamos un amplio grupo de profesionales, con una experiencia de más de 20 años en el sector de la construcción y reformas en Cantabria.
          Por ello somos capaces de desarrollar todo tipo de obras, desde un pequeño lavado de cara a la reforma integral de su vivienda o local comercial.
        </p>
        <p>
          Contamos también con una larga trayectoria en el mercado inmobiliario en Cantabria. Somos profesionales, a los que nos enorgullece nuestro trabajo.
        </p>
        <p>
          Si necesitáis ayuda profesional no dudéis en contactar con nosotros. En Construcciones Abalóa te ofrecemos todas las facilidades para que podáis recibir una atención personalizada y de calidad.
        </p>
        <p>
          Por eso, si te animas a dejarnos una reseña en Google, contribuirás a nuestro proceso de crecimiento. ¡Gracias!
        </p>

        <h5 class="fw-bold mt-4">¿Por qué contar con Construcciones Abalóa?</h5>
        <p>
          Construcciones Abalóa lo formamos un amplio grupo de profesionales de Cantabria, con una experiencia de más de 20 años en el sector de la construcción y reformas.
        </p>

        <ul>
          <li>EXPERIENCIA</li>
          <li>CALIDAD DE MATERIALES</li>
          <li>PROFESIONALIDAD</li>
          <li>DIRECCIÓN DE OBRA PROPIA</li>
          <li>LIMPIEZA Y PUNTUALIDAD</li>
        </ul>

        <p>
          Quédate y descubre los contenidos de este blog para encontrar ideas o información de utilidad.
          Si tienes cualquier duda o sugerencia, no dudes en contactar con nuestro equipo. ¡Estaremos encantados de atenderte!
        </p>
      </div>
    </section>
  </template>

  <script setup>
  // No necesitas lógica JS por ahora
  </script>

  <style scoped>
  .custom-divider {
    background-color: #D60D0D;
    height:150px;
    .custom-btn {
      background-color: white;
      color: #D60D0D;
      border: 2px solid white;
      padding: 0.5rem 1.5rem;
      font-weight: bold;
      transition: all 0.3s ease;

      &:hover {
        background-color: black;
        color: white;
        border-color: black;
      }
    }
  }

  li{
    list-style-type: disc;
    margin-bottom: 0.5rem;
  }
  </style>
