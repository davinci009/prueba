<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Roles</h2>
    </template>

    <section class="bg-gray-100 text-gray-600 mt-6 px-6">
      <div class="flex flex-col justify-center">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
          <div class="p-3">
            <!-- add button -->
            <div class="flex justify-end mb-6">
              <a :href="route('roles.create')" class=" bg-indigo-500 px-3 py-2 rounded-md text-white">
                Add
              </a>
            </div>
            <!-- table -->
            <div class="overflow-x-auto">
              <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                  <tr>
                    <th class="p-2 whitespace-nowrap">
                      <div class="font-semibold text-left">Name</div>
                    </th>
                  </tr>
                </thead>
                
                <tbody class="text-sm divide-y divide-gray-100">
                  <tr v-for="role of roles" :key="role.id">
                    <td class="p-2 whitespace-nowrap">
                      <div class="font-medium ">{{role.name}}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap flex justify-center">
                      <button class="px-3 py-2 bg-indigo-500  text-white rounded-md mr-2"
                        @click="editRole(role.id)"
                      >
                        Edit
                      </button>
                      <button class="px-3 py-2 bg-red-600 text-white rounded-md"
                        @click="deleteRole(role.id)"
                      >
                        Delete
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router } from '@inertiajs/vue3'

const props = defineProps({
  roles: Array
});

function editRole(id){
  router.get(route('roles.edit', {role: id} ), {});
}

function deleteRole(id){
  router.delete(route('roles.destroy', {role: id} ), {});
}

</script>
<style scoped></style>