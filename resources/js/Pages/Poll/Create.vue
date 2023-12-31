<script setup>
import { router, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import FormSection from '@/Components/FormSection.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';

defineProps({ errors: Object })

const form = useForm({
  name: '',
  description: '',
  status: 0
});

const submit = () => {
  form.post('/poll', {
    errorBag: 'default',
    preserveScroll: true,
    onSuccess: () => clearInputs(),
  })
}

const clearInputs = () => {
    form.name = ''
    form.description = ''
    form.status = 0
};

</script>
<template>  
  <AppLayout title="Proyectos">  
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
          ENCUESTA
      </h2>
      <h4 class="font-semibold text-sm text-gray-600 leading-tight">
          Listado de encuestas.
      </h4>
  </template>
    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <FormSection @submitted="submit">
            <template #title>
                Nueva encuesta
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
                <InputError v-if="errors.name" :message="errors.name" class="mt-2" />
            </div>
            <!-- Description -->
            <div class="col-span-6 sm:col-span-4">
              <InputLabel for="description" value="Descripción" />
              <TextInput
                  id="description"
                  v-model="form.description"
                  type="text"
                  class="mt-1 block w-full"
                  autocomplete="description"
              />
              <InputError v-if="errors.description" :message="errors.description" class="mt-2" />
            </div>
            <!-- Estatus -->
            <div class="col-span-6 sm:col-span-4">
              <InputLabel for="status" value="Estatus" />
              <Checkbox
                  id="status"
                  v-model="form.status"
                  class="mt-1"
                  autocomplete="status"
              />
              <InputError v-if="errors.status" :message="errors.status" class="mt-2" />
            </div>
          </template>
          <template #actions>
            <ActionMessage :on="form.recentlySuccessful" :class="'text-sm text-green-600 mr-3'">
              Encuesta registrada correctamente.
            </ActionMessage>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" :loading="form.processing">
                Guardar {{ form.progress ? `${form.progress.percentage}%` : '' }}
            </PrimaryButton>
        </template>              
        </FormSection>
      </div>
    </div>
  </AppLayout>
</template>
