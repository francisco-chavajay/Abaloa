<template>
    <Head title="Log in" />

    <div class="login-container d-flex justify-center">
        <!-- Estado del formulario -->
        <div v-if="status" class="status-message">
            {{ status }}
        </div>

        <!-- Formulario de Login -->
        <div class="login-card">
            <h2 class="text-center text-xl font-semibold text-gray-700 mb-6">ABALOA ADMIN</h2>

            <form @submit.prevent="submit">
                <!-- Campo de Email -->
                <div>
                    <InputLabel for="email" value="Email" />
                    <TextInput
                        id="email"
                        type="email"
                        class="input-field"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <!-- Campo de Contraseña -->
                <div class="mt-4">
                    <InputLabel for="password" value="Password" />
                    <TextInput
                        id="password"
                        type="password"
                        class="input-field"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <!-- Recuerdame Checkbox -->
                <div class="flex items-center justify-between mt-4">
                    <label class="flex items-center text-sm text-gray-600">
                        <Checkbox name="remember" v-model:checked="form.remember" />
                        <span class="ms-2">Remember me</span>
                    </label>

                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-sm text-indigo-600 hover:underline"
                    >
                        Forgot password?
                    </Link>
                </div>

                <!-- Botón de login -->
                <div class="mt-6">
                    <PrimaryButton
                        class="submit-btn"
                        :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<style scoped>
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f8f9fa;
    padding: 20px;
    width: 100%;
}

.login-card {
    background: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

.status-message {
    margin-bottom: 1rem;
    padding: 10px;
    background: #e6f7e6;
    border-left: 5px solid #38a169;
    color: #2d6a4f;
    font-weight: 500;
    text-align: center;
    border-radius: 4px;
}

.input-field {
    width: 100%;
    padding: 10px;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s;
}

.input-field:focus {
    border-color: #4f46e5;
    outline: none;
}

.submit-btn {
    width: 100%;
    padding: 10px;
    background-color: #4f46e5;
    color: white;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

.submit-btn:hover {
    background-color: #4338ca;
}
</style>
