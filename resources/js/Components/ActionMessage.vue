<script setup>
defineProps({
    on: Boolean,
    class: String
});
</script>

<template>
    <div>
        <transition leave-active-class="transition ease-in duration-1000" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-show="on" :class="class">
                <slot />
            </div>
        </transition>
    </div>
</template>
