<script setup>
import { computed } from 'vue'

const props = defineProps({
    size: {
        type: String,
        default: 'md',
    },
    classes: {
        type: [String|Array|Object],
    },
})

const size = computed(() => {
    let sizes = ['sm', 'md', 'lg'];

    return sizes.includes(props.size) ? props.size : 'md';
})

const classes = computed(() => {
    if (props.classes) {
        return props.classes;
    }

    let classesBySize = {
        sm: [
            'px-2 py-1',
        ],
        md: [
            'px-4 py-2',
        ],
        lg: [
            'px-5 py-3',
        ],
    }

    return size.value in classesBySize ? classesBySize[size.value] : classesBySize['md'];
})
</script>

<template>
    <button
        class="inline-flex items-center bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-0 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
        :class="classes"
    >
        <slot />
    </button>
</template>
