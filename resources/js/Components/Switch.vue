<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        type: String,
        default: null,
    },
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>


<template>
  <div>
    <label for="toggle" class="flex items-center cursor-pointer">
      <div class="relative">
        <input
          id="toggle"
          type="checkbox"
          class="sr-only"
          v-model="value"
        >
        <div
          class="block w-14 h-8 rounded-full bg-gray-300"
          :class="{ 'bg-green-700': value, 'bg-gray-300': !value }"
        ></div>
        <div
          class="dot absolute left-1 top-1 w-6 h-6 rounded-full transition"
          :class="{ 'translate-x-6 bg-green-500': value, 'translate-x-0 bg-gray-200': !value }"
        ></div>
      </div>
      <div class="ml-3 text-gray-700 font-medium">
        {{ value ? 'Activado' : 'Desactivado' }}
      </div>
    </label>
  </div>
</template>
