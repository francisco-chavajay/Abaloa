<template>
    <section class="blog-header-section position-relative d-none d-md-block">
      <!-- Background Image with Overlay -->
      <div class="blog-header-background position-absolute w-100 h-100"></div>

      <div class="container position-relative">
        <div class="row">
          <div class="col-12">
            <div class="blog-header-content">
              <!-- Title -->
              <h1 class="blog-title">BLOG</h1>

              <!-- Description -->
              <div class="blog-description">
                <p>En este blog podrás encontrar noticias, consejos además de ideas para proyectos; queremos que tengas</p>
                <p>la información necesaria para encontrar la <strong>Empresa de Construcción en Santander</strong> que necesitas.</p>
                <p>Resolveremos cualquier duda que tengas desde nuestra oficina en Santander.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>

  <script>
  </script>

  <style scoped>
  .blog-header-section {
    padding: 0;
    overflow: hidden;
  }

  .blog-header-background {
    background-image: url('@images/Blog-fondo.jpg');
    background-size: cover;
    background-position: center;
    opacity: 1;
    z-index: 0;
  }

  .blog-header-content {
    text-align: center;
    padding: 40px;
    position: relative;
    z-index: 20;
  }

  .blog-title {
    font-size: 3.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 30px;
    text-transform: uppercase;
    letter-spacing: 2px;
  }

  .blog-description {
    font-size: 17px;
    color: white;
    max-width: 800px;
    margin: 0 auto;
    line-height: 0.8;
  }

  .blog-description p {
    margin-bottom: 15px;
  }

  .blog-description strong {
    color: white;
    font-weight: 600;
  }

  /* Responsive adjustments */
  @media (max-width: 992px) {
    .blog-header-section {
      padding: 80px 0;
    }

    .blog-title {
      font-size: 3rem;
    }

    .blog-description {
      font-size: 1.1rem;
    }
  }

  @media (max-width: 768px) {
    .blog-header-section {
      padding: 60px 0;
    }

    .blog-title {
      font-size: 2.5rem;
    margin-bottom: 20px;
    }

    .blog-description {
      font-size: 1rem;
    }
  }
  </style>
