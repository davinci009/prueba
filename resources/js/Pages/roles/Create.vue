<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Role</h2>
    </template>

    <section class="flex justify-center items-center mb-2 mt-3">
      <form class="bg-white p-3" @submit.prevent="storePost">

        <div>
          <label for="title" class="block">
            title:
          </label>
          <input type="text" class="border-gray-200 rounded-md" name="name" id="name" placeholder="Ingrese un nombre"
            v-model="role.name" required>
        </div>


        <div class="flex justify-between mt-3">
          <a :href="route('roles.index')" class="cursor-pointer rounded-md px-3 py-2 bg-red-600 text-white">Volver</a>
          <button type="submit" class="rounded-md px-3 py-2 bg-green-600 text-white">Guardar</button>
        </div>

      </form>
    </section>

  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3';

const role = reactive({
  name: '',
})

function storePost() {
  router.post(route('roles.store'), role);
}



</script>
<style scoped></style>