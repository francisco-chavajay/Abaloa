<template>
    <header class="sticky-top bg-white shadow-sm">
      <!-- Top Info Bar -->
      <div class="top-bar py-2 bg-white text-dark">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <!-- Imagen a la izquierda -->
            <div class="top-image">
              <Link href="/">
                <img :src="logo" alt="Logo" class="info-img" />
              </Link>
            </div>

            <!-- Información de contacto a la derecha -->
            <div class="top-info d-flex flex-column flex-md-row text-end text-danger">
              <span class="d-inline-block me-3">
                <i class="bi bi-envelope-fill me-1"></i> info@constructoreneabalda.com
              </span>
              <span class="d-inline-block me-3">
                <i class="bi bi-telephone-fill me-1"></i> Carlos: +34 667 43 83 98
              </span>
              <span class="d-inline-block">
                <i class="bi bi-telephone-fill me-1"></i> Juan: +34 679 44 20 79
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Navigation -->
      <nav class="navbar navbar-light" style="height: 85px;">
        <div class="container">
          <ul class="navbar-nav d-flex flex-row ms-auto">
            <li class="nav-item mx-2">
              <Link
                href="/"
                class="nav-link px-3 py-2 fw-bold text-uppercase"
                active-class="active"
              >Inicio</Link>
            </li>
            <li class="nav-item mx-2">
              <Link
                href="/nosotros"
                class="nav-link px-3 py-2 fw-bold text-uppercase"
                active-class="active"
              >Nosotros</Link>
            </li>
            <li class="nav-item mx-2">
              <Link
                href="/servicios"
                class="nav-link px-3 py-2 fw-bold text-uppercase"
                active-class="active"
              >Servicios</Link>
            </li>
            <li class="nav-item mx-2">
              <Link
                href="/"
                class="nav-link px-3 py-2 fw-bold text-uppercase"
                active-class="active"
              >Proyectos</Link>
            </li>
            <li class="nav-item mx-2">
              <Link
                href="/blog"
                class="nav-link px-3 py-2 fw-bold text-uppercase"
                active-class="active"
              >Blog</Link>
            </li>
            <li class="nav-item mx-2">
              <Link
                href="/contacto"
                class="nav-link px-3 py-2 fw-bold text-uppercase"
                active-class="active"
              >Contacto</Link>
            </li>
          </ul>
        </div>
      </nav>
    </header>
  </template>

  <script setup>
  import { ref } from 'vue';
  import { Link } from '@inertiajs/vue3';
  import logo from '@images/LogoAbaloa.png';

  const menuOpen = ref(false);

  const toggleMenu = () => {
    menuOpen.value = !menuOpen.value;
  };
  </script>

  <style scoped>
  .nav-link {
    color: white !important;
    letter-spacing: 1px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    position: relative; /* Necesario para posicionar la línea */
    padding-bottom: 5px;
  }

  .nav-link::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: 0;
    width: 120%; /* Más ancho que el texto */
    height: 3px; /* Grosor de la línea */
    background-color: white; /* Color de la línea */
    transform: translateX(-50%) scaleX(0); /* Oculta la línea inicialmente */
    transition: transform 0.3s ease-in-out;
  }

  .nav-link:hover::after,
  .nav-link.active::after {
    transform: translateX(-50%) scaleX(1); /* Muestra la línea al hacer hover o al estar activo */
  }

  /* Top Info Bar */
  .top-bar {
    font-size: 0.9rem;
  }

  /* Imagen en Top Info Bar */
  .top-image .info-img {
    max-height: 100px;
    width: 300px !important;
    height: auto;
    cursor: pointer;
  }

  /* Main Navigation */
  .navbar {
    background-color: #C00E12;
  }

  .info-img {
    width: 100% !important;
    height: 100% !important;
  }

  .nav-link {
    color: white !important;
    letter-spacing: 1px;
    font-size: 14px !important;
    transition: all 0.3s ease;
  }

  .nav-link:hover,
  .nav-link.active {
    color: #ffcccb !important;
  }

  @media (max-width: 991.98px) {
    .navbar-collapse {
      padding: 1rem 0;
      border-top: 1px solid rgba(255, 255, 255, 0.2);
    }

    .nav-item {
      margin: 0.25rem 0;
    }

    .nav-link {
      padding: 0.5rem 1rem;
    }
  }
  </style>
