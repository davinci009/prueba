<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">New User</h2>
    </template>

    <section class="flex justify-center items-center mb-2 mt-3">
      <form class="bg-white p-3" @submit.prevent="storeUser">

        <div>
          <label for="name" class="block">
            Name:
          </label>
          <input type="text" class="border-gray-200 rounded-md" name="name" id="name" placeholder="Ingrese un nombre"
            v-model="user.name" required>
        </div>

        <div class="mt-2">
          <label for="email" class="block">
            Email:
          </label>
          <input type="email" class="border-gray-200 rounded-md" name="email" id="email" placeholder="Ingrese un email"
            v-model="user.email" required>
        </div>

        <div class="mt-2">
          <label for="password" class="block">
            Password:
          </label>
          <input type="password" class="border-gray-200 rounded-md" name="password" id="password" placeholder="Ingrese una contraseña"
            v-model="user.password" required>
        </div>

        <div class="mt-2">
          <label for="email" class="block">
            Role:
          </label>
          <select name="role" id="" class=" rounded-md border-gray-200" v-model="user.role" required>
            <option value="" selected disabled>Seleccione una opción</option>
            <option value="admin">admin</option>
            <option value="visitante">visitante</option>
            <option value="publicador">publicador</option>
          </select>
        </div>

        <div class="flex justify-between mt-3">
          <a :href="route('users.index')" class="cursor-pointer rounded-md px-3 py-2 bg-red-600 text-white">Volver</a>
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

const user = reactive({
  name: '',
  email: '',
  password: '',
  role: ''
})

function storeUser() {
  router.post(route('users.store'), user);
}

</script>
<style scoped></style>