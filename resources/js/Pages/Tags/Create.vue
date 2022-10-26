<template>
<AdminLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tags Create
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="w-full flex mb-4 p-2 ">
                      <Link :href="route('admin.tags.index')" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Tag Index</Link>
                  </div>
                  <section class="flex content-center">
                      <form @submit.prevent="stroeTag">
                          <div class="shadow overflow-hidden sm:rounded-md">
                              <div class="px-4 py-5 bg-white sm:p-6">
                                  <!-- <div class="grid grid-cols-6 gap-6"> -->
                                      <div class="col-span-6 sm:col-span-3 mb-5">
                                          <label for="first-name" class="block text-sm font-medium text-gray-700">Tag
                                              name</label>
                                          <input v-model="form.tagName" type="text" autocomplete="given-name"
                                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                      </div>
                                  <!-- </div> -->
                                  <button class="px-4 py-2 tex-white bg-indigo-500 hover:bg-indigo-700 rounded-lg">create tags</button>
                              </div>
                          </div>
                      </form>
                  </section>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link,useForm} from '@inertiajs/inertia-vue3'

const form = useForm({
      tagName:''
    });
function stroeTag(){
  form.post('/admin/tags')
}
</script>

<style>

</style>