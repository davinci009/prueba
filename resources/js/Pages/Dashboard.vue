<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12 flex justify-between">
            <div>
                user
            </div>
            <div>
                post
            </div>
            <div>
                roles
            </div>
        </div>
    </AuthenticatedLayout>
</template>
