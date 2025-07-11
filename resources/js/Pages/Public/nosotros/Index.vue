<template>
    <div class="container-fluid px-0 d-flex flex-column align-items-center">
        <div class="contain-banner-general-nosotros w-100">
            <Profiles />
        </div>
    </div>
    <div class="rol">
        <div class="col">
            <Elegirnos />
        </div>
    </div>
    <div class="rol pt-5 pb-5">
        <div class="col">
            <Proceso />
        </div>
    </div>
</template>

<script setup>
import Profiles from "@/Components/Nosotros/ProfessionalProfiles.vue"
import Elegirnos from "@/Components/Nosotros/Elegirnos.vue";
import Proceso from "@/Components/Nosotros/Proceso.vue";

</script>
