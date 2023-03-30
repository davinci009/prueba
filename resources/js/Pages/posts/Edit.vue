<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Post</h2>
    </template>

    <section class="flex justify-center items-center mb-2 mt-3">
      <form class="bg-white p-3" @submit.prevent="storePost">

        <div>
          <label for="title" class="block">
            title:
          </label>
          <input type="text" class="border-gray-200 rounded-md" name="title" id="title" placeholder="Ingrese un titulo"
            v-model="post.title" required>
        </div>

        <div class="mt-2">
          <label for="description" class="block">
            descripcion:
          </label>
          <textarea type="text" class="border-gray-200 rounded-md" name="description" id="description" placeholder="Ingrese una descripcion"
            v-model="post.description" required></textarea>
        </div>

        <div class="flex justify-between mt-3">
          <a :href="route('posts.index')" class="cursor-pointer rounded-md px-3 py-2 bg-red-600 text-white">Volver</a>
          <button type="submit" class="rounded-md px-3 py-2 bg-green-600 text-white">Guardar</button>
        </div>

      </form>
    </section>

  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive, onMounted } from 'vue'
import { router } from '@inertiajs/vue3';

const props = defineProps({
  edit_post: Object
});

const post = reactive({
  title: '',
  description: '',
})

function storePost() {
  router.put(route('posts.update', {post: props.edit_post.id}), post);
}

onMounted(()=>{
  if(props.edit_post?.id){
    post.title = props.edit_post.title
    post.description = props.edit_post.description
  }
})

</script>
<style scoped></style>