<template>
    <section class="bg-image-section">
      <div class="container py-5 text-center text-white max-width">
        <!-- Título y párrafo -->
        <div class="title-proyectos">
          <h2 class="fw-bold mb-4">Bienvenidos a nuestro servicio</h2>
          <p class="lead">Ofrecemos una amplia gama de servicios de construcción con la mejor calidad y profesionalidad.</p>
        </div>

        <!-- Cards -->
        <div class="row g-4 mt-5 justify-center">
          <!-- Card 1 -->
          <div class="col-12 col-md-4" style="width: 282px;">
            <div class="card shadow bg-transparent border-white d-flex flex-column h-100">
              <div class="card-img-top">
                <img src="@images/StartPage/Proyectos1.jpg" alt="Imagen 1" class="img-fluid card-image" />
              </div>
              <div class="card-body">
                <h5 class="card-title">Juan XXIII</h5>
                <p class="card-text">Reforma Integral de piso en Calle Juan XXIII, Santander, 39001, España.</p>
                <button class="btn btn-light btn-card">Leer más</button>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="col-12 col-md-4" style="width: 282px;">
            <div class="card shadow bg-transparent border-white d-flex flex-column h-100">
              <div class="card-img-top">
                <img src="@images/StartPage/Proyectos2.jpg" alt="Imagen 2" class="img-fluid card-image" />
              </div>
              <div class="card-body">
                <h5 class="card-title">Liendo</h5>
                <p class="card-text">Casa Indiana, en la población de Liendo, Cantabria, 39776, España.</p>
                <button class="btn btn-light btn-card">Leer más</button>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="col-12 col-md-4" style="width: 282px;">
            <div class="card shadow bg-transparent border-white d-flex flex-column h-100">
              <div class="card-img-top">
                <img src="@images/StartPage/Proyectos3.jpg" alt="Imagen 3" class="img-fluid card-image" />
              </div>
              <div class="card-body">
                <h5 class="card-title">Reforma de clínicas</h5>
                <p class="card-text">Reforma Integral de clínica de fisioterapia en Santander, 39005, España.</p>
                <button class="btn btn-light btn-card">Leer más</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>

  <script setup>
  import { ref } from 'vue';
  </script>

  <style scoped>
  /* Fondo con la imagen y capa roja */
  .bg-image-section {
    position: relative;
    background: url('@images/StartPage/backgroundProyectos.jpg') no-repeat center center fixed;
    background-size: cover;
    padding: 20px 0;
    color: #fff;
    z-index: 0;
  }

  .card-title{
    font-weight: bold;
    margin-bottom: 20px;
  }

  /* Capa roja semi-transparente */
  .bg-image-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(220, 2, 2, 0.8); /* Capa roja semi-transparente */
    z-index: -1;
  }

  /* Estilo para el texto del título */
  .title-proyectos {
    color: white !important;
    position: relative;
    z-index: 2;
  }

  .btn-card{
    width: 150px;
    color: #A91018;
    text-decoration: underline;
  }

  /* Estilo para las cards */
  .card {
    position: relative;
    z-index: 2;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: transparent; /* Fondo transparente */
    border: 4px solid white; /* Borde blanco */
  }

  /* Asegurando que las tarjetas tengan el mismo tamaño */
  .card-body {
    padding: 20px;
    text-align: start;
    flex-grow: 1; /* Hace que la tarjeta ocupe todo el espacio disponible */
    color: white;
  }

  .card-img-top {
    position: relative;
    overflow: hidden;
  }

  /* Asegurando que las imágenes tengan el tamaño 282x200px */
  .card-img-top .card-image {
    width: 282px;
    height: 200px;
    object-fit: cover; /* Hace que la imagen se recorte para ajustarse sin distorsionarse */
    transition: transform 0.5s ease;
  }

  /* Efecto de animación al pasar el ratón sobre la imagen */
  .card-img-top:hover .card-image {
    transform: scale(1.1);
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
  }

  /* Responsividad */
  @media (max-width: 768px) {
    .bg-image-section {
      padding: 80px 0;
    }
  }
  </style>
