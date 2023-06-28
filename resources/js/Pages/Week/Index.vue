<script setup>
import { computed, reactive, watch, ref } from 'vue';
import { router, useForm } from '@inertiajs/vue3';

import AppLayout from '@/Layouts/AppLayout.vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';

const props = defineProps({
    weeks: Array
});

let search = ref('');
let weekDeleted = ref(null);
let deleteForm = useForm({});

const pagination = reactive({
  currentPage: 1,
  perPage: 10,
  totalPages: computed(() =>
    Math.ceil(props.weeks.length / pagination.perPage)
  ),
});
const filteredItems = computed(() => {
  return props.weeks.filter(p => {
		if(search.value == '') return true;
		return p.name.toLowerCase().indexOf(search.value.toLowerCase()) >= 0;
	})
});

const paginatedItems = computed(() => {
  const { currentPage, perPage } = pagination;
  const start = (currentPage - 1) * perPage;
  const stop = start + perPage;
  return filteredItems.value.slice(start, stop);
});

watch(
  () => pagination.totalPages,
  () => (pagination.currentPage = 1)
);

const create = () => {
    router.visit('week/create', { method: 'get' })
};

const confirmDeletion = (id) => {
    weekDeleted.value = id;
};

const destroy = () => {
    deleteForm.delete(route('week.destroy', weekDeleted.value), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => (weekDeleted.value = null),
    });
};


</script>
<template>
    <AppLayout title="Semanas">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                SEMANAS
            </h2>
            <h4 class="font-semibold text-sm text-gray-600 leading-tight">
                Muestra las semanas programadas.
            </h4>
        </template>
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-4"></div>
                        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                            
                            <div class="pb-4 bg-white flex justify-between">
                                <label for="table-search" class="sr-only">Search</label>
                                
                                <div class="relative mt-1">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input type="text" id="table-search" v-model="search" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Buscar semanas">
                                </div>
                                <PrimaryButton @click="create" class="ml-4" >
                                    Nueva semana
                                </PrimaryButton>
                            </div>
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">ID</th>
                                        <th scope="col" class="py-3 px-6">NOMBRE</th>
                                        <th scope="col" class="py-3 px-6">FECHA INICIO</th>
                                        <th scope="col" class="py-3 px-6">FECHA FINAL</th>
                                        <th scope="col" class="py-3 px-6">ACCIÓN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(week, index) in paginatedItems" :key="week.id" class="bg-white">
                                        <td class="py-4 px-6">{{week.id}}</td>
                                        <td class="py-4 px-6">{{week.name}}</td>
                                        <td class="py-4 px-6">{{week.init}}</td>
                                        <td class="py-4 px-6">{{week.final}}</td>
                                        <td class="py-4 px-6">
                                            <a :href="route('week.edit', week.id)" class="font-medium text-blue-600 hover:underline hover:pointer mr-2">Editar</a>
                                            <button @click="confirmDeletion(week.id)" class="font-medium text-red-600 hover:underline hover:pointer">Eliminar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <nav class="flex justify-between items-center pt-4" aria-label="Table navigation">
                                <span class="text-sm font-normal text-gray-500">Página <span class="font-semibold text-gray-900">{{pagination.currentPage}}</span> de <span class="font-semibold text-gray-900">{{pagination.totalPages}}</span></span>
                                <ul class="inline-flex items-center -space-x-px">
                                    <li>
                                        <button :disabled="pagination.currentPage <= 1" @click="pagination.currentPage--" class="block py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 disabled:opacity-75">
                                            <span class="sr-only">Anterior</span>
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </li>                                                                                                                                                          
                                    <li>
                                        <button :disabled="pagination.currentPage >= pagination.totalPages" @click="pagination.currentPage++" href="#" class="block py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 disabled:opacity-75">
                                            <span class="sr-only">Siguiente</span>
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                </div>
            </div>
            <!-- Delete Token Confirmation Modal -->
            <ConfirmationModal :show="weekDeleted != null" @close="weekDeleted = null">
                <template #title>
                    Borrar semana
                </template>

                <template #content>
                    ¿Está seguro de borrar esta semana?
                </template>

                <template #footer>
                    <SecondaryButton @click="weekDeleted = null">
                        Cancel
                    </SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': deleteForm.processing }"
                        :disabled="deleteForm.processing"
                        @click="destroy()"
                    >
                        Delete
                    </DangerButton>
                </template>
            </ConfirmationModal>
        </main>
    </AppLayout>
</template>
