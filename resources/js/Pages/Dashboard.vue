<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="p-12 grid grid-cols-3 gap-6">
            <a :href="route('users.index')">
                <div class="bg-gray-200 text-blue-600 w-full text-center h-20 flex items-center justify-center">
                    <h2 class=" text-3xl">User</h2>
                </div>
            </a>
            <a :href="route('posts.index')">
                <div class="bg-gray-200 text-blue-600 w-full text-center h-20 flex items-center justify-center">
                    <h2 class=" text-3xl">Post</h2>
                </div>
            </a>
            <a :href="route('roles.index')">
                <div class="bg-gray-200 text-blue-600 w-full text-center h-20 flex items-center justify-center">
                    <h2 class=" text-3xl">Roles</h2>
                </div>
            </a>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>