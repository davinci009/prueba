<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
    </template>

    <section class="bg-gray-100 text-gray-600 mt-6 px-6">
      <div class="flex flex-col justify-center">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
          <div class="p-3">
            <!-- add button -->
            <div class="flex justify-end mb-6">
              <a :href="route('posts.create')" class=" bg-indigo-500 px-3 py-2 rounded-md text-white">
                Add
              </a>
            </div>
            <!-- table -->
            <div class="overflow-x-auto">
              <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                  <tr>
                    <th class="p-2 whitespace-nowrap">
                      <div class="font-semibold text-left">Tilte</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                      <div class="font-semibold text-left">Description</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                      <div class="font-semibold text-left">Author</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                      <div class="font-semibold text-center">Actions</div>
                    </th>
                  </tr>
                </thead>
                
                <tbody class="text-sm divide-y divide-gray-100">
                  <tr v-for="post of posts" :key="post.id">
                    <td class="p-2 whitespace-nowrap">
                      <div class="font-medium ">{{post.title}}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                      <div class="text-left">{{post.description}}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                      <div class="text-left font-medium">{{post.user[0]?.name ?? 'Sin author'}}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap flex justify-center">
                      <button class="px-3 py-2 bg-indigo-500  text-white rounded-md mr-2"
                        @click="editPost(post.id)"
                      >
                        Edit
                      </button>
                      <button class="px-3 py-2 bg-red-600 text-white rounded-md"
                        @click="deletePost(post.id)"
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
  posts: Array
});

function editPost(id){
  router.get(route('posts.edit', {post: id} ), {});
}

function deletePost(id){
  router.delete(route('posts.destroy', {post: id} ), {});
}

</script>
<style scoped></style>