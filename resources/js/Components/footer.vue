<template>
    <footer class="bg-dark text-white pt-5 pb-4">
      <div class="container">
        <div class="row">
          <!-- Navegación -->
          <div class="col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase fw-bold mb-4">NAVEGACIÓN</h5>
            <div class="row">
              <div class="col-6">
                <ul class="list-unstyled">
                  <li class="mb-2">
                    <Link href="/" class="text-white text-decoration-none hover-primary">Inicio</Link>
                  </li>
                  <li class="mb-2">
                    <Link href="/nosotros" class="text-white text-decoration-none hover-primary">Nosotros</Link>
                  </li>
                  <li class="mb-2">
                    <Link href="/servicios" class="text-white text-decoration-none hover-primary">Servicios</Link>
                  </li>
                </ul>
              </div>
              <div class="col-6">
                <ul class="list-unstyled">
                  <li class="mb-2">
                    <Link href="/" class="text-white text-decoration-none hover-primary">Proyectos</Link>
                  </li>
                  <li class="mb-2">
                    <Link href="/" class="text-white text-decoration-none hover-primary">Blog</Link>
                  </li>
                  <li class="mb-2">
                    <Link href="/" class="text-white text-decoration-none hover-primary">Contacto</Link>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Contacto -->
          <div class="col-md-6">
            <h5 class="text-uppercase fw-bold mb-4">CONTÁCTANOS</h5>
            <ul class="list-unstyled">
              <li class="mb-2">
                <i class="bi bi-envelope me-2"></i> info@construccionestablos.com
              </li>
              <li class="mb-2">
                <i class="bi bi-telephone me-2"></i> Carlos: +34 657 43 82 98
              </li>
              <li class="mb-3">
                <i class="bi bi-telephone me-2"></i> Juan: +34 678 44 20 79
              </li>
              <li class="text-muted small">
                Referencia y construcciones en Santander, Cantabria con una dilatada experiencia y calidad al mejor precio.
              </li>
            </ul>
          </div>
        </div>

        <hr class="my-4 bg-secondary">

        <!-- Copyright y políticas -->
        <div class="row">
          <div class="col-md-8 mb-3 mb-md-0">
            <p class="mb-0 small text-muted">
              Copyright © {{ currentYear }} Construcciones Abalos |
              <a href="/politica-privacidad" class="text-muted text-decoration-none hover-primary">Política de privacidad</a> |
              <a href="/politica-cookies" class="text-muted text-decoration-none hover-primary">Política de cookies</a>
            </p>
          </div>
          <div class="col-md-4 text-md-end">
            <p class="mb-0 small text-muted">
              Web gestionada por El Ayudante
            </p>
          </div>
        </div>
      </div>
    </footer>
  </template>

  <script setup>
  import { computed } from 'vue';
  import { Link } from '@inertiajs/vue3';


  const currentYear = computed(() => new Date().getFullYear());
  </script>

  <style scoped>
  .hover-primary:hover {
    color: white !important;
    transition: color 0.3s ease;
  }

  footer a {
    transition: color 0.3s ease;
  }

  footer hr {
    opacity: 0.1;
  }

  @media (max-width: 767.98px) {
    .text-md-end {
      text-align: left !important;
    }
  }
  </style>
