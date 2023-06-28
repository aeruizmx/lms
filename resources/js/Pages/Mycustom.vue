<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    text: String,
    email: String
});

const form = useForm('MycustomForm', {
    email: props.email,
});

const sendEmail = () => {
    form.put(route('mycustom.update'), {
        errorBag: 'sendEmail',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            alert("error")
        }
    })
}

</script>
<template>
    <AppLayout title="Mi Personalizado">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Mi Personalizado
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <FormSection @submitted="sendEmail">
                    <template #title>Titulo Form [edited]</template>
                    <template #description>Description Form</template>
                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="email" value="Email" />
                            <TextInput id="email" v-model="form.email" type="email" class="block w-full mt-1" required
                                autofocus autocomplete="username" />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                    </template>
                    <template #actions>
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Actuar
                        </PrimaryButton>
                    </template>
                </FormSection>
            </div>
        </div>
    </AppLayout>
</template>
