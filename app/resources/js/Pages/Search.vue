<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <main class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h1>Pesquisar paciente</h1>
                <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example" />
            </div>
        </div>

        <div class="card">
            Paciente: Hugo Idade: 3 actions
            <button class="btn btn-sm btn-danger">EDITAR</button>
            <button class="btn btn-sm btn-danger">APAGAR</button>
        </div>
    </main>
</template>
