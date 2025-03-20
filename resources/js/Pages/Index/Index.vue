<template>
    <div
        class="d-flex justify-content-center align-items-center vh-100 gradient-bg"
    >
        <div class="login-card text-center">
            <h2 class="mb-4">Login</h2>
            <form @submit.prevent="handleLogin">
                <div class="mb-3">
                    <input
                        v-model="form.email"
                        type="email"
                        class="form-control"
                        placeholder="Email"
                        required
                    />
                </div>
                <div class="mb-3">
                    <input
                        v-model="form.password"
                        type="password"
                        class="form-control"
                        placeholder="Password"
                        required
                    />
                </div>
                <button type="submit" class="btn btn-custom w-100">
                    Login
                </button>
                <p v-if="form.errors.email" class="text-danger mt-2">
                    {{ form.errors.email }}
                </p>
                <p v-if="form.errors.password" class="text-danger mt-2">
                    {{ form.errors.password }}
                </p>
                <p v-if="form.errors.error" class="text-danger mt-2">
                    {{ form.errors.error }}
                </p>
            </form>
        </div>
    </div>
</template>

<script>
import "bootstrap/dist/css/bootstrap.min.css";
import { Inertia } from "@inertiajs/inertia";

export default {
    data() {
        return {
            form: {
                email: "",
                password: "",
                errors: {},
            },
        };
    },
    methods: {
        handleLogin() {
            Inertia.post(
                "/login",
                {
                    email: this.form.email,
                    password: this.form.password,
                },
                {
                    onError: (errors) => {
                        this.form.errors = errors;
                    },
                    onSuccess: () => {
                        this.form.errors = {}; // Reset errors on success
                    },
                }
            );
        },
    },
};
</script>

<style scoped>
/* Full Page Gradient Background */
.gradient-bg {
    background: linear-gradient(
        135deg,
        #003366,
        #002244
    ); /* Dark Blue Gradient */
}

/* Glassmorphism Login Card */
.login-card {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    padding: 25px;
    width: 350px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    color: white;
}

/* Input Fields */
.form-control {
    background: rgba(255, 255, 255, 0.3);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.4);
}

.form-control::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

/* Login Button */
.btn-custom {
    background: #007bff;
    border: none;
    font-weight: bold;
    color: white;
}

.btn-custom:hover {
    background: #0056b3;
}
</style>
