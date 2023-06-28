<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import FormSection from '@/Components/FormSection.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
const form = useForm({
  name: '',
  init: '',
  final: '',
});

const submit = () => {
    form.post('/weektask', {
    errorBag: 'default',
    preserveScroll: true,
    onSuccess: () => clearInputs(),
  })
}

const clearInputs = () => {
    form.name = ''
    form.init = ''
    form.final = ''
};

</script>
<template>  
  <AppLayout title="Proyectos">  
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
          SEMANAS
      </h2>
      <h4 class="font-semibold text-sm text-gray-600 leading-tight">
        Muestra las semanas programadas.
      </h4>
  </template>
    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <FormSection @submitted="submit">
            <template #title>
                Nueva semana
            </template>
            <template #form>
              <!-- Name -->
              <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Nombre" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="name"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <!-- Init -->
            <div class="col-span-6 sm:col-span-4">
              <InputLabel for="init" value="Fecha inicial" />
              <input
                  name="init"
                  type="date"
                  ref="input"
                  class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                  v-model="form.init"
              >
              <InputError :message="form.errors.init" class="mt-2" />
            </div>
            <!-- Final -->
            <div class="col-span-6 sm:col-span-4">
              <InputLabel for="final" value="Fecha final" />
              <input
                  name="final"
                  type="date"
                  ref="input"
                  class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                  v-model="form.final"
              >
              <InputError :message="form.errors.final" class="mt-2" />
              <InputError v-if="(form.init > form.final)" message="Fecha inicial debe ser menor o igual a fecha final" class="mt-2" />
            </div>
          </template>
          <template #actions>
            <ActionMessage :on="form.recentlySuccessful" :class="'text-sm text-green-600 mr-3'">
              Semana registrada correctamente.
            </ActionMessage>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing || (form.init > form.final)" :loading="form.processing">
                Guardar {{ form.progress ? `${form.progress.percentage}%` : '' }}
            </PrimaryButton>
        </template>              
        </FormSection>
      </div>
    </div>
  </AppLayout>
</template>
