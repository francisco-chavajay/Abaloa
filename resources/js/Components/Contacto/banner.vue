<template>
    <!-- Sección del título con fondo -->
    <div class="header-section d-flex flex-column align-items-center justify-content-center text-white">
        <p class="text-p">CONSTRUCCIONES ABALOA</p>
        <h1 class="text-header">TODOS NUESTRA INFORMACIÓN PARA CONTACTAR</h1>
    </div>
    <!-- Divider grande rojo -->
    <div class="divider"></div>
</template>
<script setup>
</script>
<style scoped>

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

/* Divider grande rojo */
.divider {
  height: 80px;
  background-color: #D60D0D;
  margin: 0;
}
</style>
